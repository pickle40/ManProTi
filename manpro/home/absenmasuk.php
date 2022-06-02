<?php 
include("../connect.php");

$username = $_SESSION['username'];

$query = mysqli_query($link, 'SELECT id FROM user WHERE username ="'.$username.'"');
    $result =mysqli_fetch_assoc($query);
    $id = $result['id'];

  $q = mysqli_query($link, "INSERT INTO `absensimasuk`(`id`, `pid`, `Tgl_Absen`, `Status_Hadir`, `Alasan`) VALUES (null,$id,null,1,null)"); 
  if($q){ 
   echo "Berhasil Absen Masuk";
  }else{
   echo "gagal";
  }


 ?>