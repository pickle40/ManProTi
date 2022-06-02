<?php
 require_once '../connect.php';
 $id=$_REQUEST['id'];
 echo $id;

 $hasil = mysqli_query($link,"SELECT *  FROM pegawai WHERE pid = $id");
 while($row = mysqli_fetch_assoc($hasil)){
  $id = $row['id'];
        $nama = $row['Nama'];
        $nik = $row['NIK'];
        $alamat = $row['Alamat'];
        $agama = $row['Agama'];
        $kawin = $row['Status_Kawin'];
        $email = $row['Email'];
        $telp = $row['No_Telp'];
  $masuk = $row['Tgl_Masuk'];
  $date_keluar = date("Y-m-d H:i:s");
  
    mysqli_query($link, "INSERT INTO mantan_pegawai VALUES('', '$id', NULL, NULL,
    '$nik', '$nama', '$alamat', 
    '$email', '$telp', NULL, '$masuk', '$date_keluar')") or die(mysqli_error($link));
 mysqli_query($link, "DELETE FROM absensimasuk WHERE `pid`='$_REQUEST[id]'") or die(mysqli_error($link));
 mysqli_query($link, "DELETE FROM absensipulang WHERE `pid`='$_REQUEST[id]'") or die(mysqli_error($link));

 mysqli_query($link, "DELETE FROM pegawai WHERE `pid`='$_REQUEST[id]'") or die(mysqli_error($link));
 header("location:listpegawai.php");
 }
?>