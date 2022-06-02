<?php
	require_once '../connect.php';
	$id=$_REQUEST['id'];
	$hasil = mysqli_query($link,"SELECT *  FROM `resign` WHERE pid = $id");
	while($row = mysqli_fetch_assoc($hasil)){ 


    mysqli_query($link, "DELETE FROM `resign` WHERE `pid`= $id") or die(mysqli_error());
	header("location:resignhalaman.php");
	}
?>