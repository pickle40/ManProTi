<?php
	require "../connect.php";
		$idd = $_POST["iduser"];
		echo $idd;
		$hasil = mysqli_query($link,"SELECT *  FROM `training` WHERE `Pegawai_Id` = '$idd'");
		$count=0;
		while($row = mysqli_fetch_assoc($hasil)){ 		
		$output .=
        '

            <tr>
                <td>'.++$count.'</td>
                <td>'.$row['id'].'</td>
                <td>'.$row['Nama_Pelatihan'].'</td>
                <td>'.$row['Tgl_Mulai'].'</td>
                <td>'.$row['Tgl_Selesai'].'</td>
				<td>'.$row['Status'].'</td>


            </tr>
        ';
		}



		if($output){ 
			echo $idd;
			echo $output;
		   }else{
			echo "data masih Kosong";
		   }
	
?>