<?php
	//connects code to localhost
	$mysqli = new mysqli('localhost', 'root', 'root', 'todo');
	//if $mysqli fails, then it dies and gives message
	if ($mysqli->connect_error){
		die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
	}
	else{
		echo "Connection Made";
	}
	$mysqli->close();
?>