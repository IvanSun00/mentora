<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Schedule;
use Illuminate\Support\Facades\Validator;

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

    public function updateAvailableSlot(Request $r)
    {
        $r->validate([
            'date' => 'required|date',
        ]);

        // Get the mentor_id from the session
        $mentorId = Session::get('mentor_id');

        // Check if mentor_id is present in the session
        if (!$mentorId) {
            return response()->json(['message' => 'Mentor ID not found in session'], 400);
        }

        $date = $r['date'];
        $hours = json_decode($r->input('hours'), true);

        // Get all existing slots for the given mentor_id and date
        $existingSlots = Schedule::where('mentor_id', $mentorId)
            ->whereDate('date', $date)
            ->get();

        // Loop through the hours array and insert or update slots
        foreach ($hours as $hour) {
            $slot = $existingSlots->firstWhere('hour_start', $hour);

            if ($slot) {
                // Update is_available to 1 if the slot exists
                $slot->update(['is_available' => 1]);
            } else {
                // Insert a new record if it doesn't exist
                Schedule::create([
                    'date' => $date,
                    'hour_start' => $hour,
                    'hour_end' => $hour + 1,
                    'is_available' => 1,
                    'mentor_id' => $mentorId,
                ]);
            }
        }

        // Set is_available to 0 for slots not in the hours array
        Schedule::where('mentor_id', $mentorId)
            ->whereDate('date', $date)
            ->whereNotIn('hour_start', $hours)
            ->update(['is_available' => 0]);

        return response()->json(['message' => 'Slots updated successfully']);
    }

    public function getAvailableMentorSlot(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'mentor_id' => 'required|exists:mentors,id',
            'date' => 'required|date',
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 400);
        }

        $schedules = Schedule::whereDate('date', $r['date'])
            ->where('mentor_id', $r['mentor_id'])
            ->where('is_available', 1)
            ->get();

        return response()->json([
            'message' => 'success',
            'data' => $schedules
        ]);
    }
}
