<?php
include "../config/koneksi.php";
session_start();
if ($_SESSION['role'] != 'admin') exit("Akses ditolak!");

$data = mysqli_query($conn, "SELECT * FROM users");
?>
<h2>Daftar Pengguna</h2>
<table border="1" cellpadding="5">
<tr><th>No</th><th>Nama</th><th>Username</th><th>Role</th></tr>
<?php $no = 1; while($row = mysqli_fetch_assoc($data)): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['username'] ?></td>
    <td><?= $row['role'] ?></td>
</tr>
<?php endwhile; ?>
</table>
