<?php
	require "../connect.php";

	

		$iduser = $_POST["iduser"];
		$output="";
		$hasil = mysqli_query($link,"SELECT id, Nama  FROM `departemen` WHERE id = $iduser");
		$count=0;
		while($row = mysqli_fetch_assoc($hasil)){ 		
		$output .=
        '

            <tr>
                <td>'.++$count.'</td>
                <td>'.$row['id'].'</td>
                <td>'.$row['Nama'].'</td>
				
            </tr>
        ';
		}



		if($output){ 
			echo $output;
		}else{
			echo "gagal";
		}
	
?>