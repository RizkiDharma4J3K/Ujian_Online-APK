<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}
$nama = $_SESSION['nama'];
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - e-Quiziz</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .dashboard-box {
            background: var(--white);
            border: 2px solid var(--blue-accent);
            border-radius: 16px;
            max-width: 420px;
            width: 95%;
            padding: 38px 32px 28px 32px;
            box-shadow: var(--shadow);
            text-align: center;
            position: relative;
        }

        .dashboard-box:before {
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
            font-size: 2em;
            color: var(--blue-dark);
            margin-bottom: 25px;
            font-weight: bold;
            letter-spacing: 1px;
            border-bottom: 1.5px solid var(--blue-accent);
            padding-bottom: 10px;
            margin-top: 0;
        }

        .menu {
            margin: 32px 0 18px 0;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .menu a {
            display: block;
            background: none;
            color: var(--blue-dark);
            border: 1.5px solid var(--blue-accent);
            border-radius: 8px;
            padding: 12px 0;
            font-size: 1.08em;
            font-family: 'Georgia', serif;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition:
                background 0.2s,
                color 0.2s,
                border-color 0.2s,
                box-shadow 0.2s;
            box-shadow: 0 1px 4px 0 rgba(90, 124, 167, 0.05);
            text-decoration: none;
        }

        .menu a:hover {
            background: var(--blue-accent);
            color: var(--white);
            border-color: var(--blue-dark);
            box-shadow: 0 2px 10px 0 rgba(90, 124, 167, 0.13);
        }

        .logout {
            margin-top: 25px;
            font-size: 0.98em;
        }

        .logout a {
            color: var(--blue-dark);
            text-decoration: none;
            font-family: 'Georgia', serif;
            border-bottom: 1px dotted var(--blue-accent);
            padding-bottom: 2px;
            transition: color 0.2s, border-color 0.2s;
        }

        .logout a:hover {
            color: var(--blue-accent);
            border-color: var(--blue-dark);
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .dashboard-box {
                padding: 18px 4vw 14px 4vw;
                max-width: 98vw;
            }

            h2 {
                font-size: 1.3em;
                padding-bottom: 7px;
            }

            .menu a {
                font-size: 1em;
                padding: 10px 0;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard-box">
        <h2>Selamat Datang, <strong><?= htmlspecialchars($nama) ?></strong>!</h2>

        <div class="menu">
            <?php if ($role == 'admin'): ?>
                <a href="admin/soal.php">📚 Kelola Soal</a>
                <a href="admin/users.php">👥 Daftar User</a>
                <a href="admin/hasil.php">📊 Hasil Ujian</a>
            <?php else: ?>
                <a href="siswa/ujian.php">📝 Mulai Ujian</a>
                <a href="siswa/hasil_siswa.php">📈 Hasil Saya</a>
            <?php endif; ?>
            <a href="panduan.php">📘 Panduan Ujian</a>
        </div>


        <div class="logout">
            <a href="logout.php">🔓 Logout</a>
        </div>
    </div>
</body>

</html>