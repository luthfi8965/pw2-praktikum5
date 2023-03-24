<?php 
require_once 'dbkoneksi.php';

// ambil data yang ingin diubah
$id = $_GET['id'];
$sql = "SELECT * FROM produk WHERE id=?";
$st = $dbh->prepare($sql);
$st->execute([$id]);
$row = $st->fetch();

// tampilkan form edit
?>
<form method="POST" action="proses_produk.php">
    <input type="hidden" name="idedit" value="<?php echo $row['id']; ?>">
    <input type="text" name="kode" value="<?php echo $row['kode']; ?>">
    <input type="text" name="nama" value="<?php echo $row['nama']; ?>">
    <input type="text" name="harga_beli" value="<?php echo $row['harga_beli']; ?>">
    <input type="text" name="stok" value="<?php echo $row['stok']; ?>">
    <input type="text" name="min_stok" value="<?php echo $row['min_stok']; ?>">
    <input type="text" name="jenis" value="<?php echo $row['jenis_produk_id']; ?>">
    <input type="submit" name="proses" value="Update">
</form>
