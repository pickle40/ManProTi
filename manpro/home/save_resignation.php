<?php
	require_once '../connect.php';
    $query = "SELECT pid, userID,Nama ,NIK ,Alamat, Agama, Status_Kawin,Email, Tgl_Lahir,No_Telp,Tgl_Masuk FROM `pegawai`";
    $result = $link->query($query);

    while($row = mysqli_fetch_array($result)) {
        $id=$row['pid'];
        $nama=$row['Nama'];
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
    $alasan = $_POST['alasan'];

	mysqli_query($link, "INSERT INTO `resign` VALUES('', '$nik', '$nama', '$alamat', '$lahir', '$agama', '$kawin', '$email', '$telp', '', '', '$masuk', '', '$alasan')") or die(mysqli_error());
    header("location: resignstaff.php");
?>