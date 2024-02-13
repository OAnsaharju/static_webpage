<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location:./login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../styles/changeuser.css" />
</head>
<body>
<?php
@include "./config.php";


$changed=isset($_GET["changed"]) ? $_GET["changed"] : "";


if(empty($changed)){
    header("Location:./adminpage.php");
    exit;
}


try{$conn;}
catch(Exception $e){
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
<h1>Change parameters and press ok to submit</h1>

    <form  action='./updateuser.php' method='post'>
<p>username:</p><input type='text' name='username' value='<?php print $item->username;?>'><br>
<p>description:</p><input type='text' name='description' value='<?php print $item->description;?>'><br>
<p>id:</p><input type="text" name="id" value="<?php print $item->id ?>"><br>
<input type='submit' name='ok' value='ok'><br>

</form>
</body>
</html>


<?php
mysqli_close($conn);
?>