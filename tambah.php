
<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $kode_produk = $_POST['kode_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $status_stok = $_POST['status_stok'];
    $kategori_produk = $_POST['kategori_produk'];

    $sql = "INSERT INTO produk (kode_produk, nama_produk, harga, deskripsi, status_stok, kategori_produk)
    VALUES ('$kode_produk', '$nama_produk', '$harga', '$deskripsi', '$status_stok', '$kategori_produk')";

    $simpan = mysqli_query($koneksi, $sql);

    if ($simpan) {
        header("Location: index.php?pesan=Data berhasil ditambahkan");
        exit;
    } else {
        echo "Gagal Menyimpan data : " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Koperasi</title>
</head>
<body>

    <h2>Tambah Data Produk Koperasi</h2>

    <form method="POST" action="">

        <label>Kode Produk:</label><br>
        <input type="text" name="kode_produk"><br><br>

        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk"><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga"><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi"></textarea><br><br>

        <label>Status Stok:</label><br>
        <select name="status_stok">
            <option value="Tersedia">Tersedia</option>
            <option value="Habis">Habis</option>
        </select><br><br>

        <label>Kategori Produk:</label><br>
        <select name="kategori_produk">
            <option value="Makanan" >Makanan</option>
            <option value="Minuman" >Minuman</option>
            <option value="Alat Tulis" >Alat Tulis</option>
            <option value="Seragam & Atribut" >Seragam & Atribut</option>
            <option value="Jasa Cetak" >Jasa Cetak</option>
        </select><br><br>

        <button type="submit" name="simpan">Simpan</button>
        <a href="index.php">Batal</a>

    </form>

</body>
</html>
 