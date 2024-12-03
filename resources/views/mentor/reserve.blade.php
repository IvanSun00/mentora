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
        {{-- <h2 class="font-bold text-2xl w-full mb-10">
            Confirm Lesson
        </h2> --}}
        {{-- time table --}}
        <div class="w-full">
            <!-- Header -->
            <div class="flex items-center justify-center mb-6 text-3xl md:text-5xl">
                <button onclick="subtractOneDay()"><i class="fa-solid fa-angles-left text-2xl md:text-4xl"></i></button>
                <h1 class="font-semibold px-4 text-center 2-[68%] md:w-[58%]" id="dateNow">Monday, 7 October 2024</h1>
                <button onclick="addOneDay()"><i class="fa-solid fa-angles-right text-2xl md:text-4xl"></i></button>
            </div>

            {{-- <button id="6" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                06.00-07.00
            </button> --}}
            <!-- Time slots grid -->
            <div class="grid grid-cols-3 gap-3 w-[80%] md:w-[60%] mx-auto mt-10">
                <!-- Repeat this div for each time slot -->
                <div class="col-span-1 flex flex-col">
                    <i class="fa-solid fa-sun text-center p-3 text-2xl"></i>
                    <button id="6" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                        06.00-07.00

                    <button id="7" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                        07.00-08.00
                    </button>
                    <button id="8" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                        08.00-09.00
                    </button>
                    <button id="9" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                        09.00-10.00
                    </button>
                    <button id="10" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                        10.00-11.00
                    </button>
                    <button id="11" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                        11.00-12.00
                    </button>
                </div>
                <div class="col-span-1 flex flex-col">
                    <i class="fa-solid fa-cloud text-center p-3 text-2xl"></i>
                    <button id="12" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                        12.00-13.00
                    </button>
                    <button id="13" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                        13.00-14.00
                    </button>
                    <button id="14" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                        14.00-15.00
                    </button>
                    <button id="15" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                        15.00-16.00
                    </button>
                    <button id="16" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                        16.00-17.00
                    </button>
                    <button id="17" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                        17.00-18.00
                    </button>
                </div>
                <div class="col-span-1 flex flex-col">
                    <i class="fa-solid fa-moon text-center p-3 text-2xl"></i>
                    <button id="18" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                        18.00-19.00
                    </button>
                    <button id="19" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                        19.00-20.00
                    </button>
                    <button id="20" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                        20.00-21.00
                    </button>
                    <button id="21" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                        21.00-22.00
                    </button>
                    <button id="22" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                        22.00-23.00
                    </button>
                    <button id="23" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                        23.00-24.00
                    </button>
                </div>
            </div>

            <!-- Save Button -->
            <div class="flex justify-center align-middle">
                <button class="mt-3 w-[60%] md:w-[25%] mx-auto py-2 px-4 text-white font-semibold rounded-full text-xl"
                    style="background-color: #DA9318" onclick="ReserveSlot()">
                    Reserve Now
                </button>
            </div>
        </div>


        <p class="text-xl mb-5 font-bold">Pilih Metode Kursus</p>
        <div class="flex mb-10">
            @foreach ($mentor->teaching_type as $type)
                <button class="border shadow bg-white rounded-full w-40 p-3 mr-5">{{ $type }}</button>
            @endforeach
        </div>
    </div>


    <div class="right hidden md:block">
        <div class="max-w-sm w-80 bg-white shadow items-center rounded-3xl mt-8">
            <img class="p-5 w-44 rounded-3xl mx-auto -mt-10"  src="{{ asset($mentor->student->profile_picture) }}" alt="" />
            <div class="p-5 pt-0 text-center">
                <h5 class="text-lg font-semibold text-gray-900">{{ $mentor->student->full_name }}</h5>
                <p class="mb-3 text-xs" style="color: #76460B"><i class="fa-solid fa-star" style="color: #FFD43B;"></i> {{ $mentor->average_rating }} ({{ $mentor->total_review }} ulasan)</p>
                <div class="grid grid-cols-2 p-3 mb-1">
                    <p class="text-start">Tarif per jam</p>
                    <p class="font-bold text-end rupiah">{{ $mentor->hourly_rate }}</p>
                    <p class="text-start">Total Jam Mengajar</p>
                    <p class="font-bold text-end" id="jam_mengajar">0</p>
                </div>
                {{-- buat garis panjang --}}
                <hr class="w-full mx-auto mb-3" style="border: 1px solid #E0E0E0">

                <div class="grid grid-cols-2 p-3 mb-1">
                    <p class="text-start">Total Tarif</p>
                    <p class="font-bold text-end" id="total_tarif">0</p>
                </div>
                {{-- <button class="rounded-full p-3 font-semibold text-white w-40" style="background-color: #3A86FF">Reserve Now</button> --}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Current date
    let dateNow = new Date();
    let currentDate = new Date();
    let dateEle = $('#dateNow');
    dateEle.html(formatDate(currentDate));
    // available hours
    let hours = [];
    // selected hours
    let selectedHours= [];

    function formatDate(date) {
        const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        const months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        const dayName = days[date.getDay()];
        const day = date.getDate();
        const monthName = months[date.getMonth()];
        const year = date.getFullYear();

        return `${dayName}, ${day} ${monthName} ${year}`;
    }
    function formatRupiah(number) {
        return 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }


    function addOneDay() {
        currentDate.setDate(currentDate.getDate() + 1);
        dateEle.html(formatDate(currentDate));
        updateTimeSlot();
    }
    function subtractOneDay() {
        if(currentDate.getDate() == dateNow.getDate()) return;
        currentDate.setDate(currentDate.getDate() - 1);
        dateEle.html(formatDate(currentDate));
        updateTimeSlot();
    }

    function updateTimeSlot(){
        // reset
        let timeSlots = document.querySelectorAll('.slot');
        timeSlots.forEach(function(slot) {
            slot.classList.value = 'slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3';
        });
        hours = [];
        selectedHours = [];
        updateTotalTarif();
        let formattedDate = currentDate.getFullYear() + '-' +
                String(currentDate.getMonth() + 1).padStart(2, '0') + '-' +
                String(currentDate.getDate()).padStart(2, '0');

        // get data
        console.log("query" + formattedDate);
        $.ajax({
            url: '{{ route('schedule.getAvailableMentorSlot') }}',
            type: 'GET',
            data:{
                date: formattedDate,
                mentor_id: {{ $mentor->id }}
            },
            success: function(response){
                console.log(response)
                if(response.message == 'success'){
                    let schedules = response.data;

                    schedules.forEach(schedule => {
                        if(schedule['is_available']){
                            let slot = document.querySelector(`.slot[id="${schedule['hour_start']}"]`);
                            slot.classList.toggle('bg-[#9f4444]'); //hapus merah
                            slot.classList.toggle('bg-[#17B169]'); //kasik hijau

                            hours.push(schedule['hour_start']);
                        }
                    });

                }
            },
            error: function(xhr, status, error){
                console.error('Error:', error);
            }
        });
    }
    function ReserveSlot(){
        if(selectedHours.length == 0){
            Swal.fire({
                title: "Oops!",
                text: "Pilih jam terlebih dahulu",
                icon: "error",
                confirmButtonColor: '#DA9318',
            });
            return;
        }
        // redirect to other page for payment
        window.location.href = `{{ route('mentor.payment', ['mentor' => $mentor->id]) }}?date=${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}-${String(currentDate.getDate()).padStart(2, '0')}&hours=${selectedHours}`;

    }


    $(document).ready(function(){
        $('.rupiah').each(function() {
            var amount = parseInt($(this).text());  // Get the current number from the element
            $(this).text(formatRupiah(amount));    // Set the text to the formatted Rupiah value
        });

        $('.slot').on('click', function(e) {
            let slotId = parseInt(this.id, 10);
            let isInHours = hours.includes(slotId);
            if(isInHours){
                this.classList.toggle('bg-[#DA9318]');
                this.classList.toggle('bg-[#17B169]');
                selectedHours.includes(slotId)? selectedHours = selectedHours.filter(item => item !== slotId) : selectedHours.push(slotId);
                updateTotalTarif();
            }
            console.log("selectedHours ",selectedHours);
        });

        updateTimeSlot();
    });

    function updateTotalTarif(){
        let totalTarif = selectedHours.length * {{ $mentor->hourly_rate }};
        $('#total_tarif').html(formatRupiah(totalTarif));
        $('#jam_mengajar').html(selectedHours.length);
    }

    document.title = "Reserve Mentor";

</script>
@endsection
