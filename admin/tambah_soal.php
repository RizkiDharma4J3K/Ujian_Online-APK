<?php
include "../config/koneksi.php";
session_start();
if ($_SESSION['role'] != 'admin') exit("Akses ditolak!");

if ($_POST) {
    extract($_POST);
    mysqli_query($conn, "INSERT INTO soal (soal, a, b, c, d, jawaban) 
        VALUES ('$soal', '$a', '$b', '$c', '$d', '$jawaban')");
    header("Location: soal.php");
}
?>
<form method="post">
    <h3>Tambah Soal</h3>
    Soal: <textarea name="soal" required></textarea><br>
    A: <input name="a" required><br>
    B: <input name="b" required><br>
    C: <input name="c" required><br>
    D: <input name="d" required><br>
    Jawaban (A/B/C/D): <input name="jawaban" maxlength="1" required><br>
    <button>Simpan</button>
</form>
