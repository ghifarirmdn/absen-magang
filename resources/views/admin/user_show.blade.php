@extends('layouts.admin')

@section('container')
    <h3 class="text-gray-700 text-3xl font-medium capitalize">Data Pengguna</h3>

    <div class="w-full p-5 mt-5 bg-white border border-gray-200 rounded-lg shadow">
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContents"
                role="tablist">
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 text-orange-400 border-transparent rounded-t-lg hover:text-gray-600 hover:border-orange-300 dark:hover:text-gray-300"
                        id="detail-tab" data-tabs-target="#detail" type="button" role="tab" aria-controls="detail"
                        aria-selected="false">Details</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 text-orange-400 border-transparent rounded-t-lg hover:text-gray-600 hover:border-orange-300 dark:hover:text-gray-300"
                        id="edit-tab" data-tabs-target="#edit" type="button" role="tab" aria-controls="edit"
                        aria-selected="false">Edit</button>
                </li>
            </ul>
        </div>
        {{-- https://tailwindcomponents.com/component/profile-page/landing --}}
        <div id="myTabContents">
            <div class="hidden p-4 rounded-lg dark:bg-gray-800" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                <div class="detail-left font-bold text-md">
                    <h4>Name</h4>
                    <h4>Email</h4>
                    <h4>Status</h4>
                    <h4>Status Pegawai</h4>
                    <h4>Jam Kerja</h4>
                    <h4>Jam Masuk</h4>
                    <h4>Target Jam</h4>
                    <h4>Jumlah Libur</h4>
                </div>
                <div class="detail-right">
                    <h4>{{ $user->name }}</h4>
                    <h4>{{ $user->email }}</h4>
                    <h4>{{ $user->is_admin ? 'Admin' : 'User' }}</h4>
                    <h4>{{ $user->office->working_status }}</h4>
                    <h4>{{ $user->office->working_hours }} Jam</h4>
                    <h4>{{ $user->office->entry_hours }}</h4>
                    <h4>{{ $user->office->target }}</h4>
                    <h4>{{ $user->office->holidays }} day</h4>
                </div>
            </div>
            <div class="hidden p-4 rounded-lg dark:bg-gray-800" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                <form action="{{ route('update_user', $user) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                        <input name="name" type="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Masukkan Nama" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input name="email" type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Masukkan Email" value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input name="password" type="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Masukkan Password">
                    </div>
                    <div class="mb-6">
                        <label for="is_admin" class="block mb-2 text-sm font-medium text-gray-900">Pilih
                            Role</label>
                        <select name="is_admin" id="is_admin"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5">
                            <option value="{{ $user->is_admin }}" selected>-- Pilih Role --</option>
                            <option value="1">Admin</option>
                            <option value="0">User</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="working_status" class="block mb-2 text-sm font-medium text-gray-900">Status
                            Pegawai</label>
                        <select name="working_status" id="working_status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5">
                            <option value="{{ $user->office->working_status }}" selected>-- Pilih Status Pekerja --
                            </option>
                            <option value="Karyawan">Karyawan</option>
                            <option value="Intern">Intern</option>
                            <option value="Part-time">Part-time</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="working_hours" class="block mb-2 text-sm font-medium text-gray-900">Jam
                            Kerja</label>
                        <input name="working_hours" type="text" id="working_hours"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Masukkan Jam Kerja" value="{{ $user->office->working_hours }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="entry_hours" class="block mb-2 text-sm font-medium text-gray-900">Jam
                            Masuk</label>
                        <input name="entry_hours" type="text" id="entry_hours"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Masukkan Jam Masuk Kerja" value="{{ $user->office->entry_hours }}">
                    </div>
                    <div class="mb-6">
                        <label for="target" class="block mb-2 text-sm font-medium text-gray-900">Target
                            Jam</label>
                        <input name="target" type="text" id="target"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Masukkan Target Jam Kerja" value="{{ $user->office->target }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="holidays" class="block mb-2 text-sm font-medium text-gray-900">Pilih Jumlah
                            Libur</label>
                        <select name="holidays" id="holidays"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5">
                            <option value="{{ $user->office->holidays }}" selected>-- Pilih Jumlah Hari Libur --</option>
                            <option value="1">1 hari libur</option>
                            <option value="2">2 hari libur</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-orange-400 text-white rounded-md p-2 w-20 mx-auto hover:bg-orange-500 mb-5">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
