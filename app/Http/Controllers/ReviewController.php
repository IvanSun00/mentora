<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\Review;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use App\Models\Schedule;

class ReviewController extends Controller
{
    public function showHistory()
    {
        $payments = Payment::where('student_id', session('student_id'))->get();
        return view('review.history', compact('payments'));
    }

    public function showSession()
    {
        $mentorId = Session::get('mentor_id');
        $reviews = Review::whereHas('payment.schedules', function ($query) use ($mentorId) {
            $query->where('mentor_id', $mentorId);
        })->get();
        return view('review.session', compact('reviews'));
    }

    public function showBooking()
    {
        $mentorId = Session::get('mentor_id');
        $schedules = Schedule::where('mentor_id', $mentorId)->whereNotNull('payment_id')->orderBy('date', 'asc')->orderBy('hour_start', 'asc')->get();
        return view('review.booking', compact('schedules'));
    }

    public function showForm($id)
    {
        $payment = Payment::findOrFail($id);
        if (session('student_id') != $payment->student_id) {
            return redirect()->route('review.history')->with('error', 'Unauthorized user!');
        }
        $mentor = Mentor::findOrFail($payment->schedules[0]->mentor->id);
        return view('review.form', ['id' => $payment->id, 'mentor' => $mentor]);
    }

    public function submitForm(Request $request, Payment $payment)
    {
        if (session('student_id') != $payment->student_id) {
            return redirect()->route('review.history')->with('error', 'Unauthorized user!');
        }

        $request->validate([
            'expertise_score' => 'required|numeric',
            'engagement_score' => 'required|numeric',
            'clarity_score' => 'required|numeric',
            'motivating_score' => 'required|numeric',
            'punctuality_score' => 'required|numeric',
            'overall_score' => 'required|numeric',
            'comment' => 'required|string',
        ]);

        $review = Review::where('payment_id', $payment->id)->first();
        if ($review) {
            return redirect()->route('review.history')->with('error', 'Already reviewed!');
        }

        Review::create([
            'payment_id' => $payment->id,
            'expertise_score' => $request['expertise_score'],
            'engagement_score' => $request['engagement_score'],
            'clarity_score' => $request['clarity_score'],
            'motivating_score' => $request['motivating_score'],
            'punctuality_score' => $request['punctuality_score'],
            'overall_score' => $request['overall_score'],
            'comment' => $request['comment'],
        ]);
        return redirect()->route('review.history')->with('success', 'Reviewed successfully!');
    }
}
