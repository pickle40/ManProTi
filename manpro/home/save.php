<?php
	require_once '../connect.php';
	
	$name = $_POST['name'];
	$nik = $_POST['nik'];
	$address = $_POST['address'];
	$agama = $_POST['agama'];
	$kawin = $_POST['kawin'];
	$email = $_POST['email'];
	$telp = $_POST['telp'];
	
	mysqli_query($link, "INSERT INTO `pegawai` VALUES('', '', '', '', '$nik', '$name', '$address', '', '$agama', '$kawin', '$email', '$telp', '', '')") or die(mysqli_error());
	
	header("location: edit.php");
?>