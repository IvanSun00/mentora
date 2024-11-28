@extends('layout.base')

@section('styles')
<style>
    body {
        background-color: #F7F6F5;
    }
</style>
@endsection

@section('content')

<div class="flex justify-between p-5 mt-5">
    <div class="left ml-24">
        <h2 class="font-bold text-2xl w-4/5 mb-10">
            Confirm Lesson
        </h2>
        <button class="p-3 rounded-3xl w-48 text-white font-semibold mb-20" style="background-color: #DA9318">
            Select a Schedule
        </button>

        <p class="text-xl mb-5 font-bold">Method</p>

        <div class="flex mb-10">
            <button class="border shadow bg-white rounded-full w-40 p-3"><i class="fa-solid fa-video mr-3"></i>Online</button>
            <button class="border shadow bg-white rounded-full w-40 p-3 ml-5"><i class="fa-solid fa-map mr-3"></i>Onsite</button>
        </div>
    </div>

    <div class="right mr-24">
        <div class="max-w-sm w-80 bg-white shadow items-center rounded-3xl">
            <i class="flex p-5 fa-lg fa-regular fa-heart justify-end"></i>
            <img class="p-5 w-44 rounded-3xl mx-auto -mt-10" src="{{ asset('flo.jpg') }}" alt="" />
            <div class="p-5 text-center">
                <h5 class="text-lg -mt-5 font-semibold text-gray-900">Timothy Vieri</h5>
                <p class="mb-3 text-sm">English</p>
                <div class="grid grid-cols-2 p-3 mb-3">
                    <p class="text-start">Tarif per jam</p>
                    <p class="font-bold text-end">Rp 300.000</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="flex justify-center items-center gap-20 mt-5">
    <button class="p-3 font-semibold w-28 rounded-3xl text-white" style="background-color: #9F4444">
        Cancel
    </button>
    <button class="p-3 font-semibold w-28 rounded-3xl text-white" style="background-color: #DA9318">
        Next Page
    </button>
</div>

@endsection

@section('scripts')
@endsection
