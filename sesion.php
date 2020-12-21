<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "u173991785_mochi";
    
	//session_start();
    
    $mysqli = mysqli_connect('localhost', 'root', '');
	//$mysqli = mysqli_connect('localhost', 'u173991785_mochi', 'fsPMfXy1qfN8');
	if (!$mysqli) 
	{
		exit("error: ".mysqli_errno(). "-". mysql1_error());
	}
	//$bd = mysqli_select_db($mysqli, "u173991785_mochi");
	$bd = mysqli_select_db($mysqli, "u173991785_mochi");

?>