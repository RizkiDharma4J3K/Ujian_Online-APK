<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Panduan Ujian</title>
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
            font-family: 'Georgia', serif;
            background: linear-gradient(120deg, var(--latte) 60%, var(--blue-soft) 100%);
            margin: 0;
            padding: 0;
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background: var(--white);
            padding: 44px 36px 36px 36px;
            border-radius: 22px;
            box-shadow: var(--shadow);
            border: 2px solid var(--blue-accent);
            max-width: 520px;
            width: 95%;
            text-align: left;
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
            margin-bottom: 22px;
            color: var(--blue-dark);
            font-weight: 700;
            letter-spacing: 1px;
            border-bottom: 1.5px solid var(--blue-accent);
            padding-bottom: 10px;
            margin-top: 0;
            text-align: center;
        }

        ol {
            padding-left: 22px;
            margin-bottom: 18px;
        }

        li {
            margin-bottom: 12px;
            line-height: 1.6;
            font-size: 1.08em;
            font-family: 'Georgia', serif;
        }

        .back {
            display: inline-block;
            text-decoration: none;
            background: linear-gradient(90deg, var(--blue-accent), var(--blue-dark));
            color: var(--white);
            padding: 12px 28px;
            border-radius: 9px;
            font-size: 1em;
            margin-top: 18px;
            font-family: 'Georgia', serif;
            font-weight: 600;
            box-shadow: 0 2px 8px 0 rgba(90, 124, 167, 0.08);
            border: none;
            transition: background 0.3s, box-shadow 0.3s;
        }

        .back:hover {
            background: linear-gradient(90deg, var(--blue-dark), var(--blue-accent));
            color: var(--white);
            box-shadow: 0 4px 16px 0 rgba(90, 124, 167, 0.13);
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px 4vw 18px 4vw;
                max-width: 98vw;
            }
            h2 {
                font-size: 1.3em;
                padding-bottom: 7px;
            }
            .back {
                font-size: 0.98em;
                padding: 10px 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>📘 Panduan Ujian Online</h2>
        <ol>
            <li>Login menggunakan akun yang telah terdaftar.</li>
            <li>Baca instruksi pada halaman ujian dengan teliti.</li>
            <li>Durasi ujian adalah 30 menit dan akan berhenti otomatis.</li>
            <li>Setiap soal hanya bisa dijawab sekali dan tidak bisa diubah.</li>
            <li>Hasil ujian langsung ditampilkan setelah selesai.</li>
        </ol>
        <div style="text-align:center;">
            <a href="dashboard.php" class="back">← Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>
