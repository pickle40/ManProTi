<?php
include "../connect.php";
$id = $_SESSION['id'];
$query = mysqli_query($link, 'SELECT * FROM `user` WHERE id ="'.$id.'"');
    $result =mysqli_fetch_assoc($query);
$query1 = mysqli_query($link, 'SELECT * FROM `pegawai` WHERE pid ="'.$id.'"');
    $result1=mysqli_fetch_assoc($query1);
?>

<?php 
function getdata($con) {
    $output = "";
    $count = 0;
    $query = "SELECT * FROM `resign`";
    $result = $con->query($query);
    $query1 = "SELECT * FROM `pegawai`";
    $result1 = $con->query($query1);
    $query2 = "SELECT * FROM `training`";
    $result2 = $con->query($query2);

    while($row = mysqli_fetch_array($result)) {
        $ttt=0; 
        while($row1 = mysqli_fetch_array($result1))  {
            if($row1['userID'] = $row['pid']){
                $ttt=$row1['Tgl_Masuk'];
                break;
            }
        }
        $ppp=0;
        $qqq=0; 
        while($row2 = mysqli_fetch_array($result2))  {
            if($row2['Pegawai_Id'] = $row['pid']){
                $ppp=$row2['Nama_Pelatihan'];
                $qqq=$row2['Status'];
                break;
            }
        }
        $output .= 
        '
        <tr>
        <th scope="row">'.++$count.'</th>
        <td>'.$row['pid'].'</td>
        <td>'.$row['Nama'].'</td>
        <td>'.$row['NIK'].'</td>
        <td>'.$row['Alamat'].'</td>
        <td>'.$row['Tgl_Lahir'].'</td>
        <td>'.$row['Status_Kawin'].'</td>
        <td>'.$row['Email'].'</td>
        <td>'.$row['No_Telp'].'</td>
        <td>'.$ttt.'</td>
        <td>'.$row['Tgl_Resign'].'</td>
        <td>'.$ppp.'</td>
        <td>'.$qqq.'</td>
        <td>'.$row['Alasan'].'</td>
        <td>
            <a href="#" type="button" class="btn btn-danger my-3" data-toggle="modal" data-target="#ModalDelete'.$row['id'].'">Accept</a>
        </td>
        <div class="modal fade" id="ModalDelete'.$row['id'].'" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">System</h3>
        </div>
        <div class="modal-body">
            <center><h4>Are you sure you want to accept this employee resignation?</h4></center>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            <a type="button" class="btn btn-success" href="test.php?id='.$row['pid'].'">Yes</a>
            <td>
            <a href="#" type="button" class="btn btn-success my-3" data-toggle="modal" data-target="#ModalDelete1'.$row['id'].'">Reject</a>
        </td>
        <div class="modal fade" id="ModalDelete1'.$row['id'].'" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">System</h3>
        </div>
        <div class="modal-body">
            <center><h4>Are you sure you want to reject this employee resignation?</h4></center>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            <a type="button" class="btn btn-success" href="reject_resignation.php?id='.$row['pid'].'">Yes</a>
        </tr>
        
        </tr>
        ';
    }

    return $output;
}

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css"> -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <title>List Resign</title>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>

       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">		
    
      body {
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background: url(../bg.jpg);
}



</style>
<body>


<?php include "navbar.php"; ?>
    <div class="container">	
       <div class="row justify-content-md-center">
          <div class="col-4">	
             <br><br><br>
             <h1 style="text-align: center;color: white;">Resignation List</h1>
         </div>
     </div>
 </div>	

 <div style=" margin: 0px auto; border-radius: 12px;" class="container">
    <div class="row" style=" border-radius: 10px;
    background-color: #dcf1ff;">
    <div class="col-12 p-3 table-responsive">
        <table class="table" id="clueList">
            <thead class="text-center">
                <tr>
               

                    <th>#</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Status Kawin</th>
                    <th>Email</th>
                    <th>No Telp</th>
                    <th>Tgl Masuk</th>
                    <th>Tgl Resign</th>
                    <th>Pelatihan</th>
                    <th>Status Pelatihan</th>
                    <th>Alasan</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php echo getdata($link); ?>
            </tbody>
        </table>
    </div>
    </div>
<br><br>



<div class="container">

</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css"/>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<!--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script>


    $(document).ready(function(){ 
        $('#abseninfo').hide(); 
        
        $('#clueList').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
    });

</script>



</body>
</html>
