<!DOCTYPE html>
<html>
<body>

<?php  
	require "../connect.php";
	$maxuser = mysqli_query($link,"SELECT id FROM user WHERE id = ( SELECT MAX(id) FROM user )");
    // mysqli_fetch_assoc($maxuser);
// for ($x = 1; $x <= mysqli_fetch_array($maxuser)+2; $x+=1) {
//   echo "The number is: $x <br>";
// }
  while($data = mysqli_fetch_array($maxuser)){
    $test = $data;
    echo "The number is: $test <br>";
  }
?>  

</body>
</html>
