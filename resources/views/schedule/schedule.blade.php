@extends('layout.base')

@section('styles')
    <style>
        .slot {
            transition: 0.3s all;
        }
    </style>
@endsection

@section('content')
    <div class=" p-8 w-full">
        <!-- Header -->
        <div class="flex items-center justify-center mb-6 text-3xl md:text-5xl">
            <button onclick="subtractOneDay()"><i class="fa-solid fa-angles-left text-2xl md:text-4xl"></i></button>
            <h1 class="font-semibold px-4 text-center 2-[68%] md:w-[58%]" id="dateNow">Monday, 7 October 2024</h1>
            <button onclick="addOneDay()"><i class="fa-solid fa-angles-right text-2xl md:text-4xl"></i></button>
        </div>

        <!-- Time slots grid -->
        <div class="grid grid-cols-3 gap-3 w-[80%] md:w-[60%] mx-auto mt-10">
            <!-- Repeat this div for each time slot -->
            <div class="col-span-1 flex flex-col">
                <i class="fa-solid fa-sun text-center p-3 text-2xl"></i>
                <button id="6" class="slot w-full rounded-lg text-white text-center bg-[#9f4444] p-4 mb-3">
                    06.00-07.00
                </button>
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
                style="background-color: #DA9318">
                Save schedule
            </button>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
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

        function addOneDay() {
            currentDate.setDate(currentDate.getDate() + 1);
            dateEle.html(formatDate(currentDate));
        }

        function subtractOneDay() {
            currentDate.setDate(currentDate.getDate() - 1);
            dateEle.html(formatDate(currentDate));
        }

        // update time slot based on db and currentDate
        function updateTimeSlot() {
            let formattedDate = currentDate.getFullYear() + '-' +
                String(currentDate.getMonth() + 1).padStart(2, '0') + '-' +
                String(currentDate.getDate()).padStart(2, '0');

            $.ajax({
                url: '{{ route('schedule.getAvailableSlot') }}',
                type: 'GET',
                data: {
                    date: formattedDate,
                },
                success: function(response) {
                    console.log('Success:', response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        // Current date
        let currentDate = new Date();
        let dateEle = $('#dateNow');
        dateEle.html(formatDate(currentDate));

        // Selected hours
        let hours = [];

        $(function() {
            $('.slot').on('click', function(e) {
                let slotId = this.id;
                this.classList.toggle('bg-[#9f4444]');
                this.classList.toggle('bg-[#17B169]');

                if (hours.includes(slotId)) {
                    hours = hours.filter(item => item !== slotId);
                } else {
                    hours.push(slotId);
                }
                console.log(hours);
            });
        });
    </script>
@endsection
