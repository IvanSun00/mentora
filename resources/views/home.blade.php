@extends('layout.authBase')
@section('styles')
@endsection

@section('content')
<div class="p-10 min-h-screen bg-gradient-to-r from-blue-300 to-purple-300 relative overflow-hidden">
    <!-- Logo and Text Content Row -->
    <div class="flex items-center justify-between mb-8 flex-row-reverse">
        <!-- Logo -->
        <div class="ml-4 mr-20">
            <img src="{{ asset('MentoraClean.png') }}" alt="Mentora Logo" class="h-48 w-48">
        </div>

        <!-- Text Content -->
        <div class="flex-1 p-10">
            <h1 class="text-7xl font-bold mb-2">Find your <span class="text-black font-extrabold">mentors</span></h1>
            <h2 class="text-7xl font-bold mb-2">Become <span class="text-black font-extrabold">mentor</span></h2>
            <p class="text-4xl">Be the best version of yourself</p>
        </div>
    </div>

    <!-- Button -->
    <div class="mb-8 ml-10">
        <a href="{{ route('login') }}" class="z-50 h-20 w-64">
            <button class="bg-yellow-500 text-white text-2xl font-semibold py-3 px-8 rounded-lg hover:bg-yellow-600 transition duration-300 h-20 w-64">
                Start Journey
            </button>
        </a>
    </div>

    <!-- Illustration -->
    <div class="flex justify-end object-none object-left-bottom w-full absolute bottom-[-64px] right-0 overflow-y-hidden">
        <img src="{{ asset('home.png') }}" alt="Mentorship illustration" class="w-[65%]">
    </div>
</div>
@endsection

@section('scripts')
@endsection
