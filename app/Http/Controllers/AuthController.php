<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
                'city_id' => 1,
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
        return redirect()->back()->with('success', 'Register completed!');
    }
}
