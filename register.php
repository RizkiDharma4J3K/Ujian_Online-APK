<?php
include "config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    mysqli_query($conn, "INSERT INTO users (nama, username, password, role) VALUES ('$nama', '$username', '$password', 'siswa')");
    $sukses = true;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi - e-Quiziz</title>
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

        .register-box {
            background: var(--white);
            border: 2px solid var(--blue-accent);
            border-radius: 14px;
            max-width: 400px;
            width: 95%;
            padding: 38px 32px 28px 32px;
            box-shadow: var(--shadow);
            text-align: center;
            position: relative;
        }

        .register-box:before {
            content: "";
            display: block;
            position: absolute;
            inset: 0;
            border-radius: 14px;
            border: 1.5px dashed var(--blue-dark);
            pointer-events: none;
            z-index: 0;
        }

        h2 {
            font-family: 'Georgia', serif;
            font-size: 2em;
            color: var(--blue-dark);
            margin-bottom: 22px;
            font-weight: bold;
            letter-spacing: 1px;
            border-bottom: 1.5px solid var(--blue-accent);
            padding-bottom: 10px;
            margin-top: 0;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1.5px solid var(--blue-accent);
            border-radius: 8px;
            background-color: #fafdff;
            transition: border-color 0.3s;
            font-size: 15px;
            font-family: 'Georgia', serif;
        }

        input:focus {
            border-color: var(--blue-dark);
            outline: none;
        }

        button {
            background: var(--blue-dark);
            color: var(--white);
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            font-size: 1.08em;
            font-family: 'Georgia', serif;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 5px;
        }

        button:hover {
            background: var(--blue-accent);
            color: var(--blue-dark);
        }

        .success {
            background-color: #e3fbe3;
            border: 1px solid #a3dca3;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            color: #3a833a;
            font-size: 0.98em;
        }

        a {
            color: var(--blue-dark);
            text-decoration: none;
            font-family: 'Georgia', serif;
        }

        a:hover {
            text-decoration: underline;
            color: var(--blue-accent);
        }

        .back {
            margin-top: 15px;
            display: inline-block;
            font-size: 0.95em;
        }

        @media (max-width: 600px) {
            .register-box {
                padding: 18px 4vw 14px 4vw;
                max-width: 98vw;
            }
            h2 {
                font-size: 1.3em;
                padding-bottom: 7px;
            }
            button {
                font-size: 1em;
                padding: 10px 0;
            }
        }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>📝 Registrasi Siswa</h2>
        <?php if (!empty($sukses)) : ?>
            <div class="success">
                Registrasi berhasil! <a href='login.php'>Klik untuk login</a>
            </div>
        <?php endif; ?>
        <form method="post">
            <input type="text" name="nama" placeholder="Nama Lengkap" required><br>
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Daftar</button>
        </form>
        <div class="back">
            <a href="index.php">← Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
