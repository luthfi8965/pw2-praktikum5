<?php 
require_once 'dbkoneksi.php';

// ambil data yang ingin dihapus
$id = $_GET['id'];
$sql = "SELECT * FROM pelanggan WHERE id=?";
$st = $dbh->prepare($sql);
$st->execute([$id]);
$row = $st->fetch();
?>
<h3>Apakah Anda yakin ingin menghapus data ini?</h3>
<p>Kode: <?php echo $row['kode']; ?></p>
<p>Nama: <?php echo $row['nama']; ?></p>
<form method="POST" action="proses_pelanggan.php">
    <input type="hidden" name="idhapus" value="<?php echo $row['id']; ?>">
    <input type="submit" name="proses" value="Ya">
    <a href="list_pelanggan.php">Tidak</a>
</form>
