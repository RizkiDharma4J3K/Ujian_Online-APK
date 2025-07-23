<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['id']) || $_SESSION['role'] != 'siswa') {
    header("Location: ../login.php");
    exit();
}

$id = $_SESSION['id'];
$data = mysqli_query($conn, "SELECT * FROM hasil WHERE id_user=$id ORDER BY id DESC LIMIT 1");
$row = mysqli_fetch_assoc($data);

// Konversi waktu pengerjaan ke format menit:detik
$durasi = (int) $row['waktu'];
$menit = floor($durasi / 60);
$detik = $durasi % 60;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Ujian - e-Quiziz</title>
    <style>
        :root {
            --latte: #f6fafd;
            --blue-soft: #e3effc;
            --blue-accent: #b6d0ee;
            --blue-dark: #5a7ca7;
            --white: #fff;
            --text-dark: #2d3a4a;
            --shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.10);
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Georgia', serif;
            background: linear-gradient(120deg, var(--latte) 60%, var(--blue-soft) 100%);
            color: var(--text-dark);
            min-height: 100vh;
        }

        .container {
            max-width: 420px;
            margin: 80px auto;
            padding: 44px 36px 36px 36px;
            background: var(--white);
            border-radius: 22px;
            box-shadow: var(--shadow);
            text-align: center;
            border: 2px solid var(--blue-accent);
            position: relative;
        }

        .container:before {
            content: "";
            display: block;
            position: absolute;
            inset: 0;
            border-radius: 22px;
            border: 1.5px dashed var(--blue-dark);
            pointer-events: none;
            z-index: 0;
        }

        h2 {
            font-size: 2em;
            margin-bottom: 28px;
            color: var(--blue-dark);
            font-weight: 700;
            letter-spacing: 1px;
            border-bottom: 1.5px solid var(--blue-accent);
            padding-bottom: 10px;
            margin-top: 0;
        }

        .score-box {
            background: var(--blue-soft);
            border-radius: 14px;
            padding: 28px 18px 18px 18px;
            font-size: 1.15em;
            margin-bottom: 26px;
            box-shadow: 0 2px 10px 0 rgba(90, 124, 167, 0.07);
            border: 1px solid var(--blue-accent);
        }

        .score-box p {
            margin: 14px 0;
            color: var(--text-dark);
            font-weight: 500;
            font-family: 'Georgia', serif;
        }

        .score-box strong {
            color: var(--blue-dark);
            font-weight: 700;
        }

        a {
            display: inline-block;
            margin-top: 18px;
            text-decoration: none;
            color: var(--white);
            background: linear-gradient(90deg, var(--blue-accent), var(--blue-dark));
            padding: 13px 32px;
            border-radius: 9px;
            font-size: 1.08em;
            font-weight: 600;
            box-shadow: 0 2px 8px 0 rgba(90, 124, 167, 0.08);
            transition: background 0.3s, box-shadow 0.3s;
            border: none;
        }

        a:hover {
            background: linear-gradient(90deg, var(--blue-dark), var(--blue-accent));
            box-shadow: 0 4px 16px 0 rgba(90, 124, 167, 0.13);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>📋 Hasil Ujian Anda</h2>
        <div class="score-box">
            <p>✅ Benar: <strong><?= $row['benar'] ?></strong></p>
            <p>❌ Salah: <strong><?= $row['salah'] ?></strong></p>
            <p>🏆 Nilai: <strong><?= $row['nilai'] ?></strong></p>
            <p>⏱️ Waktu Pengerjaan: <strong><?= $menit ?> menit <?= $detik ?> detik</strong></p>
        </div>
        <a href="../dashboard.php">⬅ Kembali ke Dashboard</a>
    </div>
</body>
</html>
