<?php 
include "../connect.php";

function getdata($con) {
    $output = "";
    $count = 0;
    $query = "SELECT * FROM `pegawai`";
    $result = $con->query($query);
    $query1 = "SELECT * FROM `training`";
    $result1 = $con->query($query1);

    while($row = mysqli_fetch_array($result)) {
        $row1 = mysqli_fetch_array($result1);
        $id =  $row['pid'];
        $sql_edit = "SELECT * FROM pegawai WHERE pid='$id'";
        //$query_edit = mysqli($link, $sql_edit);
        // $data = mysqli_fetch_array($query_edit);
        $output .='
        <tr>
        <th scope="row">'.++$count.'</th>
        <td>'.$row['Nama'].'</td>
        <td>'.$row['NIK'].'</td>
        <td>'.$row['Alamat'].'</td>
        <td>'.$row['Agama'].'</td>
        <td>'.$row['Status_Kawin'].'</td>
        <td>'.$row['Email'].'</td>
        <td>'.$row['No_Telp'].'</td>
        <td>'.$row['Tgl_Masuk'].'</td>

        <form action="liatabsen.php" method="POST">
        </form>
        <td>
            <button class="btn btn-warning my-3" type="submit" name="hisdata" style="cursor:pointer; value="'.$row['pid'].'" onclick="liat('.$row['pid'].')">Absen</button>
        </td>
        <td>
            <button class="btn btn-info my-3" type="submit" action="totalwaktuuntukgaji.php" name="hisdata" style="cursor:pointer; value="'.$row['pid'].'" onclick="liathis('.$row['pid'].')">Pelatihan</button>
        </td>
        <td>
            <a href="#" type="button" class="btn btn-info my-3" data-toggle="modal" data-target="#myModal'.$row['pid'].'">Edit</a>
        </td>
        <div class="modal fade" id="myModal'.$row['pid'].'" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Data Pegawai</h4>
            echo '.$row['pid'].';
        </div>
        <div class="modal-body">
        <form role="form" action="save.php" method="POST">
        <input type="hidden" name="id" value="'.$row['pid'].'>"
        <div class="form-group">
            <label>NIK</label>
            <input type="text" name="NIK" class="form-control" value="'.$row['NIK'].'">"
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="Nama" class="form-control" value="'.$row['Nama'].'">"
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="Alamat" class="form-control" value="'.$row['Alamat'].'">"
        </div>
        <div class="form-group">
            <label>Agama</label>
            <input type="text" name="Agama" class="form-control" value="'.$row['Agama'].'">"
        </div>
        <div class="form-group">
            <label>Status Kawin</label>
            <input type="text" name="Kawin" class="form-control" value="'.$row['Status_Kawin'].'">"
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="Email" class="form-control" value="'.$row['Email'].'">"
        </div>
        <div class="form-group">
            <label>No. Telp</label>
            <input type="text" name="Telp" class="form-control" value="'.$row['No_Telp'].'">"
        </div>
        <div class="form-group">
            <label>Gaji</label>
            <input type="text" name="Gaji" class="form-control" value="'.$row['Gaji'].'">"
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Update</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <td>
            <a href="#" type="button" class="btn btn-danger my-3" data-toggle="modal" data-target="#ModalDelete'.$row['pid'].'">Delete</a>
        </td>
        <div class="modal fade" id="ModalDelete'.$row['pid'].'" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">System</h3>
        </div>
        <div class="modal-body">
            <center><h4>Are you sure you want to delete this data?</h4></center>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            <a type="button" class="btn btn-success" href="delete.php?id='.$row['pid'].'">Yes</a>
        </div>
        <td>
        <a href="#" type="button" class="btn btn-info my-3" data-toggle="modal" data-target="#myGaji'.$row['pid'].'">Gaji</a>
    </td>
    <div class="modal fade" id="myGaji'.$row['pid'].'" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Gaji Pegawai</h4>
    </div>
    <div class="modal-body">
    <form role="form" method="POST">
    <input type="hidden" name="id" value="'.$row['pid'].'>"
    <div class="form-group">
        <label>Pegawai ID</label>
        "'.$row['pid'].'"
    
    <div class="form-group">
        <label>Nama</label>
        "'.$row['Nama'].'"
    </div>
    <div class="form-group">
        <label>Total Menit Kerja</label>
        "'.$row['Menit'].'"
    </div>
    <div class="form-group">
        <label>Gaji(normal)</label>
        "'.$row['Gaji'].'"
    </div>
    <div class="form-group">
        <label>Gaji Lembur(menit)</label>
        "'.$row['Gaji']/'12000'*'2'.'" //gaji lembur adalah 2 kali gaji biasa
    </div>
    <div class="form-group">
        <label>Total Gaji Pegawai</label>
        "'.$row['Gaji']/'12000'*$row['Menit']+$row['Gaji']/'12000'*'2'*$row['Menit_Lembur'].'"
    </div>
    </div>
  
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
        </tr>
        '
        ;
    }

    return $output;
}

?>

