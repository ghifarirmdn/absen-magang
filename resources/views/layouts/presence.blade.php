<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Presence</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-[#EDF2F7]">

    <div
        class="flex flex-col justify-center h-full sm:mt-32 sm:flex sm:items-center md:flex md:items-center lg:flex lg:items-center xl:flex xl:items-center 2xl:flex 2xl:items-center">
        <div class="bg-white rounded-xl p-5 sm:w-3/4 md:w-1/2 lg:w-1/3 xl:w-1/3 2xl:w-1/3">
            <h4 class="font-bold text-center">Halo <span
                    class="text-orange-400 capitalize">{{ Auth::user()->name }}</span>,
                Silahkan Melakukan Presensi</h4>
            <hr class="w-full mt-2">
            <div class="flex justify-center mt-2">
                <img src="{{ asset('image/profile.png') }}" alt="" class="w-24 h-24">
            </div>
            <div class="flex justify-between mt-3">
                @if (!isset($presence->in))
                    <p><i class="fa-solid fa-right-to-bracket bg-green-500 text-white p-[3px]"></i>
                        {{ now()->format('H:i:s') }}</p>
                    <p><i class="fa-solid fa-right-to-bracket bg-red-500 text-white p-[3px]"></i>-</p>
                @else
                    <p><i class="fa-solid fa-right-to-bracket bg-green-500 text-white p-[3px]"></i>
                        {{ $presence->in }}</p>
                    <p><i
                            class="fa-solid fa-right-to-bracket bg-red-500 text-white p-[3px]"></i>{{ now()->format('H:i:s') }}
                    </p>
                @endif
            </div>

            @yield('content')

        </div>
    </div>


    <script src="https://kit.fontawesome.com/06b851ab81.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"
        integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.getElementById("takePhoto").addEventListener("click", function(event) {
            event.preventDefault();
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            var photo = canvas.toDataURL("image/png");
            console.log(photo);
            document.querySelector("#photo-preview").src = photo;
            document.querySelector("#photo-input").value = photo;
        });

        var video = document.querySelector("#video");
        var canvas = document.createElement("canvas");
        var context = canvas.getContext("2d");

        if (navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then(function(stream) {
                    video.srcObject = stream;
                })
                .catch(function(error) {
                    console.log("Something went wrong: " + error);
                });
        }
    </script>
</body>

</html>
