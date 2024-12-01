@extends('layout.authBase')
@section('styles')
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
        h1 {
            font-family: 'Poppins', sans-serif;
        }

    </style>
@endsection

@section('content')
    <div class="p-10 min-h-screen bg-gradient-to-r from-blue-300 to-purple-300 relative overflow-hidden">
        <!-- Logo and Text Content Row -->
        <div class="relative z-10 flex flex-wrap lg:flex-row flex-col-reverse items-center justify-between mb-8">
            <!-- Text Content -->
            <div class="mt-12 ml-12">
                <h1 class="text-5xl font-bold mb-2">Empower Learning. Unlock Potential.</h1>
                <h2 class="text-lg font-thin mb-12">Connect with expert mentors or inspire others by sharing your expertise.
                </h2>
                <p class="text-xl italic">Your journey to growth starts here.</p>
                <a href="{{ route('login') }}"
                    class="inline-block mt-4 bg-yellow-500 text-white text-2xl font-semibold py-3 px-12 rounded-xl hover:bg-yellow-600 transition duration-300">
                    Start Journey
                </a>
            </div>

            <!-- Logo -->
            <div class="self-start lg:mb-0 mb-8 mx-auto lg:mx-0">
                <img src="{{ asset('MentoraClean.png') }}" alt="Mentora Logo" class="h-40 w-auto">
            </div>
        </div>



        <!-- Illustration -->
        <div
            class="hidden justify-end object-none object-left-bottom w-full absolute bottom-[-55px] right-[10px] lg:right-[150px] overflow-y-hidden lg:flex">
            <img src="{{ asset('home.png') }}" alt="Mentorship illustration" class="w-[80%] lg:w-[55%]">
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.title = "Mentora";
    </script>
@endsection
