<?php
session_start();
include "../config/koneksi.php";
if ($_SESSION['role'] != 'siswa') exit("Akses ditolak!");

if (isset($_POST['submit'])) {
    $benar = 0;
    $salah = 0;

    $soal = mysqli_query($conn, "SELECT * FROM soal");
    $jumlah_soal = mysqli_num_rows($soal);

    // Ambil mapel dari soal pertama
    $row_mapel = mysqli_fetch_assoc(mysqli_query($conn, "SELECT mapel FROM soal LIMIT 1"));
    $mapel = $row_mapel ? $row_mapel['mapel'] : '';

    // reset pointer soal
    mysqli_data_seek($soal, 0);

    while ($row = mysqli_fetch_assoc($soal)) {
        $id = $row['id'];
        $jawaban = strtoupper($_POST["jawab_$id"] ?? '');
        if ($jawaban == strtoupper($row['jawaban'])) {
            $benar++;
        } else {
            $salah++;
        }
    }

    $nilai = round(($benar / $jumlah_soal) * 100);
    $durasi = $_POST['durasi'] ?? 0; // dalam detik

    $id_user = $_SESSION['id'];
    mysqli_query($conn, "INSERT INTO hasil (id_user, mapel, benar, salah, nilai, waktu) VALUES ($id_user, '$mapel', $benar, $salah, $nilai, $durasi)");

    header("Location: selesai.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Ujian Online - e-Quiziz</title>
    <style>
        :root {
            --latte: #f6fafd;
            --blue-soft: #e3effc;
            --blue-accent: #b6d0ee;
            --blue-dark: #5a7ca7;
            --white: #fff;
            --text-dark: #2d3a4a;
            --shadow: 0 4px 24px 0 rgba(90, 124, 167, 0.08);
        }

        body {
            font-family: 'Georgia', serif;
            background: linear-gradient(120deg, var(--latte) 60%, var(--blue-soft) 100%);
            margin: 0;
            padding: 0;
            color: var(--text-dark);
            min-height: 100vh;
        }

        .container {
            max-width: 650px;
            margin: 48px auto;
            background: var(--white);
            border-radius: 16px;
            padding: 38px 32px 28px 32px;
            box-shadow: var(--shadow);
            border: 2px solid var(--blue-accent);
            position: relative;
        }

        .container:before {
            content: "";
            display: block;
            position: absolute;
            inset: 0;
            border-radius: 16px;
            border: 1.5px dashed var(--blue-dark);
            pointer-events: none;
            z-index: 0;
        }

        h2 {
            font-family: 'Georgia', serif;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2em;
            color: var(--blue-dark);
            font-weight: bold;
            letter-spacing: 1px;
            border-bottom: 1.5px solid var(--blue-accent);
            padding-bottom: 10px;
            margin-top: 0;
        }

        #timer {
            font-weight: bold;
            font-size: 1.1em;
            color: #b3364a;
            margin-bottom: 18px;
            text-align: center;
            background: var(--blue-soft);
            border-radius: 8px;
            padding: 8px 0;
            border: 1px solid var(--blue-accent);
            width: 60%;
            margin-left: auto;
            margin-right: auto;
        }

        .soal {
            margin-bottom: 25px;
            background: var(--blue-soft);
            border-left: 6px solid var(--blue-accent);
            border-radius: 10px;
            padding: 20px 18px 14px 18px;
            box-shadow: 0 1px 4px 0 rgba(90, 124, 167, 0.05);
        }

        .soal p {
            margin: 0 0 10px;
            font-family: 'Georgia', serif;
            font-size: 1.08em;
            color: var(--blue-dark);
        }

        .soal label {
            display: block;
            margin: 7px 0;
            cursor: pointer;
            font-size: 1em;
            font-family: 'Georgia', serif;
            color: var(--text-dark);
            padding-left: 6px;
            transition: background 0.2s;
            border-radius: 5px;
        }

        .soal input[type="radio"] {
            margin-right: 8px;
        }

        .soal label:hover {
            background: var(--latte);
        }

        button[name="submit"] {
            display: block;
            margin: 32px auto 0;
            padding: 13px 36px;
            background: var(--blue-dark);
            color: var(--white);
            border: none;
            font-size: 1.08em;
            border-radius: 9px;
            font-family: 'Georgia', serif;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px 0 rgba(90, 124, 167, 0.08);
            transition: background 0.3s, box-shadow 0.3s;
        }

        button[name="submit"]:hover {
            background: var(--blue-accent);
            color: var(--blue-dark);
            box-shadow: 0 4px 16px 0 rgba(90, 124, 167, 0.13);
        }

        @media (max-width: 700px) {
            .container {
                padding: 18px 4vw 14px 4vw;
                max-width: 98vw;
            }

            h2 {
                font-size: 1.3em;
                padding-bottom: 7px;
            }

            button[name="submit"] {
                font-size: 1em;
                padding: 10px 0;
            }

            #timer {
                width: 98%;
                font-size: 1em;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>📝 Ujian Online</h2>
        <form method="post" id="formUjian">
            <input type="hidden" name="durasi" id="durasi">
            <div id="timer">Memulai timer...</div>

            <?php
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM soal");
            while ($d = mysqli_fetch_assoc($data)):
            ?>
                <div class="soal">
                    <p><strong><?= $no++ ?>. <?= htmlspecialchars($d['soal']) ?></strong></p>
                    <label><input type="radio" name="jawab_<?= $d['id'] ?>" value="A"> A. <?= htmlspecialchars($d['a']) ?></label>
                    <label><input type="radio" name="jawab_<?= $d['id'] ?>" value="B"> B. <?= htmlspecialchars($d['b']) ?></label>
                    <label><input type="radio" name="jawab_<?= $d['id'] ?>" value="C"> C. <?= htmlspecialchars($d['c']) ?></label>
                    <label><input type="radio" name="jawab_<?= $d['id'] ?>" value="D"> D. <?= htmlspecialchars($d['d']) ?></label>
                </div>
            <?php endwhile; ?>

            <button type="submit" name="submit">Kumpulkan Jawaban</button>
        </form>

        <script>
        let totalSeconds = 1800; // 30 menit
        let timerDisplay = document.getElementById('timer');
        let durasiInput = document.getElementById('durasi');

        function updateTimer() {
            let minutes = Math.floor(totalSeconds / 60);
            let seconds = totalSeconds % 60;
            timerDisplay.innerHTML = `Sisa waktu: ${minutes} menit ${seconds} detik`;
            durasiInput.value = 1800 - totalSeconds;
            if (totalSeconds <= 0) {
                clearInterval(countdown);
                alert("Waktu habis! Ujian akan disubmit otomatis.");
                document.getElementById('formUjian').submit();
            }
            totalSeconds--;
        }

        let countdown = setInterval(updateTimer, 1000);
        </script>
    </div>
</body>
</html>
