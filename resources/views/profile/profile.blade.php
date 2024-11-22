@extends('layout.authBase')

@section('styles')
@endsection

@section('content')
<div class="px-5 mx-auto w-2/5 py-8">
    <div class="flex justify-between items-center">
        <p class="font-bold text-2xl">Edit Profile</p>
        <img src="{{ asset('bun.jpg') }}" alt="" class="w-20 h-20 rounded-full justify-end items-end">
    </div>
    <div class="gird grid-cols-2">
        <form class="space-y-4 md:space-y-6" action="" method="">
            @csrf
            <div class="grid grid-cols-2 gap-5">
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
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">email</label>
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
            <div class="flex gap-5">
                <button type="submit" class="w-24 border focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-3xl text-white p-3 text-center" style="color:#DA9318; border-color:#DA9318">Cancel</button>
                <button type="submit" class="w-24 border focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-3xl text-white p-3 text-center" style="background-color: #DA9318">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
@endsection
