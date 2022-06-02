<?php 
include "../connect.php";

function getdata($con) {
    $output = "";
    $count = 0;
    $sek="passed";
    $query = "SELECT * FROM `training` WHERE Status='in progress'";
    $result = $con->query($query);


    while($row = mysqli_fetch_array($result)) {
        $output .= 
        '
        <tr>
        <th scope="row">'.++$count.'</th>
        <td>'.$row['id'].'</td>
        <td>'.$row['Nama_Pelatihan'].'</td>
        <td>'.$row['Status'].'</td>
        <td>'.$row['Tgl_Mulai'].'</td>
        <td>'.$row['Tgl_Selesai'].'</td>
        <td>'.$row['Pegawai_Id'].'</td>
        <td>
            <a href="#" type="button" class="btn btn-info my-3" data-toggle="modal" data-target="#myModal'.$row['id'].'">Edit</a>
        </td>
        <div class="modal fade" id="myModal'.$row['id'].'" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Status Pelatihan</h4>
        </div>
        <div class="modal-body">
        <form role="form" action="save_status_training.php" method="POST">
        <input type="hidden" name="id" value="'.$row['id'].'>"
        <div class="form-group">
            <label>Status</label>
            <input type="text" name="status" class="form-control" value="'.$row['Status'].'">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Update</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </tr>
        ';
    }

    return $output;
}

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css"> -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <title>Pelatihan</title>
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
.neonText {
  color: #fff;
  text-shadow:
    0 0 7px #fff,
    0 0 10px #fff,
    0 0 21px #fff,
    0 0 42px #0fa,
    0 0 82px #0fa,
    0 0 92px #0fa,
    0 0 102px #0fa,
    0 0 151px #0fa;
}
.list{
    margin-left: 10%;
    margin-right: 10%;
    background-color: beige;
}
.Tambah{
    margin-left: 10%;
    margin-right: 10%;
}
.Tambah h1{
    margin-left: 35%;
    padding-bottom: 30px;
}
.list h1{
    margin-left: 35%;
    padding-bottom: 30px;
}
td{
    width: 10%;
    height: 50px;
    
}
form{

}

#div1 {
    width: 350px;
    height: 70px;
    padding: 10px;
    border: 1px solid #aaaaaa;
  }
  </style>
      <body onload="startTime()">
    <?php include "navbar.php"; ?>
    <div class="container" align="center">
                <div class="row">
                <h1 style="text-align: center;color: white;">Pelatihan</h1>
        </div>
     </div>
    <div class="container"> 
       <div class="row justify-content-md-center">
          <div class="col-4"> 
             <br><br><br>

         </div>
     </div>
 </div> 

	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<div class="col-md-2"></div>
		<div class="col-md-8" style="padding-left: 200px;">	
			<button type="button" class="btn btn-success" data-target="#form_modal" data-toggle="modal">
                <span class="glyphicon glyphicon-plus"></span> Create</button>

		</div>	
	</div>
	<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="save_pelatihan.php">
					<div class="modal-header">
						<h3 class="modal-title">Keterangan Pelatihan</h3>
					</div>
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="nama" class="form-control" required="required"/>
                            </div>
                            <div class="form-group" required="required">
								<label>Tanggal Mulai</label>
                                <br>
                            <input type="date" id="mulai" name="mulai">
							</div>
							<div class="form-group">
								<label>Tanggal Selesai</label>
                                <br>
                            <input type="date" id="selesai" name="selesai">
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<input type="text" name="keterangan" class="form-control" required="required"/>
                            </div>

					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
						<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<br><br><br><br><br>
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
                    <th>Status</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>ID Pegawai</th>
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
    </body>
    <script>
function startTime() {
  const today = new Date();
  let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();
   let d = today.getDate();
    let mo = today.getMonth() +1;
     let y = today.getFullYear();

  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt2').innerHTML = d + "-" + mo + "-" + y;
  document.getElementById('txt').innerHTML =  h + ":" + m + ":" + s;
  setTimeout(startTime, 1000);
}

function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>

</html>