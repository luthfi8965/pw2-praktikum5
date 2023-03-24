<?php 
require_once 'dbkoneksi.php';
?>
<?php 
  $kode = $_POST['kode'];
  $nama = $_POST['nama'];
  $jk = $_POST['jk'];
  $tmp_lahir = $_POST['tmp_lahir'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $email = $_POST['email'];
  $kartu_id = $_POST['kartu'];
  
  $_proses = $_POST['proses'];
  
  // array data
  $ar_data[]=$kode; // ? 1
  $ar_data[]=$nama; // ? 2
  $ar_data[]=$jk;// 3
  $ar_data[]=$tmp_lahir;
  $ar_data[]=$tgl_lahir;
  $ar_data[]=$email;
  $ar_data[]=$kartu_id; // ? 7

   if($_proses == "Simpan"){
    // data baru
    $sql = "INSERT INTO pelanggan (kode,nama,jk,tmp_lahir,tgl_lahir,
    email,kartu_id) VALUES (?,?,?,?,?,?,?)";
   }else if($_proses == "Update"){
    $ar_data[]=$_POST['idedit'];// ? 8
    $sql = "UPDATE pelanggan SET kode=?,nama=?,jk=?,tmp_lahir=?,
    tgl_lahir=?,email=?,kartu_id=? WHERE id=?";
   }
   if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
   }
   if(isset($_GET['id'])){
      $id = $_GET['id'];
      $sql = "SELECT * FROM pelanggan WHERE id=?";
      $st = $dbh->prepare($sql);
      $st->execute([$id]);
      $row = $st->fetch();
      
   }else{
      $row['kode'] = "";
      $row['nama'] = "";
      $row['jk'] = "";
      $row['tmp_lahir'] = "";
      $row['tgl_lahir'] = "";
      $row['email'] = "";
      $row['kartu_id'] = "";
   }

      $id = $_GET['id'];
      $sql = "DELETE FROM pelanggan WHERE id=?";
      $st = $dbh->prepare($sql);
      $st->execute(array($id));
      header('location:list_pelanggan.php');
   


   header('location:list_pelanggan.php');
?>