<?php
$link = mysqli_connect("localhost", "admin", "admin", "upload");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

session_start();

if (isset($_POST['upload'])){
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    if(!empty($filename)){
        $folder = "files/".$filename;
        echo $folder."<br>";
        if(move_uploaded_file($tempname, $folder)){
            echo "masuk";
        }
        else{
            echo "error";
        }

        $sql = "INSERT INTO uploadfile (filename) VALUES ('$filename')";
        $result = $link->query($sql);
        $link->close();
    }
}

?>