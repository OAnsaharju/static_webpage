<?php

$conn = mysqli_connect("localhost", "root", "", "web_trtkp23_19");

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>