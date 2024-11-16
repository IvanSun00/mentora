<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('/schedule/schedule');
    }

    public function getAvailableSlot(Request $r)
    {
        // Validate the incoming request to ensure 'date' is provided
        $r->validate([
            'date' => 'required|date',
        ]);

        // Get the mentor_id from the session
        $mentorId = Session::get('mentor_id');

        // Check if mentor_id is present in the session
        if (!$mentorId) {
            return response()->json(['message' => 'Mentor ID not found in session'], 400);
        }

        // Query the schedules table for matching mentor_id and date
        $schedules = Schedule::where('mentor_id', $mentorId)
            ->whereDate('date', $r['date'])
            ->get();

        // Return the result as a JSON response
        return response()->json([
            'schedules' => $schedules,
            'message' => $schedules->isEmpty() ? 'No available slots found' : 'Available slots retrieved successfully'
        ]);
    }
}
