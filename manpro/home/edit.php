<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>

	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Edit Pegawai</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">	
			<button type="button" class="btn btn-success" data-target="#form_modal" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Add Member</button>
			<br /></br />
			<table class="table table-bordered">
				<thead class="alert-info">
					<tr>
						<th>ID</th>
						<th>Nama</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
                        include "../connect.php";
						$count=0;
						$query = mysqli_query($link, "SELECT pid, userID,Nama ,NIK ,Alamat, Agama, Status_Kawin,Email,No_Telp,Tgl_Masuk FROM `pegawai`") or die(mysqli_error());
						while($fetch = mysqli_fetch_array($query)){
						$count++;
					?>
					<tr class="del_mem<?php echo $fetch['pid']?>">
						<td><?php echo $fetch['pid']?></td>	
                        <td><?php echo $fetch['Nama']?></td>			
		
						<td><button type="button" class="btn btn-danger" data-target="#modal_confirm<?php echo $count?>" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Delete</button>
			            </td>				
					</tr>
					
					<div class="modal fade" id="modal_confirm<?php echo $count?>" aria-hidden="true">
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
									<a type="button" class="btn btn-success" href="delete.php?id=<?php echo $fetch['mem_id']?>">Yes</a>
								</div>
							</div>
						</div>
					</div>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>	
	</div>
	<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="save.php">
					<div class="modal-header">
						<h3 class="modal-title">Add Pegawai</h3>
					</div>
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="name" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>NIK</label>
								<input type="text" name="nik" class="form-control" required="required" />
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" name="address" class="form-control" required="required"/>
							</div>
                            <div class="form-group">
								<label>Agama</label>
								<input type="text" name="agama" class="form-control" required="required"/>
							</div><div class="form-group">
								<label>Status Kawin</label>
								<input type="text" name="kawin" class="form-control" required="required"/>
							</div>
                            <div class="form-group">
								<label>Email</label>
								<input type="text" name="email" class="form-control" required="required"/>
							</div><div class="form-group">
								<label>Telp</label>
								<input type="text" name="telp" class="form-control" required="required"/>
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