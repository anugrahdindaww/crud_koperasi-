 CREATE DATABASE koperasi;
 USE koperasi;
 
 CREATE DATABASE IF NOT EXISTS produk(
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_produk VARCHAR(20) NOT NULL,
    nama_produk VARCHAR(100) NOT NULL,
    harga INT NOT NULL,
    deskripsi TEXT,
    status_stok ENUM('Tersedia','Habis') NOT NULL,
    kategori_produk VARCHAR(30) NOT NULL 
 );

 INSERT INTO produk (kode_produk, nama_produk, harga, deskripsi, status_stok, kategori_produk) VALUES
 ('44444-ATK', 'spidol',8000, 'tinta','Tersedia','alat tulis'),
 ('22222-MKN', 'kue lapis',2000, 'makanan manis','Tersedia','makanan'),
 ('33333-MNM', 'coca cola',5000, 'minuman bersoda','Tersedia','minuman'),
 
 