<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Presence</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-[#EDF2F7]">

    @yield('content')

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
