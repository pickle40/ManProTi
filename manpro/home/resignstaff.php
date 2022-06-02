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
    <?php include "navbarstaff.php"; ?>
    <div class="container" align="center">
                <div class="row">
                <h1 style="text-align: center;color: white;">Resignation</h1>
            <div style="padding-top: 50px;" class="col-lg-12 col-md-12 col-sm-12" >
                <h2 id="txt2" style="color: white;"></h2>
              <h2 id="txt" style="color: white;"></h2>
              </div>
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
			<button type="button" class="btn btn-success" data-target="#form_modal" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Apply</button>

		</div>	
	</div>
	<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="save_resignation.php">
					<div class="modal-header">
						<h3 class="modal-title">Pendaftaran</h3>
					</div>
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="nama" class="form-control" required="required"/>
							</div>
                            <div class="form-group">
								<label>Pegawai ID</label>
								<input type="text" name="ppid" class="form-control" required="required"/>
							</div>
                            <div class="form-group">
								<label>Alasan</label>
								<input type="text" name="alasan" class="form-control" required="required"/>
							</div>
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
    </body>

</html>