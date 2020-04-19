<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword ="";
$dBname = "login_sys";

$conn = mysqli_connect($servername,$dBUsername,$dBPassword,$dBname);

if(!$conn){
	die("sorry, connection failed!  ".mysqli_connect_error());
}