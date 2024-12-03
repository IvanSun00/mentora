
@extends('layout.base')

@section('styles')
<style>
    body {
        background-color: #F7F6F5;
    }
</style>
@endsection

@section('content')

<div class="flex justify-between p-5 mt-5 mx-10">
    <div class="left w-full pr-10">
        <h2 class="font-bold text-2xl w-full mb-10">
            {{ $mentor->title}}
        </h2>

        <p class="text-xl mb-5">Lokasi Kursus</p>

        <div class="flex mb-10">
            @foreach ($mentor->teaching_type as $type)
                <button class="border shadow bg-white rounded-full w-40 p-3 mr-5">{{ $type }}</button>
            @endforeach
        </div>

        <div class="mentor-profile mb-10 pt-5 block md:hidden">
            <div class="w-full bg-white shadow items-center rounded-3xl">
                {{-- <i class="flex p-5 fa-lg fa-regular fa-heart justify-end"></i> --}}
                <img class="p-5 w-44 rounded-3xl mx-auto -mt-10"  src="{{ asset($mentor->student->profile_picture) }}" alt="" />
                <div class="p-5 text-center">
                    <h5 class="text-lg -mt-5 font-semibold text-gray-900">{{ $mentor->student->full_name }}</h5>
                    <p class="mb-3 text-xs" style="color: #76460B"><i class="fa-solid fa-star" style="color: #FFD43B;"></i> {{ $mentor->average_rating }} ({{ $mentor->total_review }} ulasan)</p>
                    <div class="grid grid-cols-2 p-3 mb-3">
                        <p class="text-start">Tarif per jam</p>
                        <p class="font-bold text-end rupiah">{{ $mentor->hourly_rate }}</p>
                        <p class="text-start">Jam mengajar</p>
                        <p class="font-bold text-end">{{ $mentor->teaching_hours}}</p>
                    </div>
                    <button class="rounded-full p-3 font-semibold text-white w-40" style="background-color: #3A86FF">Reserve Now</button>
                </div>
            </div>
        </div>


        <div class="border rounded-3xl w-full p-6" style="background-color: #C9F0B7">
            <h1 class="font-semibold text-lg">About {{ $mentor->student->full_name }}</h1>
            <p>
                {{ $mentor->bio }}
            </p>
        </div>

        {{-- Ulasan --}}
        <div class="border rounded-3xl w-full p-5 bg-white mt-10">
            <p class="mb-10 text-2xl mt-3">Ulasan ({{ $mentor->total_review }})</p>

            {{-- one comment --}}
            @foreach ($mentor->list_review as $review )
                {{-- ulasan --}}
                <div class="border rounded-3xl w-full p-5 mb-5" style="background-color: #F7F6F5">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <img class="rounded-full w-10 h-10 object-cover" src="{{ asset($review->payment->student->profile_picture) }}" alt="">
                            <p class="ml-4 font-semibold text-lg">{{ $review->payment->student->full_name}}</p>
                        </div>
                        <div class="flex items-center">
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>{{ $review->overall_score }}
                        </div>
                    </div>
                    <p class="mt-3">{{ $review->comment }}</p>
                    <div class="flex items-center mt-3">
                        <i class="fa-regular fa-calendar fa-sm"></i>
                        <p class="ml-2 text-sm">{{ $review->created_at }}</p>
                    </div>
                </div>
            @endforeach

            {{-- response --}}
            {{-- <div class="border rounded-3xl w-5/6 p-5 mt-5 ml-24" style="background-color: #F7F6F5">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <img class="rounded-full w-10 h-10" src="{{ asset('flo.jpg') }}" alt="">
                        <p class="ml-4 font-semibold text-lg">Respons Timothy:</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fa-solid fa-star" style="color: #FFD43B;"></i>5
                    </div>
                </div>
                <p class="mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam iste atque illo at aperiam perspiciatis. Beatae inventore doloribus in explicabo!</p>
                <div class="flex items-center mt-3">
                    <i class="fa-regular fa-calendar fa-sm"></i>
                    <p class="ml-2 text-sm">200 November 20222</p>
                </div>
            </div> --}}
        </div>
    </div>

    <div class="right hidden md:block">
        <div class="max-w-sm w-80 bg-white shadow items-center rounded-3xl mt-8">
            <img class="p-5 w-44 rounded-3xl mx-auto -mt-10"  src="{{ asset($mentor->student->profile_picture) }}" alt="" />
            <div class="p-5 pt-0 text-center">
                <h5 class="text-lg font-semibold text-gray-900">{{ $mentor->student->full_name }}</h5>
                <p class="mb-3 text-xs" style="color: #76460B"><i class="fa-solid fa-star" style="color: #FFD43B;"></i> {{ $mentor->average_rating }} ({{ $mentor->total_review }} ulasan)</p>
                <div class="grid grid-cols-2 p-3 mb-3">
                    <p class="text-start">Tarif per jam</p>
                    <p class="font-bold text-end">{{ $mentor->hourly_rate }}</p>
                    <p class="text-start">Jam mengajar</p>
                    <p class="font-bold text-end">{{ $mentor->teaching_hours}}</p>
                </div>
                <a href="{{ route('mentor.reserve', $mentor->id) }}" class="rounded-full p-3 px-5 inline-block font-semibold text-white w-40" style="background-color: #3A86FF">Reserve Now</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function formatRupiah(number) {
        return 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    $(document).ready(function(){
        $('.rupiah').each(function() {
            var amount = parseInt($(this).text());  // Get the current number from the element
            $(this).text(formatRupiah(amount));    // Set the text to the formatted Rupiah value
        });

    });

    document.title = "Mentor Detail";
</script>
@endsection
