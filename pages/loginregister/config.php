<?php
session_start(); 

$conn = mysqli_connect("localhost", "trtkp23_19", "bkMX5dh6", "web_trtkp23_19");

if (!$conn) {
    header("Location: connectionerror.html");
}

?>