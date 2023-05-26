@extends('layouts.main')
@section('container')
<h3 class="text-gray-700 text-3xl font-medium">Profile</h3>

<div class="mt-8 2xl:w-3/4">
    <div class="p-6 bg-white rounded-md shadow-md 2xl:p-10">
        <h2 class="text-lg text-gray-700 font-semibold capitalize">Account settings</h2>
        <div class="flex justify-center mt-10 sm:justify-start sm:ml-10">
            <img src="../image/profile.png" alt="" class="w-24 h-24">
        </div>
        <div class="name mt-12">
            <h4 class="capitalize">{{ Auth::user()->name }}</h4>
            <hr class="w-3/4 border-gray-700 sm:w-1/2 md:w-1/3 2xl:w-1/5">
        </div>
        <div class="email mt-7">
            <h4 class="text-sm">{{ Auth::user()->email }}</h4>
            <hr class="w-3/4 border-gray-700 sm:w-1/2 md:w-1/3 2xl:w-1/5">
        </div>
        <div class="flex mt-7 gap-7">
            <div class="start-magang">
                <div class="flex items-center gap-2">
                    <p>28-01-2023</p>
                    <i class="fa-regular fa-calendar pb-1"></i>
                </div>
                <hr class="w-full border-gray-700">
            </div>
            -
            <div class="end-magang">
                <div class="flex items-center gap-2">
                    <p>28-01-2023</p>
                    <i class="fa-regular fa-calendar pb-1"></i>
                </div>
                <hr class="w-full border-gray-700">
            </div>
        </div>

        <div class="role mt-7">
            <h4 class="text-sm">Intern</h4>
            <hr class="w-3/4 border-gray-700 sm:w-1/2 md:w-1/3 2xl:w-1/5">
        </div>
        
        <button class="mt-7 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-xl" type="button">
            Save Change
        </button>
    </div>
</div>
@endsection