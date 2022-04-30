<?php
include "connect.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
	if (empty($_POST['username'])) {
		header("Location:index.php?stat=1");
	}
	else if (empty($_POST['password'])) {
		header("Location:index.php?stat=2");
	}
	else{
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$username = $link->real_escape_string(test_input($_POST['username']));
		$password = $link->real_escape_string(test_input($_POST['password']));
		$hashpassword = md5($password);
		$check = "SELECT `username`, `password` FROM `user` WHERE username='".$username."'";
		$result = $link->query($check);
		$count = $result->num_rows;
				if($count > 0){
					while($row = $result->fetch_assoc()){
						if($hashpassword == $row["password"]){
							$role = mysqli_fetch_assoc(mysqli_query($link, "SELECT status,name,username FROM user WHERE username = '$username'"));
							$_SESSION['status'] = $role['status'];
							$_SESSION['username'] = $role['username'];
							echo $_SESSION['username'];
							if($_SESSION['status'] == 1){
								header("Location:home/index.php");
							} else{
                                header("Location:index.php?stat=6");
                            }
							
						}
						else{
							header("Location:index.php?stat=3");
						}
					}
				}
				else{
					header("Location:index.php?stat=4");
				}	
		
	}
}
else{
	Header("Location:index.php?stat=5");
}
?>
