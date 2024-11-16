@extends('layout.authBase')

@section('styles')
@endsection

@section('content')
<section>
    <div class="flex flex-col items-center justify-center py-8 mx-auto">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
            <img class="h-36 w-36" src="{{ asset('MentoraClean.png') }}" alt="logo">
        </a>
        <div class="border shadow w-1/3 p-8">
            <div class="w-full">
                <div class="p-6 space-y-6">
                    <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="jonhdoe123" required="" value="{{ old('username') }}">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                        </div>
                        <p class="text-sm font-medium">
                            Don't have an account? <a href="{{ route('register') }}" class="font-bold text-primary-600 underline">Sign Up</a>
                        </p>
                        <button type="submit" class="w-full border focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-full text-white p-3 text-center" style="background-color: #DA9318">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection

@section('scripts')
@endsection
