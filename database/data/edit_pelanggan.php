<?php
require_once 'dbkoneksi.php';

$id = $_GET['id'];

$sql = "SELECT * FROM pelanggan WHERE id=?";
$st = $dbh->prepare($sql);
$st->execute([$id]);
$row = $st->fetch();
?>

<form method="post" action="proses_pelanggan.php">
  <input type="hidden" name="idedit" value="<?php echo $id; ?>">
  <label>Kode</label>
  <input type="text" name="kode" value="<?php echo $row['kode']; ?>"><br>
  <label>Nama</label>
  <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br>
  <label>Jenis Kelamin</label>
  <input type="radio" name="jk" value="Laki-laki" <?php echo $row['jk'] == 'Laki-laki' ? 'checked' : ''; ?>>Laki-laki
  <input type="radio" name="jk" value="Perempuan" <?php echo $row['jk'] == 'Perempuan' ? 'checked' : ''; ?>>Perempuan<br>
  <label>Tempat Lahir</label>
  <input type="text" name="tmp_lahir" value="<?php echo $row['tmp_lahir']; ?>"><br>
  <label>Tanggal Lahir</label>
  <input type="date" name="tgl_lahir" value="<?php echo $row['tgl_lahir']; ?>"><br>
  <label>Email</label>
  <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
  <label>Kartu ID</label>
  <input type="text" name="kartu_id" value="<?php echo $row['kartu_id']; ?>"><br>
  <input type="submit" name="proses" value="Update">
</form>
