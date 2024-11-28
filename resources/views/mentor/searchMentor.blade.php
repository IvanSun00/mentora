@extends('layout.base')

@section('styles')
<style>
    body{
        background-color: #F7F6F5;
    }

    .mini-search input,  .mini-search  select, .drawer input, .drawer select{
        background-color: #F7F6F5 !important; 
    }

    .search input:focus , .search select:focus{
        outline: none; /* Removes the default focus outline */
        box-shadow: none; /* Removes any focus-related shadow */
    }

    @media (max-width: 768px) {
        .big-search{
            display: none !important;
        }
    }

    @media (min-width: 768px) {
        .mini-search{
            display: none !important;
        }
    }
</style>
@endsection

@section('content')
<h2 class="text-center text-xl font-semibold mt-10">Dapatkan Tutor Berkualitas, Raih Prestasi Hebat.</h2>
<p class="text-center text-gray-500">Pilih dan waktu untuk menemukan tutor yang relevan.</p>

{{-- main search bar --}}
<div class="grid grid-cols-3 gap-5 mt-10 p-5 mb-10 search big-search">
    <div class="col-span-2 border flex rounded-lg p-1 ml-10 bg-white" style="border-color: #76460B">
        <i class="fa-solid fa-graduation-cap fa-xl mt-5 ml-4"></i>
        
        <!-- Subject Input -->
        <input 
            type="text" 
            name="subject" 
            id="subject" 
            class="text-gray-900 text-sm border-0 border-r-2 block w-full p-2.5" 
            placeholder="Subject" 
            required
        >
        
        <!-- Teaching Type Dropdown -->
        <select 
            name="teaching_type" 
            id="teaching_type" 
            class="text-gray-900 text-sm rounded-lg border-none block w-full p-2.5" 
            required
        >
            <option value="2" selected>Any Type</option>
            <option value="0">Online</option>
            <option value="1">Offline</option>
        </select>
    </div>
    
    <div class="border flex rounded-lg p-1 mr-10 bg-white" style="border-color: #76460B">
        {{-- location --}}
        <i class="fa-solid fa-location-dot fa-xl mt-5 ml-4"></i>
        <input type="text" name="location" id="location" class=" text-gray-900 text-sm border-none block w-full p-2.5" placeholder="Location" required>
    </div>

    {{-- baris 2 --}}
    <div class="col-span-2 flex ml-10 space-x-10">
        <div class="border flex rounded-lg p-1 bg-white" style="border-color: #76460B">
            {{-- min fee --}}
            <i class="fa-brands fa-bitcoin fa-xl mt-5 ml-4"></i>
            <input type="number" name="min_fee" id="min_fee" class="text-gray-900 text-sm border-none block w-full p-2.5 rounded-lg [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" placeholder="Minimum Fee" required>
        </div>
        <div class="border flex rounded-lg p-1 bg-white" style="border-color: #76460B">
            {{-- max fee --}}
            <i class="fa-brands fa-bitcoin fa-xl mt-5 ml-4"></i>
            <input type="number" name="max_fee" id="max_fee" class="text-gray-900 text-sm border-none block w-full p-2.5 rounded-lg [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" placeholder="Maximum Fee" required>
        </div>
    </div>
</div>


{{-- mini search --}}
<div class="mini-search search flex items-center justify-center bg-secondary p-4 space-x-4 my-5">
    <!-- subject, type -->
    <div class="border flex rounded-lg p-1 bg-baseGray w-full max-w-md"  data-drawer-target="drawer-form" data-drawer-show="drawer-form" aria-controls="drawer-form">
        <i class="fa-solid fa-graduation-cap fa-xl mt-5 ml-4"></i>
        <!-- Subject Input -->
        <label 
            for="subject" 
            class="text-gray-900 text-sm block w-full p-2.5">
            Enter Subject
        </label>
    </div>
    <!-- Ikon filter -->
    <div>
        <button class="text-dark bg-baseGray text-sm font-medium  px-5 py-3 focus:ring-4 focus:ring-blue-300 rounded-lg focus:outline-none" type="button" data-drawer-target="drawer-form" data-drawer-show="drawer-form" aria-controls="drawer-form">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 12.414V19a1 1 0 01-.553.894l-4 2A1 1 0 019 21v-8.586L3.293 6.707A1 1 0 013 6V4z" />
            </svg>
        </button>
    </div>
</div>


