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
            Guru Berpengalaman 4 Tahun Dalam Dunia Pendidikan Dan Seni, Membuka Fun Class Bagi Anak-Anak di Jakarta Dan Sekitarnya (Kids Friendly and Fluent English)
        </h2>

        <p class="text-xl mb-5">Lokasi Kursus</p>

        <div class="flex mb-10">
            <button class="border shadow bg-white rounded-full w-40 p-3"><i class="fa-solid fa-video mr-3"></i>Online</button>
            <button class="border shadow bg-white rounded-full w-40 p-3 ml-5"><i class="fa-solid fa-map mr-3"></i>Onsite</button>
        </div>
        <div class="border rounded-3xl w-4/5 p-5" style="background-color: #C9F0B7">
            <h1 class="font-semibold mb-2 text-lg">About Timothy</h1>
            <p class="mb-5">
                Saya Merupakan Guru Berpengalaman 3 Tahun dalam dunia Pendidikan dan Seni. Mengajar Private Mulai dari tingkat SD-Perkuliahan. Mengusai metode Berbagai macam metode media gambar dan juga merupakan lulusan dari global art. selain itu aktif juga menjadi talent partner pada berbagai lembaga dalam bidang pendidik seni mulai dari Superprof sampai dengan Gredu Asia.
            </p>
            <button class="border rounded-2xl p-2 w-28 border-black">Read More</button>
        </div>
        <div class="border rounded-3xl w-4/5 p-5 bg-white mt-10">
            <p class="mb-10 text-2xl mt-3">Ulasan (20)</p>
            <div class="border rounded-3xl w-5/6 p-5" style="background-color: #F7F6F5">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <img class="rounded-full w-10" src="{{ asset('MentoraClean.png') }}" alt="">
                        <p class="ml-4 font-semibold text-lg">Bambang</p>
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
            </div>
            <div class="border rounded-3xl w-5/6 p-5 mt-5 ml-24" style="background-color: #F7F6F5">
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
            </div>
        </div>
    </div>

    <div class="right mr-24">
        <div class="max-w-sm w-80 bg-white shadow items-center rounded-3xl">
            <i class="flex p-5 fa-lg fa-regular fa-heart justify-end"></i>
            <img class="p-5 w-44 rounded-3xl mx-auto -mt-10" src="{{ asset('flo.jpg') }}" alt="" />
            <div class="p-5 text-center">
                <h5 class="text-lg -mt-5 font-semibold text-gray-900">Timothy Vieri</h5>
                <p class="mb-3 text-xs" style="color: #76460B"><i class="fa-solid fa-star" style="color: #FFD43B;"></i> 4,9 (70 ulasan)</p>
                <div class="grid grid-cols-2 p-3 mb-3">
                    <p class="text-start">Tarif per jam</p>
                    <p class="font-bold text-end">Rp 300.000</p>
                    <p class="text-start">Jumlah Murid</p>
                    <p class="font-bold text-end">50+</p>
                    <p class="text-start">Waktu Respons</p>
                    <p class="font-bold text-end">±5 Jam</p>
                </div>
                <button class="rounded-full p-3 font-semibold text-white w-40" style="background-color: #3A86FF">Reserve Now</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection
