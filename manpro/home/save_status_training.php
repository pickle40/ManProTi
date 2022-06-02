<?php
 require_once '../connect.php';

 $id = $_POST['id'];
 $status = $_POST['status'];
 echo $status;
 if($status==="failed"){
 $sql = mysqli_query($link, "UPDATE training SET Status='$status' WHERE id='$id'");}
 else{
     echo "ada masalah";
 }
 $sql_check=mysqli_query($link, "SELECT * FROM training WHERE id = '$id'");
 while($row=mysqli_fetch_array($sql_check)){
    $date = date("Y-m-d H:i:s");    // echo $date;
    $temp = $row['Tgl_Selesai'];
    if($date>$temp){
        $sql = mysqli_query($link, "UPDATE training SET Status= 'failed' WHERE id='$id'");
    }
    else{
        $sql = mysqli_query($link, "UPDATE training SET Status= '$status' WHERE id='$id'");
    }
 }
header("location: pelatihan_admin.php");

//  if($sql){
//   echo "behasil update";
//   
//  }
//  else{
//   echo "gagal update";
//  }

?>