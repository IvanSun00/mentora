@extends('layout.base')

@section('styles')
<style>
    body{
        background-color: #F7F6F5;
    }
</style>
@endsection

@section('content')
<h2 class="text-center text-xl font-semibold mt-10">Dapatkan Tutor Berkualitas, Raih Prestasi Hebat.</h2>
<p class="text-center text-gray-500">Pilih dan waktu untuk menemukan tutor yang relevan.</p>

<div class="grid grid-cols-2 gap-5 mt-10 p-5 mb-10">
    <div class="border flex rounded-lg p-1 ml-10 bg-white" style="border-color: #76460B">
        <i class="fa-solid fa-graduation-cap fa-xl mt-5 ml-4"></i>
        <input type="text" name="username" id="username" class=" text-gray-900 text-sm border-l-0 border-t-0 border-b-0 border-r-2 block w-full p-2.5" placeholder="Subject" required="">
        <input type="text" name="username" id="username" class=" text-gray-900 text-sm rounded-lg border-none block w-full p-2.5" placeholder="Select Level" required="">
    </div>
    <div class="border flex rounded-lg p-1 mr-10 bg-white" style="border-color: #76460B">
        <i class="fa-solid fa-location-dot fa-xl mt-5 ml-4"></i>
        <input type="text" name="username" id="username" class=" text-gray-900 text-sm border-l-0 border-t-0 border-b-0 border-r-2 block w-full p-2.5" placeholder="Location" required="">
        <i class="fa-solid fa-clock fa-xl mt-5 ml-4"></i>
        <input type="text" name="username" id="username" class=" text-gray-900 text-sm rounded-lg border-none block w-full p-2.5" placeholder="Time" required="">
    </div>
    <div class="flex ml-10 space-x-10">
        <div class="border flex rounded-lg p-1 bg-white" style="border-color: #76460B">
            <i class="fa-solid fa-person-chalkboard fa-xl mt-5 ml-4"></i>
            <input type="text" name="username" id="username" class=" text-gray-900 border-none text-sm block w-full p-2.5 rounded-lg" placeholder="Class Type" required="">
        </div>
        <div class="border flex rounded-lg p-1 bg-white" style="border-color: #76460B">
            <i class="fa-brands fa-bitcoin fa-xl mt-5 ml-4"></i>
            <input type="number" name="fee" id="fee" class=" text-gray-900 text-sm border-none block w-full p-2.5 rounded-lg [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" placeholder="Fee" required="">
        </div>
    </div>
    <div class="border flex rounded-lg mr-10 p-1 bg-white" style="border-color: #76460B">
        <i class="fa-solid fa-magnifying-glass fa-xl mt-5 ml-4"></i>
            <input type="text" name="username" id="username" class=" text-gray-900 text-sm border-none block w-full p-2.5" placeholder="Search" required="">
    </div>
</div>

{{-- Cards --}}
<div class="max-w-sm border rounded-2xl ml-10 shadow-xl" style="border-color: #76460B">
    <i class="fa-solid fa-heart flex justify-end mr-5 mt-5 fa-xl" style="color: #ff0033;"></i>
    <a href="#">
        <img class="rounded-t-lg flex ml-10 -mt-5" src="{{ asset('MentoraClean.png') }}" alt="" />
        <p class="-mt-20 border z-10 text-white font-bold" style="background-color: #DA9318">Christoper Boenadhi</p>
    </a>
    <div class="p-5 mt-10">
        <div class="flex">
            <i class="fa-solid fa-star mt-1 mr-1" style="color: #FFD43B;"></i>
            <p style="color: #76460B">4.9 (10 Ulasan)</p>
        </div>
        <p style="color: #76460B">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam, cumque.</p>
        <div class="flex">
            <i class="fa-solid fa-repeat mt-1.5 mr-1"></i>
            <p style="color: #76460B">59 Active Students</p>
        </div>
        <div class="flex">
            <i class="fa-solid fa-clock mt-1.5 mr-1"></i>
            <p style="color: #76460B">100+ jam mengajar</p>
        </div>
        <div class="flex">
            <i class="fa-solid fa-location-dot mt-1.5 mr-2"></i>
            <p style="color: #76460B">Jakarta, Indonesia</p>
        </div>
        <p style="color: #76460B" class="mt-10 font-semibold"> Rp 300.000/jam</p>
    </div>
</div>
@endsection

@section('scripts')
@endsection
