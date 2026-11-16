
<?php
include "koneksi.php";

$id = $_GET['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id = $id");
$data = mysqli_fetch_assoc($ambil);


if (isset($_POST['update'])) {
    $kode_produk = $_POST['kode_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $status_stok = $_POST['status_stok'];
    $kategori_produk = $_POST['kategori_produk'];

    $sql = "UPDATE produk SET
         kode_produk = '$kode_produk',
         nama_produk = '$nama_produk',
         harga = '$harga',
         deskripsi = '$deskripsi',
         status_stok = '$status_stok',
         kategori_produk = '$kategori_produk'
         WHERE id = '$id'";

    $ubah = mysqli_query($koneksi, $sql);

    if ($ubah) {
        header("Location: index.php?pesan=data berhasil diubah");
        exit;
    } else {
        echo "Gagal mengubah data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Produk Koperasi</title>
</head>
<body>
    <h2>Edit Data Produk Koperasi</h2>

    <form method="POST" action="">

        <label>Kode Produk:</label><br>
        <input type="text" name="kode_produk" value="<?php echo $data['kode_produk']; ?>"><br><br>

        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" value="<?php echo $data['nama_produk']; ?>"><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" value="<?php echo $data['harga']; ?>"><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi"><?php echo $data['deskripsi']; ?></textarea><br><br>

        <label>Status Stok:</label><br>
        <input type="radio" name="status_stok" value="Tersedia" <?php if ($data['status_stok'] == 'Tersedia') echo 'checked'; ?>> Tersedia

        <input type="radio" name="status_stok" value="Habis" <?php if ($data['status_stok'] == 'Habis') echo 'checked'; ?>> Habis<br><br>

        <label>Kategori Produk:</label><br>
        <select name="kategori_produk">
            <option value="Makanan" <?php if ($data['kategori_produk'] == 'Makanan') echo 'selected'; ?>>Makanan</option>
            <option value="Minuman" <?php if ($data['kategori_produk'] == 'Minuman') echo 'selected'; ?>>Minuman</option>
            <option value="Alat Tulis" <?php if ($data['kategori_produk'] == 'Alat Tulis') echo 'selected'; ?>>Alat Tulis</option>
            <option value="Seragam & Atribut" <?php if ($data['kategori_produk'] == 'Seragam & Atribut') echo 'selected'; ?>>Seragam & Atribut</option>
            <option value="Jasa Cetak" <?php if ($data['kategori_produk'] == 'Jasa Cetak') echo 'selected'; ?>>Jasa Cetak</option>
        </select><br><br>

        <button type="submit" name="update">Update</button>
        <a href="index.php">Batal</a>

    </form>
</body>
</html>
