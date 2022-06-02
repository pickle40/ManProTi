<?php
	require_once '../connect.php';

    $alasan = $_POST['alasan'];
    $ppid = $_POST['ppid'];
    $nama = $_POST['nama'];
    $sid = $_SESSION['id'];
    if($ppid == $sid){
    $query = "SELECT pid, userID, Nama ,NIK ,Alamat, Agama, Status_Kawin,Email, Tgl_Lahir,No_Telp,Tgl_Masuk FROM `pegawai` WHERE userID =$ppid";
    $result = $link->query($query);
    if($result){
        echo "berhasil";
    }
    else{
        echo "gagal";
    }

    while($row = mysqli_fetch_array($result)) {
        $id=$row['pid'];
        $nik=$row['NIK'];
        $alamat=$row['Alamat'];
        $agama=$row['Agama'];
        $kawin=$row['Status_Kawin'];
        $email=$row['Email'];
        $telp=$row['No_Telp'];
        $lahir=$row['Tgl_Lahir'];
        $masuk=$row['Tgl_Masuk'];
        ;
    }
    }
	mysqli_query($link, "INSERT INTO `resign` VALUES('', '$ppid', '$nik', '$nama', '$alamat', '$lahir', '$agama', '$kawin', '$email', '$telp', '', '', '$masuk', NULL, '$alasan')") or die(mysqli_error());
    header("location: resignstaff.php");
?>