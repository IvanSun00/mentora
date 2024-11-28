<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register.signup');
    }
    public function showRegisterMentor()
    {
        return view('register.signupMentor');
    }
    public function showLogin()
    {
        return view('register.login');
    }

    public function register(Request $r)
    {
        $r->validate([
            'first-name' => 'required|string',
            'last-name' => 'required|string',
            'username' => 'required|string|unique:students',
            'phone_number' => 'required|string|unique:students',
            'email' => 'required|email|unique:students',
            'password' => 'required|min:8|string',
            'dob' => 'required|date',
            'city' => 'required|string',
            'ktp_file' => 'required|image|mimes:jpeg,png,jpg|max:4096',
        ]);

        try {
            $filePath = 'uploads/' . $r['username'];
            $extension = $r['ktp_file']->getClientOriginalExtension();
            $timestamp = date('Y-m-d_His');
            $filename = $timestamp . '_ktp.' . $extension;
            $ktpLink = $r['ktp_file']->storeAs($filePath, $filename, 'public');

            Student::create([
                'username' => $r['username'],
                'password' => Hash::make($r['password']),
                'full_name' => $r['first-name'] . " " . $r['last-name'],
                'phone_number' => $r['phone_number'],
                'email' => $r['email'],
                'birth_date' => $r['dob'],
                'ktp_link' => "storage/" . $ktpLink,
                'city' => $r['city'],
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
        return redirect()->back()->with('success', 'Register completed!');
    }

    public function registerMentor(Request $r)
    {
     
        $r->validate([
            'title' => 'required|string|max:100',
            'biodata' => 'required|string',
            'teaching_type' => 'required|numeric|min:0|max:2',
            'rate' => 'required|numeric',
            'subject' => 'required|string',
            'cv_file' => 'required|mimes:pdf|max:4096',
        ]);

        try {
            $filePath = 'uploads/' . Session::get('username');
            $extension = $r['cv_file']->getClientOriginalExtension();
            $timestamp = date('Y-m-d_His');
            $filename = $timestamp . '_cv.' . $extension;
            $cvLink = $r['cv_file']->storeAs($filePath, $filename, 'public');

            $mentor = Mentor::where('student_id', Session::get('student_id'))->first();
            if ($mentor) {
                return redirect()->back()->with('error', 'Already a mentor!');
            }

            Mentor::create([
                'title' => $r['title'],
                'bio' => $r['biodata'],
                'teaching_type' => $r['teaching_type'],
                'hourly_rate' => $r['rate'],
                'cv_link' => "storage/" . $cvLink,
                'subject' => $r['subject'],
                'student_id' => Session::get('student_id'),
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
        return redirect()->back()->with('success', 'Register completed!');
    }

    public function login(Request $r)
    {
        $r->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $student = Student::where('username', $r['username'])->first();

        if ($student && Hash::check($r['password'], $student->password)) {
            Session::put('student_id', $student->id);
            Session::put('username', $student->username);

            $mentor = Mentor::where('student_id', $student->id)->first();
            if ($mentor) {
                Session::put('mentor_id', $mentor->id);
            }

            return redirect()->back()->with('success', 'Login success!');
        } else {
            return redirect()->back()->with('error', 'Invalid username or password!');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login')->with('success', 'Logged out!');
    }
}
