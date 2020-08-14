<?php
require 'function.php';
if(!empty($_GET['id']) && !empty($_GET['date'])){
	$id = $_GET['id'];
	$date = $_GET['date'];
	delect($id,$date);
}
function delect($id,$date){
	$conn = getConnect();
		$sql = "update `2020` set `enddate`='{$date}',`state`='1' where `id`={$id}";
		if(!$conn->query($sql)){
			echoErron("回货失败!点击确定返回主页");
		}else{
			echoErron("回货成功!点击确定返回主页");
		}
		
}
?>