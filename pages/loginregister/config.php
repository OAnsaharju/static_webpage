<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
    header('Location: ../../#');
}

$conn = mysqli_connect("localhost", "trtkp23_19", "bkMX5dh6", "web_trtkp23_19");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>