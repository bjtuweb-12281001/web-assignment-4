<?php
	require_once '../adodb5/adodb.inc.php';
	$conn = &ADONewConnection('mysql');
	$mysql_obj = $conn -> connect('localhost:3306', 'root', 'admin', 'whisper');
	
	if(!$mysql_obj){
		echo $conn -> ErrorMsg();
		exit();
	}
	
	else{
		$conn -> SetFetchMode(3);
	}
	
	$conn->Execute("SET NAMES 'utf8'");
	$sql = 'SELECT * FROM topic,user_data WHERE topic.sponsor=user_data.ud_id LIMIT 0,4';
	$res = $conn->Execute($sql);
	if ($res === false) die("failed");
	else{
		$i = 1;
		while(!$res->EOF){
			if($i % 2 == 0)
				echo "<tr class = 'deep'><td>". $res->fields['td_id']. "</td><td>". $res->fields['title'] . "</td><td>". $res->fields['type'] ."</td><td>" . $res->fields['detail'] ."</td><td>".$res->fields['ud_nickname'] ."</td></tr>";
			else 
				echo "<tr class = 'light'><td>". $res->fields['td_id']. "</td><td>". $res->fields['title'] . "</td><td>". $res->fields['type'] ."</td><td>" . $res->fields['detail'] ."</td><td>".$res->fields['ud_nickname'] ."</td></tr>";
			
			$i++;
			$res->MoveNext();
		}
	}
	$conn->Close();
?>