<?php
	require "../connect.php";

	

		$iduser = $_POST["iduser"];
		$output="";
		$hasil = mysqli_query($link,"SELECT Tgl_Absen, Status_Hadir,Alasan  FROM `absensimasuk` WHERE pid = $iduser");
		$count=0;
		$hasil2 = mysqli_query($link,"SELECT Tgl_Absen, Status_Hadir,Alasan  FROM `absensipulang` WHERE pid = $iduser");
		while($row = mysqli_fetch_assoc($hasil)){ 
			$row2 = mysqli_fetch_assoc($hasil2);
		
		$output .=
        '

            <tr>
                <td>'.++$count.'</td>
                <td>'.$row['Tgl_Absen'].'</td>
                <td>'.$row['Status_Hadir'].'</td>
                <td>'.$row['Alasan'].'</td>
                <td>'.$row2['Tgl_Absen'].'</td>
                <td>'.$row2['Status_Hadir'].'</td>
                <td>'.$row2['Alasan'].'</td>
				
            </tr>
        ';
		}



		if($output){ 
			echo $output;
		}else{
			echo "gagal";
		}
	
?>