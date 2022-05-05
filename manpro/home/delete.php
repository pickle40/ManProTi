<?php
	require_once '../connect.php';
	$id=$_REQUEST['id'];
	echo '$id';
	mysqli_query($link, "DELETE FROM `absensimasuk` WHERE `pid`='$_REQUEST[id]'") or die(mysqli_error());
	mysqli_query($link, "DELETE FROM `absensipulang` WHERE `pid`='$_REQUEST[id]'") or die(mysqli_error());

	mysqli_query($link, "DELETE FROM `pegawai` WHERE `pid`='$_REQUEST[id]'") or die(mysqli_error());
	header("location:listpegawai.php");
?>