<?php
$link = mysqli_connect("localhost", "root", "", "dbmanbaru");
// $link = mysqli_connect("localhost", "root", "", "manprot");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

session_start();
?>