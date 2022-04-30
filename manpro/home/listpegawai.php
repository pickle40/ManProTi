<?php 
include "../connect.php";

function getdata($con) {
    $output = "";
    $count = 0;
    $query = "SELECT pid, userID,Nama ,NIK ,Alamat, Agama, Status_Kawin,Email,No_Telp,Tgl_Masuk FROM `pegawai`";
    $result = $con->query($query);


    while($row = mysqli_fetch_array($result)) {

      
        
        $output .= 
        '
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

        <td>
          <button class="btn btn-warning my-3" type="submit" name="absen" style="cursor:pointer; id="'.$row['pid'].'" onclick="liat('.$row['pid'].')">Absen</button>
        </form></td>
        <td>
          <button class="btn btn-info my-3" type="submit" name="hisdata" style="cursor:pointer; id="'.$row['pid'].'" onclick="liathis('.$row['pid'].')">History</button>
        </form></td>
        <td>
          <button class="btn btn-success my-3" type="submit" name="gaji" style="cursor:pointer; id="'.$row['pid'].'" onclick="liat('.$row['pid'].')">Gaji</button>
        </form></td>
        </tr>
        ';
    }

    return $output;
}

?>

<?php 
function gethistory($con) {
    $output = "";
    $count = 0;
    $query = "SELECT id, Nama FROM `departemen`";
    $result = $con->query($query);


    while($row = mysqli_fetch_array($result)) {

      
        
        $output .= 
        '
        <tr>
        <th scope="row">'.++$count.'</th>
       

        <td>'.$row['id'].'</td>
        <td>'.$row['Nama'].'</td>
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
                    <th><button class="btn btn-info btn-lg" type="submit" data-toggle="modal" data-target="#mydel" name="edit" style="cursor:pointer;" href="edit.php">Edit</button></th>

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
      <th>Absen Masuk</th>
      <th>Alasan</th>
      <th>Tanggal - Jam Pulang</th>
      <th>Absen Pulang</th>
      <th>Alasan</th>
      <div class="container">
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Warning</button>

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
      <div  id="historyinfo" style=" border-radius: 10px; background-color: #dcf1ff;" class="row">
    <div class="col-12 p-3 table-responsive">
        <table class="table" id="clueList">
            <thead class="text-center">
                <tr>
               
 <th>#</th>
      <th>ID</th>
      <th>Nama</th>
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
    </div>  

<style>
    @media screen and (min-width: 676px) {
        .modal-dialog {
          max-width: 650px; /* New width for default modal */
          height: 1000px;
        }
    }
</style>
<div class="modal fade" id="mydel" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content" style="padding-left:200px;">
        <div class="modal-header">
          <h4 class="modal-title">Are you sure you want to edit data?</h4>
        </div>
            <button style="margin:50px 50px;" type="button" id="editdata" value="editdata" class="btn btn-success my-3" href="index.php?id=<?php echo $fetch['id']?>">Edit</button>
            </form>
        <div class="modal-footer" >
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
        $('#historyinfo').hide(); 
        
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
            url: "liatabsen.php",
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

     function liathis(id) {
        var iduser = id;
            $.ajax({
            type: "POST",
            url: "liathistory.php",
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
