<?php
	require_once '../connect.php';
	$id=$_REQUEST['id'];
	$hasil = mysqli_query($link,"SELECT *  FROM `resign` WHERE pid = $id");
	while($row = mysqli_fetch_assoc($hasil)){ 
	$pid = $row['pid'];
	$nama = $row['Nama'];
	$nik = $row['NIK'];
	$alamat = $row['Alamat'];
	$email = $row['Email'];
	$telp = $row['No_Telp'];
	mysqli_query($link, "INSERT INTO `mantan_pegawai` VALUES('', '$pid', NULL, NULL, 
	'$nik', '$nama', '$alamat', '$email', '$telp', NULL, '', '')
	") or die(mysqli_error());

	mysqli_query($link, "DELETE FROM `absensimasuk` WHERE `pid`=$id") or die(mysqli_error());
	mysqli_query($link, "DELETE FROM `absensipulang` WHERE `pid`=$id") or die(mysqli_error());
	mysqli_query($link, "DELETE FROM `pegawai` WHERE `pid`=$id") or die(mysqli_error());
	mysqli_query($link, "DELETE FROM `user` WHERE `id`=$id") or die(mysqli_error());
    mysqli_query($link, "DELETE FROM `resign` WHERE `pid`= $id") or die(mysqli_error());
	header("location:resignhalaman.php");
	}
?>