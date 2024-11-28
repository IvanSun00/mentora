<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\Schedule;
use Illuminate\Http\Request;
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
        if (!empty($validatedData['teaching_type']) && $validatedData['teaching_type'] != 2) {
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
        foreach ($mentor->schedules as $schedule) {
            if ($schedule->reviews) {
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


    

}
