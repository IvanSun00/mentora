@extends('layout.base')

@section('styles')
@endsection

@section('content')
    <div class=" p-8 w-full">
        <!-- Header -->
        <div class="flex items-center justify-center mb-6 text-5xl">
            <button><i class="fa-solid fa-angles-left"></i></button>
            <h1 class="font-semibold">Monday, 7 October 2024</h1>
            <button><i class="fa-solid fa-angles-right"></i></button>
        </div>

        <!-- Time slots grid -->
        <div class="grid grid-cols-4 gap-3 mx-10">
            <!-- Repeat this div for each time slot -->
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                00.00-01.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                01.00-02.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                02.00-03.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                03.00-04.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                04.00-05.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                05.00-06.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                06.00-07.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                07.00-08.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                08.00-09.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                09.00-10.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                10.00-11.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                11.00-12.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                12.00-13.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                13.00-14.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                14.00-15.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                15.00-16.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                16.00-17.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                17.00-18.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                18.00-19.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                19.00-20.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                20.00-21.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                21.00-22.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                22.00-23.00
            </button>
            <button class="p-4 rounded-lg text-white text-center" style="background-color: #9F4444">
                23.00-00.00
            </button>
        </div>

        <!-- Save Button -->
        <button class="mt-10 w-full py-4 text-white font-semibold rounded-full" style="background-color: #DA9318">
            Save schedule
        </button>
    </div>
@endsection

@section('scripts')
@endsection
