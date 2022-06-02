<?php
	require "../connect.php";
	// $maxuser = mysqli_query($link,"SELECT Max(id)  FROM `user`");
	// for($x = 1; $x <= $maxuser; $x++){
	// while($maxuser){
		$hasil = mysqli_query($link,"SELECT Tgl_Absen, pid  FROM `absensimasuk` WHERE pid = '1'");
		$count=0;
		$hasil2 = mysqli_query($link,"SELECT Tgl_Absen, pid  FROM `absensipulang` WHERE pid = '1'");
		while($row = mysqli_fetch_assoc($hasil)){ 
			$row2 = mysqli_fetch_assoc($hasil2);

				$dateTimeObject1 = date_create($row['Tgl_Absen']);
				$dateTimeObject2 = date_create($row2['Tgl_Absen']);
				// // $difference = date_diff($dateTimeObject1, $dateTimeObject2);
				// echo $dateTimeObject1;
				// $dateTimeObject1 = date_create('17:13:00'); 
				// $dateTimeObject2 = date_create('12:13:00'); 
  
				$difference = date_diff($dateTimeObject1, $dateTimeObject2); 
		// $sql = mysqli_query($link, "UPDATE `pegawai` SET Menit=$difference->h WHERE pid='$idd'");
		
		if($difference){
			echo $difference->format('%h:%m:%s hours');
			echo $difference->format('%R%a days');
			echo "\n<br/>";
			$min = $difference->days * 24 * 60;
			$min += $difference->h * 60;
			$min += $difference->i;
			echo("Difference in minutes is: ");
  			echo $min.' minutes';
			$count+=$min;
			echo "\n<br/>";
			echo $count.' minutes';
			//$sql = mysqli_query($link, "UPDATE `pegawai` SET Menit=$count WHERE pid=1");

		}
		else{
			echo "gagal update";
		};}
?>