@extends('layouts.admin')
@section('container')
    <h3 class="text-black font-bold text-2xl capitalize 2xl:text-3xl">Ganti Password</h3>

    <div class="p-5 bg-white border border-gray-200 rounded-lg shadow mt-8">
        <form action="" method="post">
            @csrf
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password Lama</label>
                <input name="password" type="password" id="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                    placeholder="Masukkan Password Lama" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password Baru</label>
                <input name="new_password" type="password" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                    placeholder="Masukkan Password Baru" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi Password Baru</label>
                <input name="new_password" type="password" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                    placeholder="Konfirmasi Password Baru" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-orange-400 text-white rounded-md p-2 hover:bg-orange-500 ">Submit</button>
            </div>
        </form>
    </div>
@endsection
