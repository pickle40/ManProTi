<?php
	require_once '../connect.php';
	mysqli_query($link, "DELETE FROM `pegawai` WHERE `pid`='$_REQUEST[id]'") or die(mysqli_error());
	header("location:listpegawai.php");
?>