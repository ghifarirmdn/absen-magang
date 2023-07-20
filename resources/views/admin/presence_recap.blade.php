@extends('layouts.admin')

@section('container')
    <div class="flex justify-between mt-5">
        <h3 class="text-gray-700 text-3xl font-medium">Rekap Absensi Pegawai</h3>
        <a href="{{ route('export_excel') }}" class="bg-orange-400 p-2 rounded-md text-white text-sm hover:bg-orange-500"><i
                class="fa-solid fa-download mr-1"></i> Download Recap</a>
    </div>
    <div class="flex flex-col mt-5">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                No
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Nama
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Jam Masuk
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Jam Pulang
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Durasi
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Keterangan
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @foreach ($presences as $presence)
                            <tr>
                                <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $presence->date }}
                                    </div>
                                </td>
                                <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $presence->user->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $presence->user->office->working_status }}
                                    </div>
                                </td>
                                <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $presence->in ?? '-' }}
                                    </div>
                                </td>
                                <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $presence->out ?? '-' }}
                                    </div>
                                </td>
                                <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $presence->total_hours }}
                                    </div>
                                </td>
                                <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">
                                        @if (isset($presence->in))
                                            <span
                                                class="bg-green-100 text-green-800 text-md font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Masuk</span>
                                        @else
                                            <span
                                                class="bg-red-100 text-red-800 text-md font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Izin</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
