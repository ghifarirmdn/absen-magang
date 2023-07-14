@extends('layouts.admin')

@section('container')
    <h3 class="text-gray-700 text-3xl font-medium capitalize">Data Pengguna</h3>
    
    <div class="w-full m-auto p-6 bg-white border border-gray-200 rounded-lg shadow">
        <div class="w-1/2 rounded">
            
            <ul id="tabs" class="inline-flex w-full px-1 pt-2 ">
                <li class="px-4 py-2 font-semibold text-black border-b-2 border-orange-400 rounded-t"><a id="default-tab" href="#first">Detail</a></li>
                <li class="px-4 py-2 font-semibold text-black"><a href="#second">Edit</a></li>
            </ul>

            <!-- Tab Contents -->
            <div id="tab-contents">
                <div id="first" class="p-4 grid grid-cols-2 w-full">
                    <div class="detail-left font-bold text-md">
                        <h4>Name</h4>
                        <h4>Email</h4>
                        <h4>Status</h4>
                    </div>
                    <div class="detail-right">
                        <h4>Ghifari Ramadhan</h4>
                        <h4>ghifariramadhan2001@gmail.com</h4>
                        <h4>Internship</h4>
                    </div>
                </div>
                <div id="second" class="hidden p-4 w-full">
                    <form action="{{ route('store_user') }}" method="post">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                            <input name="name" type="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan Nama" required>
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input name="email" type="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan Email" required>
                        </div>
                        <div class="mb-6">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input name="password" type="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan Password" required>
                        </div>
                        <div class="mb-6">
                            <label for="is_admin" class="block mb-2 text-sm font-medium text-gray-900">Pilih Role</label>
                            <select name="is_admin" id="is_admin"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5">
                                <option selected>-- Pilih Role --</option>
                                <option value="1">Admin</option>
                                <option value="0">User</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="working_status" class="block mb-2 text-sm font-medium text-gray-900">Status Pegawai</label>
                            <select name="working_status" id="working_status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5">
                                <option selected>-- Pilih Status Pekerja --</option>
                                <option value="Karyawan">Karyawan</option>
                                <option value="Intern">Intern</option>
                                <option value="Part-time">Part-time</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="working_hours" class="block mb-2 text-sm font-medium text-gray-900">Jam Kerja</label>
                            <input name="working_hours" type="text" id="working_hours"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan Jam Kerja" required>
                        </div>
                        <div class="mb-6">
                            <label for="entry_hours" class="block mb-2 text-sm font-medium text-gray-900">Jam Masuk</label>
                            <input name="entry_hours" type="text" id="entry_hours"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan Jam Masuk Kerja">
                        </div>
                        <div class="mb-6">
                            <label for="target" class="block mb-2 text-sm font-medium text-gray-900">Target Jam</label>
                            <input name="target" type="text" id="target"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan Target Jam Kerja" required>
                        </div>
                        <div class="mb-6">
                            <label for="holidays" class="block mb-2 text-sm font-medium text-gray-900">Pilih Jumlah Libur</label>
                            <select name="holidays" id="holidays"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5">
                                <option selected>-- Pilih Jumlah Hari Libur --</option>
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
