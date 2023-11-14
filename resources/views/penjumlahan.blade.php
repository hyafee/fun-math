@php
    $soal = [];
    $jumlahSoal = 25;

    for ($i = 1; $i <= $jumlahSoal; $i++) {
        $angka1 = null;
        $angka2 = null;
        $angka3 = null;

        if ($i >= 1 && $i <= 5) {
            $angka1 = rand(1, 10);
            $angka2 = rand(1, 10);
            $jawaban = $angka1 + $angka2;
            $pertanyaan = "$angka1 + $angka2";
        } elseif ($i >= 6 && $i <= 10) {
            $angka1 = rand(10, 20);
            $angka2 = rand(1, 10);
            $jawaban = $angka1 + $angka2;
            $pertanyaan = "$angka1 + $angka2";
        } elseif ($i >= 11 && $i <= 15) {
            $angka1 = rand(10, 20);
            $angka2 = rand(10, 20);
            $jawaban = $angka1 + $angka2;
            $pertanyaan = "$angka1 + $angka2";
        } elseif ($i >= 16 && $i <= 20) {
            $angka1 = rand(20, 40);
            $angka2 = rand(5, 20);
            $jawaban = $angka1 + $angka2;
            $pertanyaan = "$angka1 + $angka2";
        } else {
            $angka1 = rand(5, 20);
            $angka2 = rand(10, 50);
            $jawaban = $angka1 + $angka2;
            $pertanyaan = "$angka1 + $angka2";
        }

        $soal[] = [
            'pertanyaan' => $pertanyaan,
            'jawaban' => $jawaban,
        ];
    }

    shuffle($soal); // Mengacak array $soal

@endphp


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FunMath - Penjumlahan</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')

    <script defer>
        var currentQuestion = 0;
        var questions = <?php echo json_encode($soal); ?>;
        var userAnswers = [];
        var allChoices = [];
        var correctAnswers = 0;
        var optionValue = 0;

        function shuffleArray(array) {
            for (var i = array.length - 1; i > 0; i--) {
                var j = Math.floor(Math.random() * (i + 1));
                var temp = array[i];
                array[i] = array[j];
                array[j] = temp;
            }
        }

        function generateRandomChoices(correctAnswer) {
            var choices = [correctAnswer];

            // Buat pilihan yang tidak jauh dari jawaban yang benar
            var minOffset = -2; // Jarak minimum dari jawaban yang benar
            var maxOffset = 2; // Jarak maksimum dari jawaban yang benar

            while (choices.length < 4) {
                var offset = Math.floor(Math.random() * (maxOffset - minOffset + 1)) + minOffset;
                var randomAnswer = correctAnswer + offset;

                // Pastikan angka acak tidak sama dengan jawaban yang benar
                if (randomAnswer !== correctAnswer && choices.indexOf(randomAnswer) === -1) {
                    choices.push(randomAnswer);
                }
            }

            shuffleArray(choices);

            return choices;
        }

        function displayQuestion() {
            if (currentQuestion < questions.length) {
                var question = questions[currentQuestion];
                document.getElementById('pertanyaan').textContent = question['pertanyaan'];

                var choices = generateRandomChoices(question['jawaban']);
                allChoices.push(choices);

                // Tampilkan pilihan jawaban
                for (var i = 0; i < 4; i++) {
                    var option = document.getElementById('option-answer' + (i + 1));
                    option.textContent = choices[i];
                }


                currentQuestion++; // Perbarui currentQuestion setelah menyiapkan pertanyaan
                var radioButtons = document.querySelectorAll(".option");
                radioButtons.forEach(function(radio) {
                    radio.checked = false;
                });
                document.getElementById('nomorPertanyaan').textContent = currentQuestion;
                document.querySelector('#randomImage').setAttribute('src', 'images/random-' + (Math.floor(Math.random() *
                    2) + 1) + '.svg');
                document.querySelector('#randomImageSoal').setAttribute('src', 'images/random-soal-' + (Math.floor(Math
                    .random() *
                    19) + 1) + '.svg');

                document.getElementById('nextButton').classList.add('hidden');

            } else {
                // Tampilkan hasil akhir
                saveResult();
            }
        }

        function selectOption(selectedOption) {
            optionValue = document.getElementById(selectedOption).textContent;

            // Menyimpan jawaban pengguna

            // Tampilkan tombol "Selanjutnya" setelah menjawab
            document.getElementById('nextButton').classList.remove('hidden');
        }

        function saveResult() {
            // Konversi resultList menjadi JSON

            var resultListData = [];

            for (var i = 0; i < questions.length; i++) {
                resultListData.push({
                    pertanyaan: questions[i]['pertanyaan'],
                    jawaban_benar: questions[i]['jawaban'],
                    jawaban_pengguna: userAnswers[i],
                    choices: allChoices[i]
                });

                // Memeriksa apakah jawaban pengguna benar
                if (userAnswers[i] == questions[i]['jawaban']) {
                    correctAnswers++;
                }
            }


            // Simpan hasil kuis di session storage
            sessionStorage.setItem('correctAnswers', correctAnswers);
            sessionStorage.setItem('resultList', JSON.stringify(resultListData));

            // Arahkan pengguna ke halaman "penjumlahan-result.blade.php"
            window.location.href = 'result';
        }

        function nextBtn() {
            userAnswers.push(optionValue);
            displayQuestion();
        }
    </script>
