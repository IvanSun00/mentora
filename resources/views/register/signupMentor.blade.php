@extends('layout.base')

@section('styles')
@endsection

@section('content')
<section>
    <div class="flex flex-col items-center justify-center py-8 mx-auto">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
            <img class="h-36 w-36" src="{{ asset('MentoraClean.png') }}" alt="logo">
        </a>
        <div class="w-full">
            <div class="p-6 space-y-6">
                <form class="space-y-4 md:space-y-6" action="#">
                    <div>
                        <label for="biodata" class="block mb-2 text-sm font-medium text-gray-900">Biodata</label>
                        <input type="text" name="biodata" id="biodata" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Saya adalah seorang programmer professional dengan lebih dari 5 tahun pengalaman" required="">
                    </div>
                    <div>
                        <label for="rate" class="block mb-2 text-sm font-medium text-gray-900">Hourly Rate</label>
                        <input type="number" name="rate" id="rate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" placeholder="1,000,000" required="">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Subject to Teach</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="English" required="">
                    </div>
                    <h1 class="font-bold text-lg">Upload file CV</h1>
                    <button class="rounded-full w-36 border p-3 text-white" style="background-color: #DA9318">Upload</button>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                          <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300" required="">
                        </div>
                        <div class="ml-3 text-sm">
                          <label for="terms" class="font-light">I accept the <a class="font-medium underline" href="#">Terms and Conditions</a></label>
                        </div>
                    </div>
                    <button type="submit" class="w-full border focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-full text-white p-3 text-center" style="background-color: #DA9318">Create an account</button>
                </form>
            </div>
        </div>
    </div>
  </section>
@endsection

@section('scripts')
@endsection
