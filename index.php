<?php
include "koneksi.php";

$search = isset($_GET['search']) ? trim($_GET['search']) : '';

$query = "SELECT * FROM produk";

if ($search != "") {
    $search = mysqli_real_escape_string($koneksi, $search);
    $query .= " WHERE 
        kode_produk LIKE '%$search%' OR
        nama_produk LIKE '%$search%' OR
        kategori_produk LIKE '%$search%' OR
        deskripsi LIKE '%$search%'";
}

$query .= " ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi</title>
</head>
<body>

    <h2>Koperasi</h2>

    <form method="GET" action="index.php" style="margin-bottom: 20px;">
        <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Cari produk..." />
        <button type="submit">Cari</button>
        <?php if ($search != "") { ?>
            <a href="index.php">Reset</a>
        <?php } ?>
    </form>

    <a href="tambah.php">Tambah Produk</a>
    <br><br>

    <?php if (isset($_GET['pesan'])) { ?>
        <p><b>Status:</b> <?php echo $_GET['pesan']; ?></p>
    <?php } ?>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Status Stok</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        if (mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['kode_produk']; ?></td>
                    <td><?php echo $data['nama_produk']; ?></td>
                    <td><?php echo $data['harga']; ?></td>
                    <td><?php echo $data['deskripsi']; ?></td>
                    <td><?php echo $data['status_stok']; ?></td>
                    <td><?php echo $data['kategori_produk']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
                        <a href="hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                    </td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="8" align="center">Data tidak ditemukan</td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>