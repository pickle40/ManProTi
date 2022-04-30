<?php 
include "../connect.php";

function getdata($con) {
    $output = "";
    $count = 0;
    $query = "SELECT id,NIK, Nama , Tgl_Lahir ,Alamat, Agama, Status_Kawin, Email, No_Telp, Tgl_Lamar, CV, Photo_Profile FROM `lamaran`";
    $result = $con->query($query);


    while($row = mysqli_fetch_array($result)) {

      
        
        $output .= 
        '
        <tr>
        <th scope="row">'.++$count.'</th>
       

        <td style="cursor:pointer; text-decoration: underline;" id="'.$row['id'].'"  onclick="liat('.$row['id'].')">'.$row['Nama'].'</td>
        <td>'.$row['NIK'].'</td>
        <td>'.$row['Alamat'].'</td>
        <td>'.$row['Tgl_Lahir'].'</td>
        <td>'.$row['Status_Kawin'].'</td>
        <td>'.$row['Email'].'</td>
        <td>'.$row['No_Telp'].'</td>
        <td>'.$row['Tgl_Lamar'].'</td>

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
  <title>List Pelamar</title>
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
             <h1 style="text-align: center;color: white;">List Pelamar</h1>
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
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Status Kawin</th>
                    <th>Email</th>
                    <th>No Telp</th>
                    <th>Tgl Lamar</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php echo getdata($link); ?>
            </tbody>
        </table>
    </div>
    </div>
<br><br>

    <div  id="abseninfo" style=" border-radius: 10px;
    background-color: #dcf1ff;" class="row">
    <div class="col-12 p-3 table-responsive">
        
        <table class="table" id="clueList">
            <thead class="text-center">
                <tr>
               
 <th>#</th>
      <th>Nama</th>
      <th>Tanggal Lamar</th>
      <th>Email</th>
      <th>No Telp</th>
      <th>NIK</th>
      <form action="deletelamaran.php" method="POST">
          <input type="hidden" name="deldata" id="deldata" value="">
          <button class="btn btn-danger my-3" type="submit" name="delete">Reject</button>

      <form action="" method="POST">
          <input class="btn btn-success my-3" type="submit" name="accept" value="Accept">
        </form>
                </tr>
            </thead>
            <tbody  id="tbody" class="text-center">
                <?php echo getdata($link); ?>
            </tbody>
        </table>

    </div>

    </div>
</div>


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

     function liat(id) {
        var iduser = id;
            $.ajax({
            type: "POST",
            url: "lihatpelamar.php",
            data: 
            {
                iduser:iduser
            },
            success: function(res) {
               
                if (res == "gagal") {
                    alert("gagal");
                }
                else {
                    $('#tbody').html(res);
                   
                  
                    $('#abseninfo').show();

                }
            }
        });
     }

     function deletedata(del_id){
         $('#deldata').val(del_id);
         $.ajax({
             url:"getlamaran.php",
             type: "POST",
             data: ({id_del_data:del_id})
         })
     }

</script>



</body>
</html>
