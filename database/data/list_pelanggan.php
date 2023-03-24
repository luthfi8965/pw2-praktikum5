<?php 
    require_once 'dbkoneksi.php';
?>
<?php 
   $sql = "SELECT * FROM pelanggan";
   $rs = $dbh->query($sql);
?>

      <a class="btn btn-success" href="form_pelanggan.php" role="button">tambah pelanggan</a>
        <table class="table" width="100%" border="2" cellspacing="2" cellpadding="2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>jk</th>
                    <th>tmp_lahir</th>
                    <th>tgl_lahir</th>
                    <th>email</th>
                    <th>kartu_id</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $nomor  =1 ;
                foreach($rs as $row){
                ?>
                    <tr>
                        <td><?=$nomor?></td>
                        <td><?=$row['kode']?></td>
                        <td><?=$row['nama']?></td>
                        <td><?=$row['jk']?></td>
                        <td><?=$row['tmp_lahir']?></td>
                        <td><?=$row['tgl_lahir']?></td>
                        <td><?=$row['email']?></td>
                        <td><?=$row['kartu_id']?></td>
                        <td>
<a class="btn btn-primary" href="form_pelanggan.php?id=<?=$row['id']?>">View</a>
<a href="edit_pelanggan.php?id=<?php echo $row['id'];?>">Edit</a>
<a href="proses_pelanggan.php?proses=Delete&id=<?php echo $row['id']; ?>" 
   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>

                    </tr>
                <?php 
                $nomor++;   
                } 
                ?>
            </tbody>
        </table>  
