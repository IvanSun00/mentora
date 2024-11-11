@extends('layout.base')

@section('styles')
@endsection

@section('content')
<div style="background-color: #F7F6F5">
    <h2 class="text-center text-xl font-semibold mt-10">Dapatkan Tutor Berkualitas, Raih Prestasi Hebat.</h2>
    <p class="text-center text-gray-500">Pilih dan waktu untuk menemukan tutor yang relevan.</p>

    <div class="grid grid-cols-2 gap-5 mt-10 p-5 mb-10">
        <div class="border flex rounded-lg p-1 ml-10">
            <i class="fa-solid fa-graduation-cap fa-xl mt-5 ml-4"></i>
            <input type="text" name="username" id="username" class=" text-gray-900 text-sm border-l-0 border-t-0 border-b-0 border-r-2 block w-full p-2.5" placeholder="Subject" required="">
            <input type="text" name="username" id="username" class=" text-gray-900 text-sm rounded-lg border-none block w-full p-2.5" placeholder="Select Level" required="">
        </div>
        <div class="border flex rounded-lg p-1 mr-10">
            <i class="fa-solid fa-location-dot fa-xl mt-5 ml-4"></i>
            <input type="text" name="username" id="username" class=" text-gray-900 text-sm border-l-0 border-t-0 border-b-0 border-r-2 block w-full p-2.5" placeholder="Location" required="">
            <i class="fa-solid fa-clock fa-xl mt-5 ml-4"></i>
            <input type="text" name="username" id="username" class=" text-gray-900 text-sm rounded-lg border-none block w-full p-2.5" placeholder="Time" required="">
        </div>
        <div class="flex ml-10 space-x-10">
            <div class="border flex rounded-lg p-1">
                <i class="fa-solid fa-person-chalkboard fa-xl mt-5 ml-4"></i>
                <input type="text" name="username" id="username" class=" text-gray-900 border-none text-sm block w-full p-2.5 rounded-lg" placeholder="Class Type" required="">
            </div>
            <div class="border flex rounded-lg p-1">
                <i class="fa-brands fa-bitcoin fa-xl mt-5 ml-4"></i>
                <input type="number" name="fee" id="fee" class=" text-gray-900 text-sm border-none block w-full p-2.5 rounded-lg [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" placeholder="Fee" required="">
            </div>
        </div>
        <div class="border flex rounded-lg mr-10 p-1">
            <i class="fa-solid fa-magnifying-glass fa-xl mt-5 ml-4"></i>
                <input type="text" name="username" id="username" class=" text-gray-900 text-sm border-none block w-full p-2.5" placeholder="Search" required="">
        </div>
    </div>

    {{-- Cards --}}
    <div class="max-w-sm border rounded-lg shadow">
        <a href="#">
            <img class="rounded-t-lg -z-" src="{{ asset('MentoraClean.png') }}" alt="" />
            <p class="-mt-10 border bg-yellow-400 z-10 text-red-600">Christoper Boenadhi</p>
        </a>
        <div class="p-5 flex">
            <i class="fa-solid fa-star mt-1 mr-1" style="color: #FFD43B;"></i>
            <p style="color: #DA9318">asiudhgsads</p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
