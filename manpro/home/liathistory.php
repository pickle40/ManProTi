<?php
	require "../connect.php";

	

		$iduser = $_POST["iduser"];
		$output1="";
		$hasil = mysqli_query($link,"SELECT id, Nama_Pelatihan, Status, Tgl_Mulai, Tgl_Selesai, Pegawai_id  FROM `training` WHERE Pegawai_id = $iduser");
		$count=0;
		while($row = mysqli_fetch_assoc($hasil)){ 		
		$output .=
        '

            <tr>
                <td>'.++$count.'</td>
                <td>'.$row['id'].'</td>
                <td>'.$row['Nama_Pelatihan'].'</td>
				<td>'.$row['Status'].'</td>
                <td>'.$row['Tgl_Mulai'].'</td>
                <td>'.$row['Tgl_Selesai'].'</td>

            </tr>
        ';
		}



		if($output){ 
			echo $output1;
		}else{
			echo "gagal";
		}
	
?>