<?php
include "../connect.php";

if(isset($_POST['submitbtn'])){
    $name=$_POST['nama'];
    $nik=$_POST['nik'];
    $email=$_POST['email'];
    $alamat=$_POST['alamat'];
    $telp=$_POST['telp'];

    echo $name;
    $filename = $_FILES["profile"]["name"]; 
    $tempname = $_FILES["profile"]["tmp_name"];
    if(!empty($filename)){
        $folder = "profile/".$filename; 
        echo $folder."<br>";
        echo $_FILES['profile']['size']."<br>";
        echo $_FILES['profile']['type']."<br>";
        if(move_uploaded_file($tempname, $folder)){
            echo "aman";
        }
        else{
            echo $_FILES['profile']['error'];
        }
    }
    else{
        $filename="194938.png";
        echo $_FILES['profile']['size']."<br>";
    }

    // if(empty($_POST['fb_desc'])){
    //     $desc="No description";
    // }
    // else{
    //     $desc=$_POST['fb_desc'];
    // }

    $sql0="SELECT * FROM lamaran";
    $result0=$link->query($sql0);
    if($result0->num_rows>0){
        while($row=$result0->fetch_assoc()){
            if($row['name']===$name){             
                $isnew=FALSE;
                $last_id = $row['id'];
            }
        }
    }

    if($isnew===TRUE){
        echo "berhasil";
        $sql="INSERT INTO lamaran (Nama,Alamat,Email,No_Telp, NIK, Tgl_Lahir, Agama, Status_Kawin, Tgl_Lamar) VALUES ('$name','$alamat','$email','$telp', '$nik', 'sysdate()', '$nik', '$nik', 'sysdate()')";
        // $sql=mysqli_query($link, "INSERT INTO `lamaran`(Nama,Alamat,Email,No_Telp, NIK, Tgl_Lahir, Agama, Status_Kawin, Tgl_Lamar) VALUES ('$name','$alamat','$email','$telp', '$nik', 'sysdate()', '$nik', '$nik', 'sysdate()')";
        // $result1=$link->query($sql);
        // $last_id = $link->insert_id;
    }
    else{
        echo "gagal";
    }

    // $sql2="INSERT INTO lamaran (name,alamat,email,telp,nik) VALUES ('$name','$alamat','$email','$telp, $nik')";
    $result2=$link->query($sql2);
    $link->close();
    //header("location:welcome.php");
}

?>