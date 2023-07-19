<div x-cloak :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
    class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>

<div x-cloak :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-8">
        <div class="flex items-center">
            <img src="../image/logo.png" alt="logo otak kanan" width="50" height="50">
            <span class="mx-2 text-2xl font-semibold text-orange-400">Otak Kanan</span>
        </div>
    </div>

    <nav class="mt-10">
        <a href="{{ route('home') }}"
            class="flex items-center px-6 py-2 mt-4 hover:bg-gray-700 hover:text-gray-100 hover:bg-opacity-25 {{ request()->is('home*') ? 'text-white bg-gray-700' : 'text-gray-500' }}">
            <i class="fa-solid fa-house"></i><span class="mx-3">Home</span>
        </a>

        @if (Auth::user()->is_admin)
            <a class="flex items-center px-6 py-2 mt-4 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ request()->is('users*') ? 'text-white bg-gray-700' : 'text-gray-500' }}"
                href="{{ route('users') }}">
                <i class="fa-solid fa-users"></i><span class="mx-3">Users</span>
            </a>
            <a class="flex items-center px-6 py-2 mt-4 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ request()->is('recap*') ? 'text-white bg-gray-700' : 'text-gray-500' }}"
                href="{{ route('recap_presence') }}">
                <i class="fa-solid fa-list"></i></i><span class="mx-3">Recap</span>
            </a>
        @endif
        <a href="{{ route('performance') }}" class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ request()->is('performance*') ? 'text-white bg-gray-700' : 'text-gray-500' }}">
            <i class="fa-solid fa-gauge"></i><span class="mx-3">Performance</span>
        </a>

        <a href="{{ route('change_password') }}" class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ request()->is('change-password*') ? 'text-white bg-gray-700' : 'text-gray-500' }}">
            <i class="fa-solid fa-key"></i><span class="mx-3">Ganti Password</span>
        </a>

        <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
            href="{{ route('logout') }}">
            <i class="fa-solid fa-right-from-bracket"></i><span class="mx-3">Logout</span>
        </a>
    </nav>
</div>
