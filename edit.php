<?php
include 'db_connect.php';

if (!isset($_GET['id'])) {
    echo "ID produk tidak ditemukan.";
    exit;
}

$id = $_GET['id'];

// Ambil data berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM produk_makanan WHERE Kode_Produk = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<h2>Edit Data Produk</h2>

<form method="POST" class="form-produk">
    <div class="form-row">
        <div class="form-group">
            <label>Kode Produk:</label><br>
            <input type="text" name="kode_produk" value="<?= $data['Kode_Produk'] ?>" required>
        </div>
        <div class="form-group">
            <label>Nama Produk:</label><br>
            <input type="text" name="nama_produk" value="<?= $data['Nama_Produk'] ?>" required>
        </div>
    </div>
        <div class="form-group">
    <label>Kategori:</label><br>
    <input type="text" name="kategori" value="<?= $data['Kategori'] ?>" required><br><br>
</div>
        <div class="form-group">
    <label>Harga:</label><br>
    <input type="text" name="harga" value="<?= $data['Harga'] ?>" required><br><br>
</div>
        <div class="form-group">
    <label>Tanggal Kadaluarsa:</label><br>
    <input type="date" name="tanggal_kadaluarsa" value="<?= $data['Tanggal_Kadaluarsa'] ?>" required><br><br>
</div>
    <input type="submit" name="update" value="Update" class="btn-submit">
</form>


<?php
if (isset($_POST['update'])) {
    $kode    = $_POST['kode_produk'];
    $nama    = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $harga   = $_POST['harga'];
    $tanggal = $_POST['tanggal_kadaluarsa'];

    $update = "UPDATE produk_makanan SET 
    Kode_Produk = '$kode',
    Nama_Produk = '$nama',
    Kategori = '$kategori',
    Harga = '$harga',
    Tanggal_Kadaluarsa = '$tanggal'
    WHERE Kode_Produk = '$id'";


    if (mysqli_query($conn, $update)) {
        echo "<script>alert('Data berhasil diupdate!'); window.location='index.php';</script>";
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
}
?>
</body>
</html>
