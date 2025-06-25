<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Produk makanan</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h2 class="judul-box">Daftar Produk Makanan</h2>

<table>
    <tr>
        <th>Kode_Produk</th>
        <th>Nama_Produk</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Tanggal_Kadaluarsa</th>
        <th>Aksi</th>
    </tr>
    <?php
    $query = mysqli_query($conn, "SELECT * FROM produk_makanan");
    while ($row = mysqli_fetch_assoc($query)) {
        echo "<tr>
            <td>{$row['Kode_Produk']}</td>
            <td>{$row['Nama_Produk']}</td>
            <td>{$row['Kategori']}</td>
            <td>{$row['Harga']}</td>
            <td>{$row['Tanggal_Kadaluarsa']}</td>
            <td>
                <a href='edit.php?id={$row['Kode_Produk']}' class='btn btn-edit'>Edit</a>
                <a href='hapus.php?id={$row['Kode_Produk']}' class='btn btn-hapus' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
            </td>
        </tr>";
    }
    ?>
</table>

<div class="tambah-wrapper">
    <a href="tambah.php" class="btn-tambah">+ Tambah Produk</a>
</div>
</body>
</html>
