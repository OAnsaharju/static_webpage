<?php


$result=mysqli_query($conn, "select * from users");
  while($item=mysqli_fetch_object($result)){
    
    
  
  }
  mysqli_close($conn);
 

  print "<p>$item->username $item->description <a href='./removeuser.php?removed=$item->id'>Remove</a><a href='./changeuser.php?changed=$item->id'>Change</a></p>";