</head>

<body class="antialiased bg-primary text-white max-w-screen p-4 max-w-4xl mx-auto">
    <header>
        <div class="flex justify-between items-center">
            <div class="left flex items-center"><img src="{{ asset('images/logo.svg') }}" alt=""></div>
            <div class="right flex align-center items-end font-bold">Semangat, <img width="35px"
                    src="{{ asset('images/semangat.gif') }}" alt="" class="ml-2"></div>
        </div>
    </header>

    <div class="mt-10 relative">
        <p class="font-bold">Pertanyaan</p>
        <p><span class="font-bold text-3xl" id="nomorPertanyaan"></span> / {{ $jumlahSoal }}</p>
        <img id="randomImage" src="{{ asset('images/random-' . rand(1, 2) . '.svg') }}" width="95px" height="95px"
            class="animate-[bounce_10s_infinite] absolute right-0 -top-0" alt="">
    </div>

    <div class="mt-10 text-sm">
        <p>Silahkan baca dan hitung soal di bawah ini.</p>
        <div class="bg-white sm:w-6/12 mx-auto rounded mt-5 relative">
            <img id="randomImageSoal" src="{{ asset('images/random-soal-' . rand(1, 19) . '.svg') }}" alt=""
                class="absolute left-5 bottom-2" width="70px">
            <p class="text-5xl text-black font-black text-center py-10" id="pertanyaan">1 + 12</p>
        </div>
        <div class="mt-5">
            <p>Masukkan jawaban di bawah sini.</p>
            <p class="mt-2">Klik pada salah satu kotak untuk menjawab pertanyaan dengan benar.</p>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="mt-10 grid grid-cols-2 w-fit gap-4" id="choices">
            @for ($i = 1; $i <= 4; $i++)
                <div class="relative w-fit m-auto">
                    <input type="radio" name="options"
                        class="option appearance-none checked:bg-[#00ECCC] font-black text-4xl w-28 h-28 bg-white rounded flex justify-center items-center"
                        id="option{{ $i }}">
                    <label for="option{{ $i }}" onclick="selectOption('option-answer{{ $i }}')"
                        class="absolute inset-0 text-4xl text-black font-bold flex justify-center items-center">
                        <span id="option-answer{{ $i }}">1</span>
                    </label>
                </div>
            @endfor
        </div>
    </div>

    <div class="mt-5 flex justify-center">
        <button id="nextButton" onclick="nextBtn()"
            class="hidden bg-gradient-to-l from-[#E45895] to-[#BC6AE5] py-3 px-24 rounded">Selanjutnya</button>
    </div>
    <script defer>
        displayQuestion();
    </script>
</body>

</html>
