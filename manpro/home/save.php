<?php
	require_once '../connect.php';

	$id = $_GET['id'];
	$name = $_GET['Nama'];
	$nik = $_GET['NIK'];
	$address = $_GET['Alamat'];
	$agama = $_GET['Agama'];
	$kawin = $_GET['Kawin'];
	$email = $_GET['Email'];
	$telp = $_GET['Telp'];

	//mysqli_query($link, "INSERT INTO `pegawai` VALUES('', '', '', '', '$nik', '$name', '$address', '', '$agama', '$kawin', '$email', '$telp', '', '')") or die(mysqli_error());
	//$sql = mysqli_query($link, "UPDATE 'pegawai' SET NIK='$nik', Nama='$name', Alamat='$address', Tgl_Lahir='$lahir', Agama='$agama', Status_Kawin='$kawin', Email='$email', No_Telp='$telp', Photo_Profile='$photo' WHERE pid='$id'");
	$sql = mysqli_query($link, "UPDATE pegawai SET NIK='$nik', Nama='$name', Alamat='$address', Agama='$agama', Status_Kawin='$kawin', Email='$email', No_Telp='$telp ' WHERE pid='$id'");

	if($sql){
		echo "behasil update";
		header("location: listpegawai.php");
	}
	else{
		echo "gagal update";
	}

?>