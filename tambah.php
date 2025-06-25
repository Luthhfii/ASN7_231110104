<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Tambah Produk Makanan</h2>

<form method="POST">
    <label>Kode Produk:</label><br>
    <input type="text" name="kode_produk" required><br><br>

    <label>Nama Produk:</label><br>
    <input type="text" name="nama_produk" required><br><br>

    <label>Kategori:</label><br>
    <input type="text" name="kategori" required><br><br>

    <label>Harga:</label><br>
    <input type="text" name="harga" required><br><br>

    <label>Tanggal Kadaluarsa:</label><br>
    <input type="date" name="tanggal_kadaluarsa" required><br><br>

    <input type="submit" name="simpan" value="Simpan">
</form>

<?php
if (isset($_POST['simpan'])) {
    $kode    = $_POST['kode_produk'];
    $nama    = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $harga   = $_POST['harga'];
    $tanggal = $_POST['tanggal_kadaluarsa'];

    $query = "INSERT INTO produk_makanan (Kode_Produk,Nama_Produk, Kategori, Harga, Tanggal_Kadaluarsa)
              VALUES ('$kode','$nama', '$kategori', '$harga', '$tanggal')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>
</body>
</html>
