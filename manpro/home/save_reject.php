<?php
 require_once '../connect.php';
 $id=$_REQUEST['id'];
 echo $id;
    $hasil = mysqli_query($link,"SELECT *  FROM lamaran WHERE id = $id");
    while($row = mysqli_fetch_assoc($hasil)){ 
        $id = $row['id'];
        $nama = $row['Nama'];
        $nik = $row['NIK'];
        $alamat = $row['Alamat'];
        $lahir = $row['Tgl_Lahir'];
        $agama = $row['Agama'];
        $kawin = $row['Status_Kawin'];
        $email = $row['Email'];
        $telp = $row['No_Telp'];
    $date = $row['Tgl_Lamar'];
    
    // $date = date('d-m-Y', .$row['Tgl_Lamar'].);
    // echo $date;
    // mysqli_query($link, "INSERT INTO tolak_lamaran VALUES(NULL, ".$row['NIK'].", ".$row['Nama'].", ".$row['Alamat'].", ".$row['Tgl_Lahir'].", ".$row['Agama'].", ".$row['Status_Kawin'].", ".$row['Email'].", ".$row['No_Telp'].", NULL, NULL, ".$row['Tgl_Lamar'].")") or die(mysqli_error()); ////tipe datanya ndak bisa datetime
    mysqli_query($link, "INSERT INTO tolak_lamaran VALUES('',
    '$nik', '$nama', '$alamat', '$lahir', '$agama', 
    '$kawin', '$email', '$telp', NULL, NULL, '$date')")
    or die(mysqli_error($link));
    mysqli_query($link, "DELETE FROM lamaran WHERE id = $id") or die(mysqli_error($link));

    header("location: listlamaran.php");
}
?>