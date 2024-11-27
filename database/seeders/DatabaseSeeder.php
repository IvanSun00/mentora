<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use App\Models\Mentor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Student::create([
            'username' => 'nicsin student',
            'password' => Hash::make('password'),
            'full_name' => 'Nich Sin',
            'phone_number' => '982376445',
            'email' => 'nicsin2@email.com',
            'city' => 'Jakarta',
            'birth_date' => '2004-05-16',
            'ktp_link' => 'ktp_example2.com',
        ]);

        $student = Student::create([
            'username' => 'nicsin',
            'password' => Hash::make('password'),
            'full_name' => 'Nicholas Sindoro',
            'phone_number' => '0821435729032',
            'email' => 'nicsin@email.com',
            'city' => 'Surabaya',
            'birth_date' => '2024-05-16',
            'ktp_link' => 'ktp_example.com',
        ]);

        Mentor::create([
            'title' => 'Guru Berpengalaman 4 Tahun Dalam Dunia Pendidikan Dan Seni, Membuka Fun Class Bagi Anak-Anak di Jakarta Dan Sekitarnya (Kids Friendly and Fluent English)',
            'bio' => 'Programmer handal',
            'hourly_rate' => 100509,
            'subject' => 'competitive programming',
            'cv_link' => 'cv_example.com',
            'student_id' => $student->id,
        ]);
    }
}
