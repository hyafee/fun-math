<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FunMath - Result</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')


</head>

<body class="antialiased bg-primary text-white max-w-screen p-4 max-w-4xl mx-auto">
    <div class="flex flex-col items-center mt-5">
        <img id="emote" alt="" width="50px">
        <p id="header-text" class="mt-5 font-bold text-2xl"></p>
        <img id="img-gif" alt="" class="mt-10">
        <div class="flex flex-col mt-10 items-center">
            <p class="font-bold">Kamu mendapat skor <span id="point"></span> / 100</p>
            <p class="text-center">Berhasil menjawab <span id="correct"></span> dari <span id="total"></span> soal
                dengan benar</p>
        </div>
        <div class="flex flex-col w-full items-center mt-10 font-bold mb-10">
            <a href="/review" class="w-3/4 p-2 rounded text-center bg-[#00ECCC]">Review Soal</a>
            <a href="/" class="mt-2 w-3/4 p-2 rounded text-center bg-[#F08778]">Kembali</a>
        </div>
    </div>

    <script defer>
        var correctAnswers = sessionStorage.getItem('correctAnswers');
        var resultListJSON = sessionStorage.getItem('resultList');
        var resultListData = JSON.parse(resultListJSON);
        var elemPoint = document.getElementById('point');

        var point = Math.round(correctAnswers / resultListData.length * 100);

        elemPoint.textContent = point;
        document.getElementById('correct').textContent = correctAnswers;
        document.getElementById('total').textContent = resultListData.length;


        var headerText = document.getElementById('header-text');
        var imgGif = document.getElementById('img-gif');
        var emote = document.getElementById('emote');

        if (point > 50) {
            headerText.textContent = "YEAY, SELAMAT"
            imgGif.src = "{{ asset('images/selamat.gif') }}"
            emote.src = "{{ asset('images/party.svg') }}"
            elemPoint.style.color = "#00ECCC";
        } else {
            headerText.textContent = "YAH, COBA LAGI"
            imgGif.src = "{{ asset('images/sad.gif') }}"
            emote.src = "{{ asset('images/sad-emote.svg') }}"
            elemPoint.style.color = "#F08778";
        }
    </script>
</body>

</html>