<!-- drawer component -->
<div id="drawer-form" class="drawer fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-form-label">
    <h5 id="drawer-label" class="inline-flex items-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400"><svg class="w-3.5 h-3.5 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z"/>
        </svg>New event</h5>
    <button type="button" data-drawer-hide="drawer-form" aria-controls="drawer-form" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white" >
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <form class="mb-6">
        <!-- Subject Input -->
        <div class="mb-6">
            <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
            <input 
                type="text" 
                name="subject" 
                id="subject" 
                class="text-gray-900 text-sm border-0 block w-full p-2.5 rounded-lg" 
                placeholder="Subject" 
                required
            >
        </div>

        <!-- Teaching Type Dropdown -->
        <div class="mb-6">
            <label for="teaching_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teaching Type</label>
            <select 
                name="teaching_type" 
                id="teaching_type" 
                class="text-gray-900 text-sm rounded-lg border-none block w-full p-2.5 " 
                required
            >
                <option value="2" selected>Any Type</option>
                <option value="0">Online</option>
                <option value="1">Offline</option>
            </select>
        </div>

        <!-- Location Input -->
        <div class="mb-6">
            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
            <input 
                type="text" 
                name="location" 
                id="location" 
                class="text-gray-900 text-sm border-none block w-full p-2.5 rounded-lg" 
                placeholder="Location" 
                required
            >
        </div>

        <!-- min_fee -->
        <div class="mb-6">
            <label for="min_fee" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Minimum Fee</label>
            <input 
                type="number" 
                name="min_fee" 
                id="min_fee" 
                class="text-gray-900 text-sm border-none block w-full p-2.5 rounded-lg" 
                placeholder="Minimum Fee" 
                required
            >
        </div>

        <!-- max_fee -->
        <div class="mb-6">
            <label for="max_fee" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Maximum Fee</label>
            <input 
                type="number" 
                name="max_fee" 
                id="max_fee" 
                class="text-gray-900 text-sm border-none block w-full p-2.5 rounded-lg" 
                placeholder="Maximum Fee" 
                required
            >
        </div>

        <!-- Search Input -->
        <div class="mb-6">
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Search</label>
            <input 
                type="text" 
                name="username" 
                id="username" 
                class="text-gray-900 text-sm border-none block w-full p-2.5" 
                placeholder="Search" 
                required
            >
        </div>

        <!-- Submit Button -->
        <button type="submit" class="text-white justify-center flex items-center bg-primary hover:bg-amber-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Submit
        </button>
    </form>
</div>


<section class="card-container mx-10 px-5 my-8 grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-8">
    {{-- <i class="fa-solid fa-repeat mt-1.5 mr-1"></i> --}}
</section>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        function fetchTutors(){
            console.log("fetchingg..")
            // Gather search parameters
            const subject = $('#subject').val();
            const teaching_type = $('#teaching_type').val();
            const location = $('#location').val();
            const min_fee = $('#min_fee').val()
            const max_fee = $('#max_fee').val()

            // Fetch tutors
            $.ajax({
                url: '/mentor/searchResult',
                method: 'GET',
                data: {
                    subject: subject,
                    teaching_type: teaching_type,
                    location: location,
                    min_fee: min_fee,
                    max_fee: max_fee
                },
                success: function(response){
                    $('.card-container').empty();
                    console.log(response);
                    if(response.message == 'success'){
                        if(response.data.length > 0){
                            console.log("masuk");
                             // append new cards
                            response.data.forEach(tutor => {
                                $('.card-container').append(`
                                    <div class="max-w-sm bg-white border border-[#76460B] rounded-lg">
                                        <a href="#" class="relative">
                                            <img class="rounded-t-lg object-cover w-full h-56" src="{{ asset('flo.jpg') }}" alt="Image description" />
                                            <!-- Text inside the image -->
                                            <div class="absolute bottom-0 w-full bg-primary bg-opacity-50 text-white py-2 px-2">
                                                <p class="font-bold">${tutor.student.full_name}</p>
                                            </div>
                                        </a>
                                        <div class="p-5">
                                            <div class="flex">
                                                <i class="fa-solid fa-star mt-1 mr-1" style="color: #FFD43B;"></i>
                                                <p style="color: #76460B">${tutor.average_rating} (${tutor.total_review} Ulasan)</p>
                                            </div>
                                            <p style="color: #76460B">${tutor.title}</p>
                                            <div class="flex">
                                                <i class="fa-solid fa-clock mt-1.5 mr-1"></i>
                                                <p style="color: #76460B">${tutor.teaching_hours} jam mengajar</p>
                                            </div>
                                            <div class="flex">
                                                <i class="fa-solid fa-location-dot mt-1.5 mr-2"></i>
                                                <p style="color: #76460B">${tutor.student.city}</p>
                                            </div>
                                            <p style="color: #76460B" class="mt-10 font semibold"> Rp ${tutor.hourly_rate}/jam</p>
                                        </div>
                                    </div>
                                `);
                            });
                        }else{
                            console.log("not found");
                            $('.card-container').append(`
                                <div class="col-span-full">
                                    <div class="max-w-sm mx-auto bg-white border border-[#76460B] rounded-lg">
                                        <div class="p-5">
                                            <p class="text-center">Tutor tidak ditemukan</p>
                                        </div>
                                    </div>
                                </div>
                            `);
                        }
                    }

                },
                error: function(error){
                    console.log(error);
                }
            });

            console.log("done fetching")
            
        }
        $('#subject, #teaching_type, #location, #min_fee, #max_fee').on('change', fetchTutors);
    });
</script>
@endsection
