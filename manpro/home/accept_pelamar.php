<?php
	require_once '../connect.php';
	
    $id = $_POST['id'];
	$nama = $_POST['nama'];
    $nik = $_POST['nik'];
	$lahir = $_POST['lahir'];
	$address = $_POST['address'];
    $agama = $_POST['agama'];
	$kawin = $_POST['kawin'];
	$email = $_POST['email'];
    $telp = $_POST['telp'];

	mysqli_query($link, "INSERT INTO `pegawai` VALUES('', '', '', '$id', '$nik', '$agama', '$nama', '$address', '$lahir', '$agama', '$kawin', '$email', '$telp', NULL, NULL) FROM `lamaran`") or die(mysqli_error());
	echo $_REQUEST['$id']
?>