<?php
include "../connect.php";

$id=$_POST['deldata'];
echo $id."<br>";

$sql = "SELECT * FROM lamaran WHERE id='$id'";
$result = $link->query($sql);
if($result){
    $sqldel = "DELETE FROM lamaran WHERE id='$id'";
    echo "berhasil delete id='$id'";
    $resultdel = $link->query($sqldel);
}

$link->close();
//header("location:listlamaran.php");
?>