<?php
 require_once '../connect.php';

 $id = $_POST['id'];
 $name = $_POST['Nama'];
 $nik = $_POST['NIK'];
 $address = $_POST['Alamat'];
 $agama = $_POST['Agama'];
 $kawin = $_POST['Kawin'];
 $email = $_POST['Email'];
 $telp = $_POST['Telp'];
 $gaji = $_POST['Gaji'];

 //mysqli_query($link, "INSERT INTO pegawai VALUES('', '', '', '', '$nik', '$name', '$address', '', '$agama', '$kawin', '$email', '$telp', '', '')") or die(mysqli_error());
 //$sql = mysqli_query($link, "UPDATE 'pegawai' SET NIK='$nik', Nama='$name', Alamat='$address', Tgl_Lahir='$lahir', Agama='$agama', Status_Kawin='$kawin', Email='$email', No_Telp='$telp', Photo_Profile='$photo' WHERE pid='$id'");
 $sql = mysqli_query($link, "UPDATE pegawai SET NIK='$nik', Nama='$name', Alamat='$address', Agama='$agama', Status_Kawin='$kawin', Email='$email', No_Telp='$telp', Gaji='$gaji' WHERE pid='$id'");

 if($sql){
  echo "behasil update";
  header("location: listpegawai.php");
 }
 else{
  echo "gagal update";
 }

?>