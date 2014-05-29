<?php
	$username = $_POST['username'];
	$userpsw = $_POST['userpsw'];
	$usergender = $_POST['usergender'];
	$usernickname = $_POST['usernickname'];
	
	$con = mysql_connect("localhost:3306","root","admin");
	
	mysql_query("SET NAMES 'utf8'");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("whisper", $con);

	
	$sql=mysql_query("INSERT INTO `user_data` (`ud_loginname`,`ud_nickname`,`ud_password`,`ud_icon`,`ud_gender`,`ud_registertime`)VALUES('$username','$usernickname','$userpsw','003','$usergender',NOW())");
	echo"#".$usergender."#";
	if($sql) echo "注册成功！";
	else echo "注册失败！".mysql_error();
	
	mysql_close($con);
?>