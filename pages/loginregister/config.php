<?php
session_start(); 

if(!isset($_SESSION) || (isset($_SESSION)))
{ 
    header('Location: ../../#');
}

$conn = mysqli_connect("localhost", "trtkp23_19", "bkMX5dh6", "web_trtkp23_19");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>