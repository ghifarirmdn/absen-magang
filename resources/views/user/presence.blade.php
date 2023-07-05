@extends('layouts.presence')

@section('content')
    @if (isset($presence->in))
        <form class="space-y-4" action="{{ route('update_presence', $presence) }}" method="POST"
            content-type="multipart/form-data">
            @csrf
            @method('patch')
            <div class="w-full">
                <label for="status"
                    class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-lg">Status</label>
                <select name="status"
                    class="w-full rounded-md border  bg-white ring-gray-300 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option selected>{{ $presence->status }}</option>
                </select>
            </div>
            <div class="video flex flex-col items-center gap-3">
                <video id="video" autoplay class="rounded-md w-3/4 h-48 border border-sky-400"></video>
                <input type="text" name="photo" id="photo-input" hidden></input>
                <img id="photo-preview" width="320" height="240" class="rounded-md w-3/4 h-48 border border-sky-400">
                <button type="button" id="takePhoto" class="bg-green-500 px-3 py-1.5 text-white rounded-md"><i
                        class="fa-solid fa-camera"></i>Take Photo</button>
            </div>
            <div class="flex justify-center">
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-orange-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 md:w-1/2 md:h-10 md:items-center lg:h-12 lg:text-lg 2xl:w-1/2">Submit</button>
            </div>
        </form>
    @else
        <form class="space-y-4" action="{{ route('store_presence', $presence) }}" method="POST"
            content-type="multipart/form-data">
            @csrf
            <div class="w-full">
                <label for="status"
                    class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-lg">Status</label>
                <select name="status"
                    class="w-full rounded-md border  bg-white ring-gray-300 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option selected>Status</option>
                    <option value="WFH">WFH</option>
                    <option value="WFO">WFO</option>
                </select>
            </div>
            <div class="video flex flex-col items-center gap-3">
                <video id="video" autoplay class="rounded-md w-3/4 h-48 border border-sky-400"></video>
                <input type="text" name="photo" id="photo-input" hidden></input>
                <img id="photo-preview" width="320" height="240" class="rounded-md w-3/4 h-48 border border-sky-400">
                <button type="button" id="takePhoto" class="bg-green-500 px-3 py-1.5 text-white rounded-md"><i
                        class="fa-solid fa-camera"></i>Take Photo</button>
            </div>
            <div class="flex justify-center">
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-orange-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 md:w-1/2 md:h-10 md:items-center lg:h-12 lg:text-lg 2xl:w-1/2">Submit</button>
            </div>
        </form>
    @endif
@endsection
