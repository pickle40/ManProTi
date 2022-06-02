<?php
 require_once '../connect.php';
 
 $nama = $_REQUEST['nama'];
 $mulai = $_REQUEST['mulai'];
 $selesai = $_REQUEST['selesai'];
 $keterangan = $_REQUEST['keterangan'];

 mysqli_query($link, "INSERT INTO training_post VALUES('', '$nama', '$mulai', '$selesai', '$keterangan')") or die(mysqli_error($link));
 
 header("location: pelatihan_admin.php");
?>