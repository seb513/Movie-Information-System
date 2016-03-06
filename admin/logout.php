<?php

session_start();

unset($_SESSION['MovieinfoAdmin']);
setcookie("MovieinfoCookie",NULL,time()-1);
header("location: login.php");
?>
