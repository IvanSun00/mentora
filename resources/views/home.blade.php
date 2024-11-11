@extends('layout.base')

@section('styles')
@endsection

@section('content')
<div class="p-10">
    <!-- Logo and Text Content Row -->
    <div class="flex items-center justify-between mb-8 flex-row-reverse">
        <!-- Logo -->
        <div class="ml-4">
            <img src="{{ asset('MentoraClean.png') }}" alt="Mentora Logo" class="h-24 w-24">
        </div>

        <!-- Text Content -->
        <div class="flex-1">
            <h1 class="text-3xl font-bold mb-2">Find your <span class="text-black font-extrabold">mentors</span></h1>
            <h2 class="text-3xl font-bold mb-2">Become <span class="text-black font-extrabold">mentor</span></h2>
            <p class="text-xl">Be the best version of yourself</p>
        </div>
    </div>

    <!-- Button -->
    <div class="mb-8">
        <button class="bg-yellow-500 text-white text-lg font-semibold py-3 px-8 rounded-lg hover:bg-yellow-600 transition duration-300">Start Journey</button>
    </div>

    <!-- Illustration -->
    <div class="flex justify-end object-none object-left-bottom">
        <img src="{{ asset('home.png') }}" alt="Mentorship illustration">
    </div>
</div>
@endsection

@section('scripts')
@endsection
