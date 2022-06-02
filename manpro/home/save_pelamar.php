<?php
 require_once '../connect.php';
 
 $nama = $_REQUEST['nama'];
    $nik = $_REQUEST['nik'];
 $lahir = $_REQUEST['lahir'];
 $address = $_REQUEST['address'];
    $agama = $_REQUEST['agama'];
 $kawin = $_REQUEST['kawin'];
 $email = $_REQUEST['email'];
    $telp = $_REQUEST['telp'];
 $date = date("Y-m-d H:i:s");

 mysqli_query($link, "INSERT INTO lamaran VALUES('', '$nik', '$nama', '$address', '$lahir', '$agama', '$kawin', '$email', '$telp', NULL, NULL, '$date')") or die(mysqli_error($link));
 
 header("location: halamanpelamar.php");
?>