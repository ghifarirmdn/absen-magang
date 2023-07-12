@extends('layouts.admin')

@section('container')
    <h3 class="text-gray-700 text-3xl font-medium capitalize">Data Pengguna</h3>

    <div class="flex justify-end mt-8">
        <a href="{{ route('create-users') }}" class="bg-orange-400 p-2 rounded-md text-white hover:bg-orange-500">Tambahkan Pengguna</a>
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
                                Name
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @if (isset($users))
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">
                                            {{ $user->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">
                                            {{ $user->email }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">
                                            {{-- {{ $user->is_admin }} --}}Internship
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
