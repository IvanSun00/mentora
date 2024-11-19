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
            Payment Method
        </h2>

    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="font-bold border border-black bg-white rounded-lg p-5 text-center inline-flex items-center mr-5 w-52" type="button"> Transfer Via BCA
        </button>

        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-52 border border-black">
            <ul class="py-2 text-sm" aria-labelledby="dropdownDefaultButton">
            <li>
                <p class="block px-4 py-2">1. Choose <span class="font-bold">m-Transfer > BCA Virtual Account</span></p>
            </li>
            <li>
                <p class="block px-4 py-2">2. Input <span class="font-bold"> Virtual Account number 1234567890 </span>and choose send</p>
            </li>
            <li>
                <p class="block px-4 py-2">3. Input the <span class="font-bold">Total Payment</span></p>
            </li>
            <li>
                <p class="block px-4 py-2">4. Input yout PIN m-BCA Number and choose <span class="font-bold">OK</span></p>
            </li>
            </ul>
        </div>


    </div>

    <div class="right mr-24 flex-col items-center">
        <div class="max-w-sm w-80 bg-white shadow items-center rounded-3xl">
            <i class="flex p-5 fa-lg fa-regular fa-heart justify-end"></i>
            <img class="p-5 w-44 rounded-3xl mx-auto -mt-10" src="{{ asset('flo.jpg') }}" alt="" />
            <div class="p-5 text-center">
                <h5 class="text-lg -mt-5 font-semibold text-gray-900">Timothy Vieri</h5>
                <p class="mb-3 text-sm">English</p>
                <div class="grid grid-cols-2 p-3">
                    <p class="text-start">Price per Hour</p>
                    <p class="font-bold text-end">Rp 300.000</p>
                    <p class="text-start">Total Hours</p>
                    <p class="font-bold text-end">5</p>
                </div>
                <p class="font-bold -mt-5">_______________________________________</p>
                <div class="grid grid-cols-2 p-3 mb-3">
                    <p class="text-start">Total Payment</p>
                    <p class="font-bold text-end">Rp 1.500.000</p>
                </div>
            </div>
        </div>
        <button class="rounded-3xl w-30 p-3 font-semibold text-white mt-5 mx-auto block" style="background-color: #DA9318"><i class="fa-solid fa-arrow-up-from-bracket mr-3" style="color: black"></i>Proof of Payment</button>
        <div id="uploadModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg shadow-lg max-w-md w-full">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-800">Upload Proof of Payment</h2>
                    <button class="text-gray-500 hover:text-gray-700" onclick="closeModal()">✕</button>
                </div>
                <div class="p-6">
                    <form id="uploadForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="paymentProof" class="block text-sm font-medium text-gray-700">
                                Choose a picture
                            </label>
                            <input type="file" id="paymentProof" name="paymentProof" accept="image/*"
                                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                    </form>
                </div>
                <div class="px-6 py-4 bg-gray-100 flex justify-end space-x-4">
                    <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400" onclick="closeModal()">
                        Cancel
                    </button>
                    <button id="submitBtn" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Upload
                    </button>
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
