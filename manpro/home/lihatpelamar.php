<?php
	include "../connect.php";

	

		$iduser = $_POST["iduser"];
		$output="";
		$hasil = mysqli_query($link,"SELECT *  FROM `lamaran` WHERE id = $iduser");
		$count=0;
		// $hasil2 = mysqli_query($link,"SELECT Tgl_Lamar, Status_Hadir,Alasan  FROM `absensipulang` WHERE id = $iduser");
		while($row = mysqli_fetch_assoc($hasil)){ 
			// $row2 = mysqli_fetch_assoc($hasil2);
		
		$output .=
        '

            <tr>
                <td>'.++$count.'</td>
                <td>'.$row['Nama'].'</td>
                <td>'.$row['Tgl_Lamar'].'</td>
                <td>'.$row['Email'].'</td>
                <td>'.$row['No_Telp'].'</td>
                <td>'.$row['NIK'].'</td>
            </tr>
        ';
		}



		if($output){ 
			echo $output;
		}else{
			echo "gagal";
		}
?>