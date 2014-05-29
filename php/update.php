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
mysql_close($con);
?>