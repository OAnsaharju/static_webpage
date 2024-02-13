<?php
if(!isset($_SESSION["admin"])) {
    header("Location:./login.php");
    exit;
}

@include "./config.php";

$username=isset($_POST["username"]) ? $_POST["username"] : "";
$description=isset($_POST["description"]) ? $_POST["description"] : "";
$id=isset($_POST["id"]) ? $_POST["id"] : 0;

if(empty($username) || empty($description)) {
    header("Location:./connectionerror.html");
    exit;
}

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

try {
    $conn;
} catch (Exception $e) {
    header("Location:./connectionerror.html");
}

$sql="update users set username=?, description=? where id=?";

//Valmistellaan sql-lause
$stmt=mysqli_prepare($conn, $sql);
//Sijoitetaan muuttujat oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, "ssi", $username, $description, $id);
//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);
//Suljetaan tietokantayhteys
mysqli_close($conn);

header("Location:./adminpage.php");



?>