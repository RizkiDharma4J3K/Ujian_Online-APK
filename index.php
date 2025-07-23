<?php
session_start();
if (isset($_SESSION['role'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>e-Quiziz</title>
    <style>
        :root {
            --latte: #f6fafd;
            --blue-soft: #e3effc;
            --blue-accent: #b6d0ee;
            --blue-dark: #5a7ca7;
            --white: #fff;
            --text-dark: #2d3a4a;
            --border-classic: #b6d0ee;
            --shadow: 0 4px 24px 0 rgba(90, 124, 167, 0.08);
        }

        body {
            font-family: 'Georgia', serif;
            background: var(--blue-soft);
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
            border: 2.5px solid var(--border-classic);
            border-radius: 12px;
            max-width: 410px;
            width: 95%;
            padding: 38px 32px 28px 32px;
            box-shadow: var(--shadow);
            text-align: center;
            position: relative;
        }

        .container:before {
            content: "";
            display: block;
            position: absolute;
            inset: 0;
            border-radius: 12px;
            border: 1.5px dashed var(--blue-dark);
            pointer-events: none;
            z-index: 0;
        }

        h1 {
            font-family: 'Georgia', serif;
            font-size: 2.2em;
            color: var(--blue-dark);
            margin-bottom: 18px;
            font-weight: bold;
            letter-spacing: 1px;
            border-bottom: 1.5px solid var(--blue-accent);
            padding-bottom: 12px;
            margin-top: 0;
        }

        .menu {
            margin: 32px 0 18px 0;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .menu a {
            display: block;
            background: none;
            color: var(--blue-dark);
            border: 1.5px solid var(--blue-accent);
            border-radius: 6px;
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

        footer {
            margin-top: 18px;
            font-size: 0.98em;
            color: #7a8ca7;
            font-style: italic;
            letter-spacing: 0.5px;
            border-top: 1px solid var(--blue-soft);
            padding-top: 10px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 18px 4vw 14px 4vw;
                max-width: 98vw;
            }
            h1 {
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
    <div class="container">
        <h1>AJK UJIAN ONLINE<br><span style="font-size:0.7em;font-weight:400;color:#5a7ca7;">Sistem Ujian Online</span></h1>
        <div class="menu">
            <a href="login.php">🔐 Login</a>
            <a href="register.php">📝 Daftar Siswa</a>
            <a href="profil.php">🏫 Profil Sekolah</a>
        </div>
        <footer>&copy; <?= date('Y') ?> e-Quiziz</footer>
    </div>
</body>
</html>
