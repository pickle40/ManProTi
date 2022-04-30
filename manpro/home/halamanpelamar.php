<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>manpro</title>
        <!-- <link rel="stylesheet" href="E:/manpro/css.css"> -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" /> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!--Required meta tags-->
        <meta charset="utf.8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">      
        <!--Bootstrap CSS-->
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <?php include "navbar2.php"; ?>
    <div class="container" align="center">
                <div class="row">
                <h1 style="text-align: center;color: white;">Pendaftaran</h1>
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
    <section class="Tambah" id="Tambah">
    <br>
    <div class="text-container">
      <div class="row">
        <div class="col-sm-4">
                        <form method="post" action="addlamaran.php" enctype="multipart/form-data">
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label" style="color:White;">Nama</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="nama" style="width: 100%;" name="nama">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label" style="color:White;">NIK</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="nik" style="width: 100%;" style="color:White;" name="nik">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label" style="color:White;">Email</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="email" style="width: 100%;" name="email">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label" style="color:White;">Alamat</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="alamat" style="width: 100%;" name="alamat">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label" style="color:White;">Telp</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="telp" style="width: 100%;" name="telp">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="cvfile" style="color:White;">CV</label>
                            <div class="col-sm-10" style="margin-left: 55px; margin-top: -30px;">
                              <<form action="/action_page.php">
                              <input id="uploadImage" type="file" accept="image/*" name="profile">
                          </form>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="photofile" class="col-sm-2 col-form-label" style="color:White;">Photo</label>
                            <div class="col-sm-10" style= "margin-top: -20px;">
                              <<form action="/action_page.php">
                            <input type="file" id="photofile" name="photofile" style="color:White;">
                          </form>
                            </div>
                          </div>
                        <br>
                        </form>
                        </div>
                        
    </div>
                      <br>
                     <!-- <input class="btn btn-success my-3" role="button" name="submitbtn" id="submitbtn">Submit</input> -->
                     <button name="submitbtn" type="submit" class="btn btn-info" >Create!</button>

    </section>  
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

$('#submitbtn').click(function(){
           $.ajax({
            url: "addlamaran.php",
            type: "POST",
            data: 
            {
              
          },
          success: function(res)
          {
              alert(res);
              
              
          }
      });

});

</script>

</html>