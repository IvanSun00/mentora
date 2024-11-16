@extends('layout.authBase')

@section('styles')
@endsection

@section('content')
<section>
    <div class="flex flex-col items-center justify-center py-8 mx-auto">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
            <img class="h-36 w-36" src="{{ asset('MentoraClean.png') }}" alt="logo">
        </a>
        <div class="border shadow w-1/2 rounded-xl p-8 mt-5">
            <div class="w-full">
                <div class="p-6 space-y-6">
                    <form class="space-y-4 md:space-y-6" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-2 space-x-5">
                            <div>
                                <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900">First name</label>
                                <input type="text" name="first-name" id="first-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="John" required="" value="{{ old('first-name') }}">
                            </div>
                            <div>
                                <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900">Last name</label>
                                <input type="text" name="last-name" id="last-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Doe" required="" value="{{ old('last-name') }}">
                            </div>
                        </div>
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="jonhdoe123" required="" value="{{ old('username') }}">
                        </div>
                        <div>
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900">Phone Number</label>
                            <input type="number" name="phone_number" id="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" placeholder="081233530876" required="" value="{{ old('phone_number') }}">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required="" value="{{ old('email') }}">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                        </div>
                        <div>
                            <label for="dob" class="block mb-2 text-sm font-medium text-gray-900">Birth Date</label>
                            <input type="date" name="dob" id="dob" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="" value="{{ old('dob') }}">
                        </div>
                        <div>
                            <label for="city" class="block mb-2 text-sm font-medium text-gray-900">City</label>
                            <input type="text" name="city" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Jakarta" required="" value="{{ old('city') }}">
                        </div>
                        <h1 class="font-bold text-lg">Upload foto selfie dengan KTP/Kartu Siswa</h1>
                        <input id="file-upload" type="file" name="ktp_file" accept="image/*" value="{{ old('ktp_file') }}" required>

                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300" required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-light">I accept the <a class="font-medium underline" href="#">Terms and Conditions</a></label>
                            </div>
                        </div>
                        <p class="text-sm font-medium">
                            Already have an account? <a href="{{ route('login') }}" class="font-bold text-primary-600 underline">Sign In</a>
                        </p>
                        <button type="submit" class=" w-1/2 flex justify-center mx-auto border focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-full text-white p-3 text-center" style="background-color: #DA9318">Create an account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
@endsection
