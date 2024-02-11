<?php
@include "./config.php";


$changed=isset($_GET["changed"]) ? $_GET["changed"] : "";


if(empty($changed)){
    header("Location:./adminpage.php");
    exit;
}


try{$conn;}
catch(Exeption $e){
    header("./connectionerror.html");
    exit;
}

    
$sql="select * from users where id=?";
$stmt=mysqli_prepare($conn, $sql);
//Sijoitetaan muuttuja sql-lauseeseen
mysqli_stmt_bind_param($stmt, 'i', $changed);
//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);
//Koska luetaan prepared statementilla, tulos haetaan 
//metodilla mysqli_stmt_get_result($stmt);
$result=mysqli_stmt_get_result($stmt);
if (!$item=mysqli_fetch_object($result)){
    header("Location:../html/tietuettaeiloydy.html");
    exit;
}
?>

<form action='./updateuser.php' method='post'>
username:<input type='text' name='username' value='<?php print $item->username;?>'><br>
description:<input type='text' name='description' value='<?php print $item->description;?>'><br>
<input type='submit' name='ok' value='ok'><br>

</form>

<?php
mysqli_close($conn);
?>