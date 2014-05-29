<?php
	$username = $_POST['username'];	
	$con = mysql_connect("localhost:3306","root","admin");
	
	mysql_query("SET NAMES 'utf8'");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("whisper", $con);
	
	if($username != ""){
		$result = mysql_query("SELECT ud_id FROM user_data WHERE ud_loginname='$username'");
		if(mysql_num_rows($result) > 0){
			echo 1;
		}
		else{
			echo 0;
		}
	}		
	mysql_close($con);
?>