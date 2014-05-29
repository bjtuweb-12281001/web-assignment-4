<?php
	session_start();
	if(isset($_SESSION['ok'])){
		require_once '../html/chatroom.html';
	}
	else{
		header('Location: .');
	}
?>