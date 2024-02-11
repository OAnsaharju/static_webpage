<?php
@include "./config.php";


$username=isset($_POST["username"]) ? $_POST["username"] : "";
$description=isset($_POST["description"]) ? $_POST["description"] : "";
$id=isset($_POST["id"]) ? $_POST["id"] : 0;


try{$conn;}
catch(Exeption $e){
    header("./connectionerror.html");
    exit;
}

$removed=isset($_GET["removed"]) ? $_GET["removed"] : "";

if(!empty($removed)){
    $sql="delete from users where id=?";
    $stmt=mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $removed);
    mysqli_stmt_execute($stmt);
}

mysqli_close($conn);

header("Location:./adminpage.php");
exit;
?>