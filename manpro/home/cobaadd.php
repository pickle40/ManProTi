<?php
	include "../connect.php";

	

		// $iduser = $_POST["iduser"];
		// $output="";
		// $hasil = mysqli_query($link,"SELECT *  FROM `lamaran` WHERE id = $iduser");
		// while($row = mysqli_fetch_assoc($hasil)){ 		
		// $query = "DELETE FROM `lamaran` WHERE id - $iduser"
		// }

	$id = $_POST['deldata'];
	echo $id;
	//echo "test";
	// $hapus	= mysqli_query($link, "DELETE FROM lamaran where Nama ='$Nama'")
	
	// if($hapus){
	// 	echo "<script> alert('data berhasil dibapus')</script>";
	// }
	// else{
	// 	echo "<script> alert('data tidak berhasil dibapus')</script>";
	// }

	$sql = "DELETE FROM lamaran WHERE id ='$id'";

if ($link->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $link->error;
}

$link->close();
header("location:listpegawai.php");
?>