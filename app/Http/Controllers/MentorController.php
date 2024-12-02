<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\Payment;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MentorController extends Controller
{

    public function search(){

        return view('mentor.searchMentor');
    }

    public function searchResult(Request $request){
        $validator = Validator::make($request->all(), [
            'subject' => 'nullable|string',
            'teaching_type' => 'nullable|integer',
            'location' => 'nullable|string',
            'time'=> 'nullable|string',
            'min_fee' => 'nullable|integer',
            'max_fee' => 'nullable|integer',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Failed',
                'errors' => $validator->errors()
            ]);
        }

        $validatedData = $validator->validated();

        // Query pencarian berdasarkan data valid
        $query = Mentor::with(['student:id,full_name,email,city','schedules.reviews']);

        if (!empty($validatedData['subject'])) {
            $query->where('subject', 'LIKE', '%' . $validatedData['subject'] . '%');
        }
        if ($validatedData['teaching_type'] != 2) {
            $query->where('teaching_type', $validatedData['teaching_type']);
        }
        if (!empty($validatedData['location'])) {
            $query->whereHas('student', function($q) use ($validatedData){
                $q->where('city', 'LIKE', '%' . $validatedData['location'] . '%');
            });
        }
        if (!empty($validatedData['min_fee'])) {
            $query->where('hourly_rate', '>=', $validatedData['min_fee']);
        }

        if (!empty($validatedData['max_fee'])) {
            $query->where('hourly_rate', '<=', $validatedData['max_fee']);
        }

        // Ambil hasil pencarian
        $results = $query->get();

        // add rating
        foreach ($results as $mentor) {
            $rating = $this->get_rating($mentor);
            $mentor->total_review = $rating['total_review'];
            $mentor->average_rating = $rating['average_rating'];
        }

        // add teaching hours
        foreach ($results as $mentor) {
            $mentor->teaching_hours = $this->get_TeachingHours($mentor->id);
        }

        return response()->json([
            'message' => 'success',
            'data' => $results
        ]);
    }

    public function get_rating(Mentor $mentor){
        $totalRating = 0;
        $totalReview = 0;
        $listReview = [];
        $listPaymentId = [];
        foreach ($mentor->schedules as $schedule) {
            if ($schedule->reviews) {
                if(in_array($schedule->payment->id, $listPaymentId)) continue;
                $listPaymentId[] = $schedule->payment->id;
                $totalRating += $schedule->reviews->overall_score;
                $totalReview++;
                $listReview[] = $schedule->reviews;
            }
        }
        $averageRating = $totalReview ? round($totalRating / $totalReview, 2) : 0;

        return [
            'total_review' => $totalReview,
            'average_rating' => $averageRating,
            'list_review' => $listReview
        ];
    }

    public function get_TeachingHours($mentorId){
        $totalHours = 0;
        $schedules = Schedule::where('mentor_id', $mentorId)
                    ->whereNotNull('payment_id')
                    ->get();
        foreach ($schedules as $schedule) {
            $totalHours += abs($schedule->hour_end - $schedule->hour_start);
        }
        return $totalHours;
    }

    public function detailMentor(Mentor $mentor){
        $rating = $this->get_rating($mentor);
        $mentor->total_review = $rating['total_review'];
        $mentor->average_rating = $rating['average_rating'];
        $mentor->list_review = $rating['list_review'];
        $mentor->teaching_hours = $this->get_TeachingHours($mentor->id);

        //teaching_type: 1 => online, 2 => offline, 3 => both
        switch ($mentor->teaching_type) {
            case 0:
                $mentor->teaching_type = ['Online'];
                break;
            case 1:
                $mentor->teaching_type = ['Offline'];
                break;
            case 2:
                $mentor->teaching_type = ['Online', 'Offline'];
                break;
            default:
                $mentor->teaching_type = [];
        }


        return view('mentor.detailMentor', compact('mentor'));
    }

    public function reserve(Mentor $mentor){
        $rating = $this->get_rating($mentor);
        $mentor->total_review = $rating['total_review'];
        $mentor->average_rating = $rating['average_rating'];
        $mentor->teaching_hours = $this->get_TeachingHours($mentor->id);
         //teaching_type: 1 => online, 2 => offline, 3 => both
        switch ($mentor->teaching_type) {
            case 0:
                $mentor->teaching_type = ['Online'];
                break;
            case 1:
                $mentor->teaching_type = ['Offline'];
                break;
            case 2:
                $mentor->teaching_type = ['Online', 'Offline'];
                break;
            default:
                $mentor->teaching_type = [];
        }
        return view('mentor.reserve', compact('mentor'));
    }


    public function payment(Request $request, Mentor $mentor){
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'hours' => 'required|string',
        ]);
        if($validator->fails()){
            return redirect()->route('mentor.reserve',['mentor' => $mentor->id])->withErrors($validator);
        }

        // pisahkan hours by , dan check value setiap bagian antara 6-23
        $hours = explode(',', $request->hours);
        foreach ($hours as $hour) {
            if (!is_numeric($hour) || $hour < 6 || $hour > 23) {
                return redirect()->route('mentor.reserve',['mentor' => $mentor->id])->withErrors('Invalid hours');
            }
        }

        // check date lebih besar dari hari ini
        $date = $request->date;
        if ($date < date('Y-m-d')) {
            return redirect()->route('mentor.reserve',['mentor' => $mentor->id])->withErrors('Invalid date');
        }

        $rating = $this->get_rating($mentor);
        $mentor->total_review = $rating['total_review'];
        $mentor->average_rating = $rating['average_rating'];
        $mentor->teaching_hours = $this->get_TeachingHours($mentor->id);
         //teaching_type: 1 => online, 2 => offline, 3 => both
        switch ($mentor->teaching_type) {
            case 0:
                $mentor->teaching_type = ['Online'];
                break;
            case 1:
                $mentor->teaching_type = ['Offline'];
                break;
            case 2:
                $mentor->teaching_type = ['Online', 'Offline'];
                break;
            default:
                $mentor->teaching_type = [];
        }

        return view('mentor.payment', compact('mentor', 'hours', 'date'));
    }

    public function paymentProcess(Request $request, Mentor $mentor){
        // validate
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'hours' => 'required|array',
            'paymentProof' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $studentId = session('student_id');
        DB::beginTransaction();
        try{
            $filePath = 'payment/'.Session::get('username');
            $extension = $request['paymentProof']->getClientOriginalExtension();
            $timestamp = date('Y-m-d_His');
            $filename = $timestamp . '_payment.' . $extension;
            $fileLink = $request['paymentProof']->storeAs($filePath, $filename, 'public');

            // save to payment file to db
            $payment = Payment::create([
                'file_link' => 'storage/'.$fileLink,
                'student_id' => $studentId,
            ]);

            // update schedule available and payment
            $date = $request->date;
            $hours = $request->hours;
            foreach ($hours as $hour) {
                $schedule = Schedule::where('mentor_id', $mentor->id)
                            ->where('date', $date)
                            ->where('hour_start', $hour)
                            ->where('is_available', 1)
                            ->where('payment_id', null)
                            ->first();
                if(!$schedule){
                    throw new \Exception('Schedule not found');
                }
                $schedule->payment_id = $payment->id;
                $schedule->is_available = 0;
                $schedule->save();
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->withErrors('Failed to process payment');
        }

        return redirect()->route('mentor.detailMentor',['mentor' => $mentor->id])->with('success', 'Payment success');



    }



}
