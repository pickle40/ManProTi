<?php
 require "../connect.php";
 
  $idd = $_POST['iduser'];
  $output="";
  $hasil = mysqli_query($link,"SELECT Tgl_Absen, Status_Hadir,Alasan, pid  FROM absensimasuk WHERE pid = '$idd'");
  $count=0;
  $hasil2 = mysqli_query($link,"SELECT Tgl_Absen, Status_Hadir,Alasan, pid  FROM absensipulang WHERE pid = '$idd'");
  while($row = mysqli_fetch_assoc($hasil)){ 
   $row2 = mysqli_fetch_assoc($hasil2);

    $dateTimeObject1 = date_create($row['Tgl_Absen']);
    $dateTimeObject2 = date_create($row2['Tgl_Absen']);
    // // $difference = date_diff($dateTimeObject1, $dateTimeObject2);
    // echo $dateTimeObject1;
    // $dateTimeObject1 = date_create('17:13:00'); 
    // $dateTimeObject2 = date_create('12:13:00'); 
  
    $difference = date_diff($dateTimeObject1, $dateTimeObject2); 
    if($difference){
     // echo $difference->format('%h:%m:%s hours');
     // echo "\n<br/>";
     // echo $difference->format('%R%a days');
     // echo "\n<br/>";
     $min = $difference->days * 24 * 60;
     $min += $difference->h * 60;
     $min += $difference->i;
     // echo "\n<br/>";
  
    }
    $output .=
        '

            <tr>
                <td>'.++$count.'</td>
                <td>'.$row['Tgl_Absen'].'</td>
                <td>'.$row2['Tgl_Absen'].'</td>
    			<td>'.$min.' Minutes</td>
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