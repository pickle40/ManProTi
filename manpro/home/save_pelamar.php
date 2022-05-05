<?php
	require_once '../connect.php';
	
	$nama = $_POST['nama'];
    $nik = $_POST['nik'];
	$lahir = $_POST['lahir'];
	$address = $_POST['address'];
    $agama = $_POST['agama'];
	$kawin = $_POST['kawin'];
	$email = $_POST['email'];
    $telp = $_POST['telp'];

	mysqli_query($link, "INSERT INTO `lamaran` VALUES('', '$nik', '$nama', '$address', '$lahir', '$agama', '$kawin', '$email', '$telp', NULL, NULL, NULL)") or die(mysqli_error());
	
	header("location: halamanpelamar.php");
?>