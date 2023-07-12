@extends('layouts.admin')

@section('container')
    <h3 class="text-gray-700 text-3xl font-medium capitalize">Tambah Pengguna</h3>
    <br>
    <div class="w-full m-auto p-6 bg-white border border-gray-200 rounded-lg shadow">
        <form>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                <input type="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan Nama" required>
            </div>

            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan Email" required>
            </div>

            <div class="mb-6">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Pilih Status</label>
                <select id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5">
                    <option selected>Pilih Status</option>
                    <option>Tetap</option>
                    <option>Magang</option>
                    <option>Freelance</option>
                </select>
            </div>

            <div class="flex justify-end">
                <a href="#" class="bg-orange-400 text-white rounded-md p-2 w-20 text-center hover:bg-orange-500 mb-5">Submit</a>
            </div>    
        </form>
    </div>    

@endsection
