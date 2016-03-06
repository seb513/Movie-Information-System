<?php
	// Create connection
	$connect =mysql_connect("localhost","root","") or die('localhost connection error');
	
	//select a database
	
	mysql_select_db('movieinfosys', $connect) or die('db_connection error');
?>