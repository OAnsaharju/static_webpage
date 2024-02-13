<?php
 session_start();

 @include "./config.php";

  print "List of registered users";
  

  $result=mysqli_query($conn, "select * from users");
  while($item=mysqli_fetch_object($result)){
    print "<p>$item->username $item->description <a href='./removeuser.php?removed=$item->id'>Remove</a><a href='./changeuser.php?changed=$item->id'>Change</a></p>";
  
  }
  mysqli_close($conn);
 
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin page</title>
</head>
<body>
  
</body>
</html>
 
