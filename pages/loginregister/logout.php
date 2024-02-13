<?php

session_start();

if(isset($_SESSION['admin'])){
    session_destroy();
    header("Location: ../../#");
} elseif(isset($_SESSION['user'])){
    session_destroy();
    header("Location: ../../#");
} else {
    header ("Location: ../../#");
}

?>