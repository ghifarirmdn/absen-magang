@extends('layouts.admin')

@section('container')
    <h3 class="text-gray-700 text-3xl font-medium capitalize">Data Pengguna</h3>

    <div class="w-full p-5 mt-5 bg-white border border-gray-200 rounded-lg shadow">
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContents"
                role="tablist">
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 text-orange-400 border-transparent rounded-t-lg hover:text-gray-600 hover:border-orange-300"
                        id="detail-tab" data-tabs-target="#detail" type="button" role="tab" aria-controls="detail"
                        aria-selected="false">Details</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 text-orange-400 border-transparent rounded-t-lg hover:text-gray-600 hover:border-orange-300"
                        id="edit-tab" data-tabs-target="#edit" type="button" role="tab" aria-controls="edit"
                        aria-selected="false">Edit</button>
                </li>
            </ul>
        </div>
        {{-- https://tailwindcomponents.com/component/profile-page/landing --}}
        <div id="myTabContents">
            <div class="p-4 rounded-lg" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                <table>
                    <tbody>
                        <tr>
                            <td class="detail-left font-medium text-lg">Name</td>
                            <td class="pl-2">:</td>
                            <td class="pl-5">{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td class="detail-left font-medium text-lg">Email</td>
                            <td class="pl-2">:</td>
                            <td class="pl-5">{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class="detail-left font-medium text-lg">Status</td>
                            <td class="pl-2">:</td>
                            <td class="pl-5">{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                        </tr>
                        <tr>
                            <td class="detail-left font-medium text-lg">Status Pegawai</td>
                            <td class="pl-2">:</td>
                            <td class="pl-5">{{ $user->office->working_status }}</td>
                        </tr>
                        <tr>
                            <td class="detail-left font-medium text-lg">Jam Kerja</td>
                            <td class="pl-2">:</td>
                            <td class="pl-5">{{ $user->office->is_fixed_entry }}</td>
                        </tr>
                        <tr><td class="detail-left font-medium text-lg">Jam Masuk</td>
                            <td class="pl-2">:</td>
                            <td class="pl-5">{{ $user->office->entry_hours }}</td>
                        </tr>
                        <tr>
                            <td class="detail-left font-medium text-lg">Target Jam</td>
                            <td class="pl-2">:</td>
                            <td class="pl-5">{{ $user->office->target }}</td>
                        </tr>
                        <tr>
                            <td class="detail-left font-medium text-lg">Jumlah Libur</td>
                            <td class="pl-2">:</td>
                            <td class="pl-5">{{ $user->office->holidays }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="hidden p-4 rounded-lg dark:bg-gray-800" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                <form action="{{ route('update_user', $user) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                        <input name="name" type="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                            placeholder="Masukkan Nama" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input name="email" type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                            placeholder="Masukkan Email" value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input name="password" type="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
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
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                            placeholder="Masukkan Jam Kerja" value="{{ $user->office->working_hours }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="entry_hours" class="block mb-2 text-sm font-medium text-gray-900">Jam
                            Masuk</label>
                        <input name="entry_hours" type="text" id="entry_hours"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                            placeholder="Masukkan Jam Masuk Kerja" value="{{ $user->office->entry_hours }}">
                    </div>
                    <div class="mb-6">
                        <label for="target" class="block mb-2 text-sm font-medium text-gray-900">Target
                            Jam</label>
                        <input name="target" type="text" id="target"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
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

    <script>
        let tabsContainer = document.querySelector("#tabs");
        let tabTogglers = tabsContainer.querySelectorAll("a");
        console.log(tabTogglers);
        tabTogglers.forEach(function(toggler) {
            toggler.addEventListener("click", function(e) {
            e.preventDefault();
            let tabName = this.getAttribute("href");
            let tabContents = document.querySelector("#tab-contents");
            for (let i = 0; i < tabContents.children.length; i++) {
                tabTogglers[i].parentElement.classList.remove("border-orange-400", "border-b", "opacity-100");  tabContents.children[i].classList.remove("hidden");
                if ("#" + tabContents.children[i].id === tabName) {
                    continue;
                }
                tabContents.children[i].classList.add("hidden");
            }
            e.target.parentElement.classList.add("border-orange-400", "border-b-4", "-mb-px", "opacity-100");
            });
        });
        document.getElementById("default-tab").click();
    </script>
@endsection
