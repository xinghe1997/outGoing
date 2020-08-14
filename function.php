<?php
function echoErron($error){
	echo '<script language="javascript">';
	echo "alert('$error');";
	echo "location.href='index.php'";
	echo '</script>';
}
function getConnect(){
	$conn = new mysqli('127.0.0.1','root','123456','outGoing');
	$conn->set_charset("utf8");
	if ($conn->connect_errno) {
		printf($mysqli->connect_error);
		exit();
	}
	return $conn;
}