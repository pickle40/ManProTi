<?php 
include("../connect.php");

$username = $_SESSION['username'];

$query = mysqli_query($link, 'SELECT id FROM `user` WHERE username ="'.$username.'"');
    $result =mysqli_fetch_assoc($query);
    $id = $result['id'];



$cek = mysqli_query($link,'SELECT absensimasuk.id FROM absensimasuk JOIN user ON absensimasuk.pid=user.id WHERE user.username ="'.$username.'"');

	if(mysqli_num_rows($cek)>0){
		$q = mysqli_query($link, "INSERT INTO `absensimasuk`(`id`, `pid`, `Tgl_Absen`, `Status_Hadir`, `Alasan`) VALUES (null,$id,null,1,null)"); 
		if($q){ 
			echo "Berhasil Absen Masuk";
		}else{
			echo "gagal";
		}
	}else{
		echo "tes";
		// $q = mysqli_query($link, "INSERT INTO `absensimasuk`(`id`, `pid`, `Tgl_Absen`, `Status_Hadir`, `Alasan`) VALUES (null,$id,null,1,null)"); 
		// if($q){ 
		// 	echo "success";
		// }else{
		// 	echo "gagal";
		// }
	}

 ?>