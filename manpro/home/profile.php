<?php
include "../connect.php";
$id = $_SESSION['id'];
$query = mysqli_query($link, 'SELECT * FROM `user` WHERE id ="'.$id.'"');
    $result =mysqli_fetch_assoc($query);
$query1 = mysqli_query($link, 'SELECT * FROM `pegawai` WHERE pid ="'.$id.'"');
    $result1=mysqli_fetch_assoc($query1);

function getdata($con) {
  $id = $_SESSION['id'];
    $output = "";
    $count = 0;
    $query2 = 'SELECT * FROM `training` WHERE Pegawai_Id="'.$id.'"';
    $result2 = $con->query($query2);


    while($row = mysqli_fetch_array($result2)) {    
        $output .= 
        '
        <tr>
        <th scope="row">'.++$count.'</th>       

        <td>'.$row['Nama_Pelatihan'].'</td>
        <td>'.$row['Status'].'</td>
        </tr>
        ';
    } 
    return $output;
    
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- JQuery -->
    <script src="jquery-3.6.0.min.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Absensi</title>
  </head>
  <style type="text/css">
      body {
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background: url(../bg.jpg);
}


/* CSS */
.button-29 {
  align-items: center;
  appearance: none;
  background-image: radial-gradient(100% 100% at 100% 0, #5adaff 0, #5468ff 100%);
  border: 0;
  border-radius: 6px;
  box-shadow: rgba(45, 35, 66, .4) 0 2px 4px,rgba(45, 35, 66, .3) 0 7px 13px -3px,rgba(58, 65, 111, .5) 0 -3px 0 inset;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-flex;
  font-family: "JetBrains Mono",monospace;
  height: 48px;
  justify-content: center;
  line-height: 1;
  list-style: none;
  overflow: hidden;
  padding-left: 16px;
  padding-right: 16px;
  position: relative;
  text-align: left;
  text-decoration: none;
  transition: box-shadow .15s,transform .15s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
  will-change: box-shadow,transform;
  font-size: 18px;
}

.button-29:focus {
  box-shadow: #3c4fe0 0 0 0 1.5px inset, rgba(45, 35, 66, .4) 0 2px 4px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
}

.button-29:hover {
  box-shadow: rgba(45, 35, 66, .4) 0 4px 8px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
  transform: translateY(-2px);
}

.button-29:active {
  box-shadow: #3c4fe0 0 3px 7px inset;
  transform: translateY(2px);
}


/* CSS */
.button-12 {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 6px 14px;
  font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
  border-radius: 6px;
  border: none;

  background: #6E6D70;
  box-shadow: 0px 0.5px 1px rgba(0, 0, 0, 0.1), inset 0px 0.5px 0.5px rgba(255, 255, 255, 0.5), 0px 0px 0px 0.5px rgba(0, 0, 0, 0.12);
  color: #DFDEDF;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-12:focus {
  box-shadow: inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2), 0px 0.5px 1px rgba(0, 0, 0, 0.1), 0px 0px 0px 3.5px rgba(58, 108, 217, 0.5);
  outline: 0;
}
.button-12:hover {
  transform: scale(1.05);
}

/* CSS */
.buttonsubmit {
  background-color: #c2fbd7;
  border-radius: 100px;
  box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,rgba(44, 187, 99, .15) 0 1px 2px,rgba(44, 187, 99, .15) 0 2px 4px,rgba(44, 187, 99, .15) 0 4px 8px,rgba(44, 187, 99, .15) 0 8px 16px,rgba(44, 187, 99, .15) 0 16px 32px;
  color: green;
  cursor: pointer;
  display: inline-block;
  font-family: CerebriSans-Regular,-apple-system,system-ui,Roboto,sans-serif;
  padding: 7px 20px;
  text-align: center;
  text-decoration: none;
  transition: all 250ms;
  border: 0;
  font-size: 16px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.buttonsubmit:hover {
  box-shadow: rgba(44,187,99,.35) 0 -25px 18px -14px inset,rgba(44,187,99,.25) 0 1px 2px,rgba(44,187,99,.25) 0 2px 4px,rgba(44,187,99,.25) 0 4px 8px,rgba(44,187,99,.25) 0 8px 16px,rgba(44,187,99,.25) 0 16px 32px;
  transform: scale(1.05) rotate(-1deg);
}

  </style>
  <body onload="startTime()">
    <?php include "navbarStaff.php"; ?>

     <div class="container" align="center">
                <div class="row">
            <div style="padding-top: 100px;" class="col-lg-12 col-md-12 col-sm-12" >
                <h2 id="txt2" style="color: white;"></h2>
              <h2 id="txt" style="color: white; font-size: 50px;">Profile</h2>
              <table style="color:white;">
  <tr>
    <th style="font-size: 20px;">Nama:</th>
    <td style="font-size: 30px; padding=100px;"><?php echo $result1['Nama']; ?></td>
  </tr>
  <tr>
  <th style="font-size: 20px;">Alamat:</th>
    <td style="font-size: 30px;"><?php echo $result1['Alamat']; ?></td>
  </tr>
  <tr>
  <th style="font-size: 20px;">NIK:</th>
    <td style="font-size: 30px;"><?php echo $result1['NIK']; ?></td>
  </tr>
  <tr>
  <th style="font-size: 20px;">Tanggal Lahir:</th>
    <td style="font-size: 30px;"><?php echo $result1['Tgl_Lahir']; ?></td>
  </tr>
  <tr>
  <th style="font-size: 20px;">Agama:</th>
    <td style="font-size: 30px;"><?php echo $result1['Agama']; ?></td>
  </tr>
  <tr>
  <th style="font-size: 20px;">Status Kawin:</th>
    <td style="font-size: 30px;"><?php echo $result1['Status_Kawin']; ?></td>
  </tr>
  <tr>
  <th style="font-size: 20px;">Telp:</th>
    <td style="font-size: 30px;"><?php echo $result1['No_Telp']; ?></td>
  </tr>
  <tr>
  <th style="font-size: 20px;">Email:</th>
    <td style="font-size: 30px;"><?php echo $result1['Email']; ?></td>
  </tr>
  <tr>
  <th style="font-size: 20px;">Tanggal Masuk:</th>
    <td style="font-size: 30px;"><?php echo $result1['Tgl_Masuk']; ?></td>
  </tr>
  <tr>
  <th style="font-size: 20px;">Gaji:</th>
    <td style="font-size: 30px;">Rp<?php echo $result1['Gaji']; ?></td>
  </tr>

</table>
            </div>
        </div>
     </div>
     <div class="container">	
       <div class="row justify-content-md-center">
          <div class="col-4">	
             <br><br><br>
             <h1 style="text-align: center;color: white;">List Pelatihan</h1>
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
                    <th>Status</th>
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
</html>

