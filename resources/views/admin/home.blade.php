@extends('layouts.main')

@section('container')
    <div class="row">
        <h3 class="text-gray-700 text-3xl font-medium capitalize">Halo, <span
                class="text-orange-400">{{ Auth::user()->name }}</span></h3>
    </div>

    <div class="flex flex-col mt-8">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                #
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Date
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Presence
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Total Hours
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @if (isset($presences))
                            @foreach ($presences as $presence)
                                <tr>
                                    <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                        {{ date('d-m-Y', strtotime($presence->date)) }}
                                    </td>
                                    <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                        <div class="grid grid-rows-2 gap-2">
                                            <div class="text-sm leading-5 text-gray-900">
                                                <i class="fa-solid fa-right-to-bracket bg-green-500 text-white p-[3px]"></i>
                                                {{ $presence->in }}
                                            </div>
                                            <div class="text-sm leading-5 text-gray-900">
                                                <i class="fa-solid fa-right-to-bracket bg-red-500 text-white p-[3px]"></i>
                                                {{ $presence->out }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">
                                            {{ $presence->total_hours }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4"
                                    class="col-span-4 px-6 py-2 whitespace-no-wrap border-b border-gray-200 text-center text-gray-400">
                                    Data belum ada
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
