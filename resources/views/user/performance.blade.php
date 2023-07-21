@extends('layouts.admin')
@section('container')
    <style>
        .circular-progress {
            position: relative;
            height: 250px;
            width: 250px;
            border-radius: 50%;
            display: grid;
            place-items: center;
        }

        .circular-progress:before {
            content: "";
            position: absolute;
            height: 84%;
            width: 84%;
            background-color: #ffffff;
            border-radius: 50%;
        }

        .value-container {
            position: relative;
            font-family: "Poppins", sans-serif;
            font-size: 50px;
            color: #231c3d;
        }
    </style>

    <h3 class="text-black font-bold text-2xl capitalize 2xl:text-3xl"><span class="text-orange-400">Performa</span> Kamu bulan
        Ini!</h3>

    <div class="p-5 bg-white border border-gray-200 rounded-lg shadow mt-20">
        <div class="performance flex flex-col lg:flex-row-reverse lg:justify-between">

            <div class="circular-progress">
                <div class="value-container">0%</div>
            </div>

            <div class="performance-text">
                <div class="work-day">
                    <div class="mounth">
                        <h4 class="font-bold text-xl text-orange-400">Juli</h4>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="performance-left">
                            <h5 class="font-bold text-md">Hari Kerja: </h5>
                            <h5 class="font-bold text-md">Jumlah Masuk:</h5>
                            <h5 class="font-bold text-md">Jumlah Izin:</h5>
                        </div>
                        <div class="performance-right justify-self-end">
                            <h5 class="font-medium text-md">{{ $total_hari }}</h5>
                            <h5 class="font-medium text-md">{{ $performance->total_presence }}</h5>
                            <h5 class="font-medium text-md">{{ $performance->total_permit }}</h5>
                        </div>
                    </div>
                </div>

                <h4 class="text-sm my-8 lg:text-lg">
                    Selama Bulan Juli Kamu Telah Bekerja dengan Durasi <b>:</b> <br>
                    <span class="text-orange-400 font-bold text-md">24 Jam</span>
                    <span class="text-orange-400 font-bold text-md">25 Menit</span>
                </h4>

                <div class="result-month">
                    <div class="grid grid-cols-2">
                        <div class="performance-left">
                            <h5 class="font-bold text-md">Jumlah Tepat Waktu: </h5>
                            <h5 class="font-bold text-md">Jumlah Terlambat:</h5>
                        </div>
                        <div class="performance-right justify-self-end">
                            <h5 class="font-medium text-md">{{ $tepat_waktu }}</h5>
                            <h5 class="font-medium text-md">{{ $terlambat }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let progressBar = document.querySelector(".circular-progress");
        let valueContainer = document.querySelector(".value-container");

        let progressValue = 0;
        let progressEndValue = {{ round(($performance->total_presence / $total_hari) * 100) }};
        let speed = 50;

        let progress = setInterval(() => {
            progressValue++;
            valueContainer.textContent = `${progressValue}%`;
            progressBar.style.background = `conic-gradient(
        rgb(249 115 22) ${progressValue * 3.6}deg,
        rgb(253 186 116) ${progressValue * 3.6}deg
    )`;
            if (progressValue == progressEndValue) {
                clearInterval(progress);
            }
        }, speed);
    </script>
@endsection
