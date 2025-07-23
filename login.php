<?php
session_start();
include "config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$pass'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        $_SESSION['id'] = $data['id'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role'] = $data['role'];
        header("Location: dashboard.php");
    } else {
        $error = "Login gagal! Username atau password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - e-Quiziz</title>
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

        .login-box {
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

        .login-box:before {
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

        .error {
            background-color: #e3fbe3;
            border: 1px solid #a3dca3;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            color: #b3364a;
            font-size: 0.98em;
            background: #ffe6e9;
            border-color: #f5b1bd;
        }

        a {
            color: var(--blue-dark);
            text-decoration: none;
            font-family: 'Georgia', serif;
            display: inline-block;
            margin-top: 15px;
            font-size: 0.95em;
        }

        a:hover {
            text-decoration: underline;
            color: var(--blue-accent);
        }

        @media (max-width: 600px) {
            .login-box {
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
    <div class="login-box">
        <h2>Masuk ke AJK UJIAN ONLINE</h2>
        <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="index.php">← Kembali ke Beranda</a>
    </div>
</body>
</html>
