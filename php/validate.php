<?php
	session_start();
	unset($_SESSION['userid']);
	unset($_SESSION['ok']);
	unset($_SESSION['ok2']);
	
	$con = mysql_connect("localhost:3306","root","admin");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("whisper", $con);
	
	$username = $_POST['username'];
	$userpsw = $_POST['userpsw'];
		
	
	$result = mysql_query("SELECT ud_id FROM user_data WHERE ud_loginname='$username' AND ud_password='$userpsw'");
	$uid = mysql_fetch_array($result);
	
	if(mysql_num_rows($result) > 0){
		$_SESSION['ok']=1;
		$_SESSION['userid']= $uid['ud_id'];
		echo 1;
		exit;
	}
	else{
		echo 0;
		exit;
	}
	mysql_close($con);
?>