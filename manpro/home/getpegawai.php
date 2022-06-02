<?php
require "../connect.php"

$id=$_POST['id_del_data'];
$sql="SELECT * FROM pegawai WHERE id='$id'";
$result = $link->query($sql);
if($row=$result->fetch_assoc()){
    echo $row['id'];
}
?>