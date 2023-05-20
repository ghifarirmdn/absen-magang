<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    <div class="flex min-h-full mt-28 flex-col justify-center my-20 sm:mt-52 sm:flex sm:items-center md:flex md:items-center lg:flex lg:items-center xl:flex xl:items-center 2xl:flex 2xl:items-center">
        <div class="flex flex-col items-center sm:flex-row sm:justify-center sm:gap-5  sm:mx-auto sm:w-full ">
            <img class="h-10 w-auto md:w-12 md:h-12" src="image/otak kanan.jpg" alt="Your Company">
            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 sm:text-2xl md:text-4xl">Otak Kanan Group</h2>
        </div>

        <div class="mt-10 bg-white rounded-xl p-5 sm:w-1/2 md:w-1/2 lg:w-1/3 xl:w-1/3 2xl:w-1/3">
            <form class="space-y-6" action="{{ route('create_user') }}" method="POST">
                @csrf
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="sm:flex sm:flex-col sm:gap-2">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-lg">Nama Lengkap</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="name" autocomplete="name" required placeholder="Masukkan Nama" class="block p-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:flex sm:flex-col sm:gap-2">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-lg">Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required placeholder="Masukkan Email" class="block p-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
        
                <div class="sm:flex sm:flex-col sm:gap-2">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-lg">Password</label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required placeholder="Masukkan Password" class="block p-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:flex sm:flex-col sm:gap-2">
                    <label for="role" class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-lg">Role</label>
                    <div class="mt-2 flex items-center gap-5">
                        <div class="flex items-center">
                            <input id="checkbox" name="role" type="checkbox" value="student" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded">
                            <label for="default-checkbox" class="ml-2 text-sm font-medium">Student</label>
                        </div>
                        <div class="flex items-center">
                            <input id="checkbox" name="role" type="checkbox" value="admin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded">
                            <label for="checked-checkbox" class="ml-2 text-sm font-medium">Admin</label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="flex w-full justify-center rounded-md bg-orange-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 md:w-1/2 md:h-10 md:items-center lg:h-12 lg:text-lg 2xl:mt-10 2xl:w-1/2">Sign Up</button>
                </div>              
            </form>

            <p class="mt-10 text-center text-sm text-gray-500 md:text-base">Udah Punya Akun?
                <a href="/" class="font-semibold leading-6 text-orange-400 hover:text-orange-500">Monggo Masuk</a>
            </p>
        </div>
    </div>
</body>
</html>