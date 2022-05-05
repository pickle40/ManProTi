<?php
	include "../connect.php";
		$iduser = $_POST["pid"];
		$output="";
		$hasil = mysqli_query($link,"SELECT Tgl_Absen, Status_Hadir,Alasan  FROM `absensimasuk` WHERE pid = $iduser");
		$count=0;
		$hasil2 = mysqli_query($link,"SELECT Tgl_Absen, Status_Hadir,Alasan  FROM `absensipulang` WHERE pid = $iduser");
		while($row = mysqli_fetch_assoc($hasil)){ 
			$row2 = mysqli_fetch_assoc($hasil2);

				$dateTimeObject1 = date_create($row['Tgl_Absen']);
				$dateTimeObject2 = date_create($row2['Tgl_Absen']);
  
				$difference = date_diff($dateTimeObject1, $dateTimeObject2); 
				$total=$total+$difference;
		}

	echo $total;
?>