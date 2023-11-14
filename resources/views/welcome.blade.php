<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FunMath</title>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script defer>
        localStorage.clear();
    </script>

</head>

<body class="bg-primary text-white w-full p-4 max-w-4xl mx-auto">
    <header>
        <div class="flex justify-between items-center">
            <div class="left flex items-center">
                <img src="{{ asset('images/logo.svg') }}" alt="">
            </div>
            <div class="right flex align-center items-end font-bold">
                Hello, <img width="35px" src="{{ asset('images/hello.gif') }}" alt="" class="ml-2">
            </div>
        </div>
    </header>

    <div class="bg-[#383E6E] mt-5 rounded-lg">
        <div class="flex items-center">
            <img class="w-5/12 sm:w-4/12" src="{{ asset('images/writing-rabbit.gif') }}" alt="">
            <div class="text-sm sm:text-xl">
                <p>Selamat Datang,</p>
                <p class="font-bold mb-5">Mari Bermain dan Belajar</p>
                <a href="{{ url('/penjumlahan') }}"
                    class="bg-gradient-to-r from-[#E45895] to-[#BC6AE5] p-1 px-5 sm:px-10 rounded">Mulai</a>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <p class="font-medium text-xl">Pilih Materi</p>
        <div class="flex gap-2 mt-3 ">
            <div class="content-center bg-[#3E9FFF] rounded p-4 pt-8  w-6/12 sm:w-full">
                <a href="{{ url('/penjumlahan') }}" class="justify-start sm:flex gap-4">
                    <img class="w-11/12 sm:w-5/12" src="{{ asset('images/airplane.svg') }}" alt=""
                        class="mx-auto">
                    <div class="sm:my-auto">
                        <p class="mt-5 sm:mt-0 font-bold">Penjumlahan</p>
                        <div class="flex mt-2">
                            <img width="30px" src="{{ asset('images/plus-icon.svg') }}" alt="" class="mr-2">
                            <p class="my-auto">25 Soal</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="content-center bg-[#3E9FFF] rounded p-4 pt-8 w-6/12  sm:w-full">
                <a href="{{ url('/pengurangan') }}" class="justify-start sm:flex gap-4">
                    <img class="w-11/12 sm:w-5/12" src="{{ asset('images/rocket.svg') }}" alt=""
                        class="mx-auto">
                    <div class="sm:my-auto">
                        <p class="mt-5 sm:mt-0 font-bold">Pengurangan</p>
                        <div class="flex mt-2">
                            <img width="30px" src="{{ asset('images/minus-icon.svg') }}" alt=""
                                class="mr-2">
                            <p class="my-auto">25 Soal</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <p class="font-medium text-xl">Tantangan</p>
        <a href="{{ url('/tantangan') }}" class="w-full">
            <div class="mt-3 bg-gradient-to-l from-[#E45895] to-[#BC6AE5] rounded p-4 sm:flex sm:justify-items-start">
                <img src="{{ asset('images/mix.svg') }}" alt="" class="w-full sm:w-6/12">
                <div class="sm:m-auto">
                    <p class="mt-5 sm:mt-0 font-bold flex">Penjumlahan & Pengurangan</p>
                    <div class="flex mt-2">
                        <img width="30px" src="{{ asset('images/plus-icon.svg') }}" alt="" class="mr-2">
                        <img width="30px" src="{{ asset('images/minus-icon.svg') }}" alt="" class="mr-2">
                        <p class="my-auto">50 Soal</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
</body>

</html>
