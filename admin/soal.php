<?php
include "../config/koneksi.php";
session_start();
if ($_SESSION['role'] != 'admin') exit("Akses ditolak!");

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM soal WHERE id=$id");
    header("Location: soal.php");
}

$data = mysqli_query($conn, "SELECT * FROM soal");
?>
<h2>Kelola Soal</h2>
<a href="tambah_soal.php">+ Tambah Soal</a>
<table border="1" cellpadding="5">
<tr><th>No</th><th>Soal</th><th>Jawaban</th><th>Aksi</th></tr>
<?php $no = 1; while($d = mysqli_fetch_assoc($data)): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $d['soal'] ?></td>
    <td><?= $d['jawaban'] ?></td>
    <td><a href="?hapus=<?= $d['id'] ?>" onclick="return confirm('Hapus soal ini?')">Hapus</a></td>
</tr>
<?php endwhile; ?>
</table>
