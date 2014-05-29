<?php
	session_start();
	$con = mysql_connect("localhost:3306","root","admin");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("whisper", $con);
	mysql_query("SET NAMES 'utf8'");
	
	$userid = $_SESSION['userid'];
	
	$ud_result = mysql_query("SELECT * FROM user_data WHERE ud_id=$userid");
	$row2 = mysql_fetch_array($ud_result);
	
	//$content =  nl2br($content);
	$content = addslashes($_POST['postinfo']);
	
	
	
	if(!isset($_SESSION['ok2'])&&strlen($content) == 0){
		$_SESSION['ok2']=1;
		$content = $row2['ud_nickname'] . " 进入聊天室！";
		$sql=mysql_query("INSERT INTO history_data_public (hdc_ud_id,hdc_time,hdc_content) VALUES ($userid,now(),'$content')");
		
		
		$hdc_result = mysql_query("SELECT * FROM user_data, history_data_public WHERE ud_id=hdc_ud_id ORDER BY hdc_time");
		
		while($row = mysql_fetch_array($hdc_result))
		{
			echo stripslashes("<div class='message'><div class='user'><img src=./img/".$row['ud_icon'].".png class='icon'><div class='nickname'>".$row['ud_nickname']."</div></div><div class='text'><span class='cor'></span>".htmlspecialchars($row['hdc_content'])." <small>".$row['hdc_time']."</small></div></div>");
		}
	}
	else if(strlen($content) == 0){
		$hdc_result = mysql_query("SELECT * FROM user_data, history_data_public WHERE ud_id=hdc_ud_id ORDER BY hdc_time");
		
		while($row = mysql_fetch_array($hdc_result))
		{
			echo stripslashes("<div class='message'><div class='user'><img src=./img/".$row['ud_icon'].".png class='icon'><div class='nickname'>".$row['ud_nickname']."</div></div><div class='text'><span class='cor'></span>".htmlspecialchars($row['hdc_content'])." <small>".$row['hdc_time']."</small></div></div>");
		}
	}
	else{
		$sql=mysql_query("INSERT INTO history_data_public (hdc_ud_id,hdc_time,hdc_content) VALUES ($userid,now(),'$content')");
		
		
		$hdc_result = mysql_query("SELECT * FROM user_data, history_data_public WHERE ud_id=hdc_ud_id ORDER BY hdc_time");
		
		while($row = mysql_fetch_array($hdc_result))
		{
			echo stripslashes("<div class='message'><div class='user'><img src=./img/".$row['ud_icon'].".png class='icon'><div class='nickname'>".$row['ud_nickname']."</div></div><div class='text'><span class='cor'></span>".htmlspecialchars($row['hdc_content'])." <small>".$row['hdc_time']."</small></div></div>");
		}
	}
	mysql_close($con);
?>