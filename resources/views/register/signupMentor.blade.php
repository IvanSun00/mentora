@extends('layout.authBase')

@section('styles')
@endsection

@section('content')
<section>
    <div class="flex flex-col items-center justify-center py-8 mx-auto">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
            <img class="h-36 w-36" src="{{ asset('MentoraClean.png') }}" alt="logo">
        </a>
        <div class="border shadow w-1/2 p-8 rounded-xl">
            <div class="w-full">
                <div class="p-6 space-y-6">
                    <form class="space-y-4 md:space-y-6" action="{{ route('register.mentor') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="biodata" class="block mb-2 text-sm font-medium text-gray-900">Biodata</label>
                            <input type="text" name="biodata" id="biodata" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Saya adalah seorang programmer professional dengan lebih dari 5 tahun pengalaman" required="" value="{{ old('biodata') }}">
                        </div>
                        <div>
                            <label for="rate" class="block mb-2 text-sm font-medium text-gray-900">Hourly Rate</label>
                            <input type="number" name="rate" id="rate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" placeholder="100000" required="" value="{{ old('rate') }}">
                        </div>
                        <div>
                            <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Subject to Teach</label>
                            <input type="text" name="subject" id="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="English" required="" value="{{ old('subject') }}">
                        </div>
                        <h1 class="font-bold text-lg">Upload file CV (.pdf)</h1>
                        <input id="file-upload" type="file" name="cv_file" value="{{ old('cv_file') }}" accept=".pdf" required value="{{ old('cv_file') }}">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300" required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-light">I accept the <a class="font-medium underline" href="#">Terms and Conditions</a></label>
                            </div>
                        </div>
                        <button type="submit" class="w-1/2 flex justify-center mx-auto border focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-full text-white p-3 text-center" style="background-color: #DA9318">Create an account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
@endsection
