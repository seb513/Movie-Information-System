<?php
//starting session
session_start();

//if cookie exists
if(isset($_COOKIE['MovieinfoCookie'])){
	$_SESSION['MovieinfoAdmin'] = $_COOKIE['MovieinfoCookie'];
}

//check for login
if(!isset($_SESSION['MovieinfoAdmin'])){
	header("location: login.php");
}