<?php
 require_once '../connect.php';
 $id=$_REQUEST['id'];
 $sid = $_SESSION['id'];
    $hasil = mysqli_query($link,"SELECT *  FROM training_post WHERE Id = $id");
    while($row = mysqli_fetch_assoc($hasil)){ 
        $idd = $row['Id'];
        $nama = $row['Nama'];
        $mulai = $row['Tgl_Mulai'];
        $selesai = $row['Tgl_Selesai'];
        $status = "in progress";
    // mysqli_query($link, "INSERT INTO tolak_lamaran VALUES(NULL, ".$row['NIK'].", ".$row['Nama'].", ".$row['Alamat'].", ".$row['Tgl_Lahir'].", ".$row['Agama'].", ".$row['Status_Kawin'].", ".$row['Email'].", ".$row['No_Telp'].", NULL, NULL, ".$row['Tgl_Lamar'].")") or die(mysqli_error()); ////tipe datanya ndak bisa datetime
    mysqli_query($link, "INSERT INTO training VALUES('$idd', '$nama', '$status', '$mulai',
    '$selesai', '$sid')")
    or die(mysqli_error($link));

    mysqli_query($link, "DELETE FROM training_post WHERE Id = $id") or die(mysqli_error($link));

    header("location: profile.php");
}
?>