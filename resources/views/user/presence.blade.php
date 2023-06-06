<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presence</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#EDF2F7]">
    <div class="flex flex-col justify-center h-full sm:mt-32 sm:flex sm:items-center md:flex md:items-center lg:flex lg:items-center xl:flex xl:items-center 2xl:flex 2xl:items-center">
        <div class="bg-white rounded-xl p-5 sm:w-3/4 md:w-1/2 lg:w-1/3 xl:w-1/3 2xl:w-1/3">
            <h4 class="font-bold text-center">Hai <span class="text-orange-400 capitalize">{{ Auth::user()->name }}</span>, Silahkan Absen Dulu</h4>
            <hr class="w-full mt-2">
            <div class="flex justify-center mt-2">
                <img src="image/profile.png" alt="" class="w-24 h-24">
            </div>
            <div class="flex justify-between mt-3">
                <p><i class="fa-solid fa-right-to-bracket bg-green-500 text-white p-[3px]"></i> {{ now()->format('d-m-Y') }}</p>
                <p><i class="fa-solid fa-right-to-bracket bg-red-500 text-white p-[3px]"></i> Tanggal Logout</p>
            </div>
            <form class="space-y-4" action="{{ route('store_presence', $presence) }}" method="POST"  content-type="multipart/form-data">
                @csrf
                <div class="w-full">
                    <label for="status" class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-lg">Status</label>
                    <select name="status" class="w-full rounded-md border  bg-white ring-gray-300 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option selected>Status</option>
                        <option value="WFH">WFH</option>
                        <option value="WFO">WFO</option>
                    </select>
                </div>
                <div class="video flex flex-col items-center gap-3">
                    <video id="video" autoplay class="rounded-md w-3/4 h-48 border border-sky-400"></video>
                    <input type="text" name="photo" id="photo-input" hidden></input>
                    <img id="photo-preview" width="320" height="240" class="rounded-md w-3/4 h-48 border border-sky-400">
                    <button type="button" id="takePhoto" class="bg-green-500 px-3 py-1.5 text-white rounded-md"><i class="fa-solid fa-camera"></i> Take & Retake Photo</button>
                </div>
                <div class="flex justify-center">
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-orange-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 md:w-1/2 md:h-10 md:items-center lg:h-12 lg:text-lg 2xl:w-1/2">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/06b851ab81.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
