@extends('layout.base')

@section('styles')
<style>
    body {
        background-color: #F7F6F5;
    }
</style>
@endsection

@section('content')

<div class="flex  flex-col lg:flex-row justify-between p-5 mt-5 mx-0 sm:mx-10 lg:mx-20">
    <div class="left w-full pr-0 lg:pr-10 mb-10">
        <h2 class="font-bold text-2xl w-4/5 mb-10">
            Payment Method
        </h2>

        <div id="accordion-collapse" data-accordion="collapse">
            <!-- Accordion Item for All Steps -->
            <h2 id="accordion-collapse-heading-1">
                <button type="button" class="flex items-center justify-between w-full p-5 font-medium bg-white border border-black rounded-t-lg text-black" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                <span class="!text-black">Transfer Via BCA</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                <div class="p-5 border border-gray-200 bg-white">
                <!-- Step 1 -->
                <p class="mb-2 text-gray-700">1. Choose <span class="font-bold">m-Transfer > BCA Virtual Account</span></p>

                <!-- Step 2 -->
                <p class="mb-2 text-gray-700">2. Input <span class="font-bold">Virtual Account number 1234567890</span> and choose "send".</p>

                <!-- Step 3 -->
                <p class="mb-2 text-gray-700">3. Input the <span class="font-bold">Total Payment</span></p>

                <!-- Step 4 -->
                <p class="text-gray-700">4. Input your <span class="font-bold">PIN m-BCA Number</span> and choose <span class="font-bold">OK</span>.</p>
                </div>
            </div>
        </div>

    </div>

    <div class="right ">
        <div class="w-full lg:w-96 bg-white shadow items-center rounded-3xl">
            <img class="p-5 w-44 rounded-3xl mx-auto" src="{{ asset($mentor->student->ktp_link) }}" alt="" />
            <div class="p-5 pt-0 text-center">
                <h5 class="text-lg font-semibold text-gray-900">{{ $mentor->student->full_name }}</h5>
                <p class="mb-3 text-sm">{{ $mentor->subject }}</p>
                <div class="grid grid-cols-2 p-3">
                    <p class="text-start">Price per Hour</p>
                    <p class="font-bold text-end rupiah">{{ $mentor->hourly_rate }}</p>
                    <p class="text-start">Total Hours</p>
                    <p class="font-bold text-end">{{ count($hours) }}</p>
                </div>
                <div class="font-bold border-b-2 border-black"></div>
                <div class="grid grid-cols-2 p-3 mb-3">
                    <p class="text-start">Total Payment</p>
                    <p class="font-bold text-end rupiah">{{ $mentor->hourly_rate*count($hours) }}</p>
                </div>
            </div>
        </div>
        <button class="rounded-3xl w-30 p-3 font-semibold text-white mt-5 mb-10 mx-auto block" style="background-color: #DA9318"  onclick="openModal()">
            <i class="fa-solid fa-arrow-up-from-bracket mr-3" style="color: black"></i>Proof of Payment
        </button>




        <div id="uploadModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg shadow-lg max-w-md w-full">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-800">Upload Proof of Payment</h2>
                    <button class="text-gray-500 hover:text-gray-700" onclick="closeModal()">✕</button>
                </div>
                <form id="uploadForm" method="POST" enctype="multipart/form-data" action="{{ route('mentor.paymentProcess',$mentor->id) }}">
                    <div class="p-6">
                            @csrf
                            <div class="mb-4">
                                <label for="paymentProof" class="block text-sm font-medium text-gray-700">
                                    Choose a picture
                                </label>
                                <input type="file" id="paymentProof" name="paymentProof" accept="image/*"
                                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>

                                {{-- hidden input date,hours --}}
                                <input type="hidden" name="date" value="{{ $date }}">
                                @foreach ($hours as $hour)
                                    <input type="hidden" name="hours[]" value="{{ $hour }}">
                                @endforeach


                            </div>
                    </div>
                    <div class="px-6 py-4 bg-gray-100 flex justify-end space-x-4">
                        <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400" onclick="closeModal()">
                            Cancel
                        </button>
                        <button id="submitBtn" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Upload
                        </button>
                    </div>
                </form>
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

    // Open the modal
    function openModal() {
        document.getElementById('uploadModal').classList.remove('hidden');
    }

    // Close the modal
    function closeModal() {
        document.getElementById('uploadModal').classList.add('hidden');
    }

    $(document).ready(function(){
        $('.rupiah').each(function() {
            var amount = parseInt($(this).text());  // Get the current number from the element
            $(this).text(formatRupiah(amount));    // Set the text to the formatted Rupiah value
        });

    });

    document.title = "Payment";
</script>
@endsection
