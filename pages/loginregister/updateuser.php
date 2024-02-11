<?php
@include "./config.php";

$username=isset($_POST["username"]) ? $_POST["username"] : "";
$description=isset($_POST["description"]) ? $_POST["description"] : "";

if(empty($username) || empty($description)) {
    header("Location:./connectionerror.html");
    exit;
}

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

try {
    $conn;
} catch (Exeption $e) {
    header("Location:./connectionerror.html");
}

$sql="update users set username=?, description=?";

//Valmistellaan sql-lause
$stmt=mysqli_prepare($conn, $sql);
//Sijoitetaan muuttujat oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, "ss", $username, $description,);
//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);
//Suljetaan tietokantayhteys
mysqli_close($conn);

header("Location:./adminpage.php");



?>