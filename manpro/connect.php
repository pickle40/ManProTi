<?php
$link = mysqli_connect("localhost", "admin", "admin", "manpro");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

session_start();
?>