<?php 
function gethistory($con) {
  ?>
  <script>
    $('#abseninfo').hide();
    $('#gajiinfo').hide();

    </script>
  <?php
     $output = "";
     $count = 0;
     $query = "SELECT * FROM `training` WHERE Pegawai_Id = 2";
     $result = $con->query($query);
    
 
     while($row = mysqli_fetch_array($result)) {    
         $output .= 
         '
         <tr>
         <th scope="row">'.++$count.'</th>       
         <td>'.$row['id'].'</td>
         <td>'.$row['Nama_Pelatihan'].'</td>
         <td>'.$row['Tgl_Mulai'].'</td>
         <td>'.$row['Tgl_Selesai'].'</td>
         <td>'.$row['Status'].'</td>      
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
  <title>List Pegawai</title>
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
             <h1 style="text-align: center;color: white;">List Pegawai</h1>
         </div>
     </div>
 </div> 

 <div style=" margin: 0px auto; border-radius: 12px;" class="container">
    <div class="row" style=" border-radius: 10px; background-color: #dcf1ff;">
    <div class="col-12 p-3 table-responsive">
        <table class="table" id="clueList">
            <thead class="text-center">
                <tr>

                    <th>#</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Alamat</th>
                    <th>Agama</th>
                    <th>Status Kawin</th>
                    <th>Email</th>
                    <th>No Telp</th>
                    <th>Tanggal masuk</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>


                </tr>
            </thead>
            <tbody class="text-center">
                <?php echo getdata($link); ?>
            </tbody>
        </table>
    </div>
    </div>
<br><br>

    <div  id="abseninfo" style=" border-radius: 10px; background-color: #dcf1ff;" class="row">
    <div class="col-12 p-3 table-responsive">
        <table class="table" id="clueList">
            <thead class="text-center">
                <tr>
               
                    <th>#</th>
                    <th>Tanggal - Jam Masuk</th>
                    <th>Alasan</th>
                    <th>Tanggal - Jam Pulang</th>
                    <th>Alasan</th>
                    <th>Total waktu</th>
                </tr>
      <div class="container">
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Warning</button>
  </div>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Warning</h4>
        </div>
        <form>
            <div class="form-group row" style="margin:20px 20px;">
              <label class="col-sm-2 col-form-label">E-Mail Address</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="address" style="width: 100%;" placeholder="Notes Title">
              </div>
            </div>
            <div class="form-group row" style="margin:20px 20px;">
              <label class="col-sm-2 col-form-label">Subject</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="subject" style="width: 100%;" placeholder="Notes Title">
              </div>
            </div>
            <div class="form-group" style="margin:35px 35px;">
                <label for="notes">Notes</label>
                <textarea class="form-control" rows=5 id="notes" placeholder="Text Notes"></textarea>
            </div>
            <button style="margin:50px 50px;" type="button" id="send" value="submit" class="btn btn-success my-3" >Send</button>
            </form>
        <div class="modal-footer" >
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
  
</div>
        </form>
                </tr>
            </thead>
            <tbody  id="tbody" class="text-center">
                <?php echo getdata($link); ?>
            </tbody>
        </table>

    </div>
</div>


<!-- #################### training ##################### -->
<div  id="historyinfo" style=" border-radius: 10px; background-color: #dcf1ff;" class="row">
    <div class="col-12 p-3 table-responsive">
        <table class="table" id="clueList">
            <thead class="text-center">
                <tr>
               
 <th>#</th>
      <th>ID</th>
      <th>Nama pelatihan</th>
      <th>Tgl mulai</th>
      <th>Tgl selesai</th>
      <th>Status</th>

</div>
        </form>
                </tr>
            </thead>
            <tbody  id="tbody" class="text-center">
                <?php echo gethistory($link); ?>
            </tbody>
        </table>
    </div>
</div>  
</div>  

<style>
    @media screen and (min-width: 676px) {
        .modal-dialog {
          max-width: 650px; /* New width for default modal */
          height: 1000px;
        }
    }
</style>



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
        $('#historyinfo').hide(); 

        
        $('#clueList').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
    });

     function liat(id) {
      $('#historyinfo').hide(); 
      $('#gajiinfo').hide(); 
        var iduser = id;
            $.ajax({
            type: "POST",
            url: "liatabsen.php",
            data: 
            {
                iduser:iduser
            },
            success: function(res) {
            //    alert(id);
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

     function liathis(id) {
      $('#abseninfo').hide(); 
      $('#gajiinfo').hide(); 
        var iduser = id;
            $.ajax({
            type: "POST",
            url: "liathistory.php",
            data: 
            {
                iduser:iduser
            },
            success: function(res) {
            alert(id);
                if (res == "gagal") {
                    alert("gagal");
                }
                else {
                    $('#tbody').html(res);
                   
                  
                    $('#historyinfo').show();

                }
            }
        });
     }

     function deletedata(del_id){
         $('#deldata').val(del_id);
         $.ajax({
             url:"getpegawai.php",
             type: "POST",
             data: ({id_del_data:del_id})
         })
     }



</script>



</body>
</html>
