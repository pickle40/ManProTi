<?php
	require_once '../connect.php';
	$id=$_REQUEST['id'];
	echo $id;
	mysqli_query($link, "UPDATE FROM `pegawai` WHERE `pid`='$_REQUEST[id]'") or die(mysqli_error());
	header("location:listpegawai.php");
?>