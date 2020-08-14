<?php
require 'function.php';
#入口
if(!empty($_GET['id']) && !empty($_GET['number']) && !empty($_GET['supplier'])){
	$id = $_GET['id'];
	$number = $_GET['number'];
	$getSupplier = $_GET['supplier'];
	$supplierArr = ['r'=>'热处理','x'=>'线割'];
	$supplier = array_key_exists($getSupplier,$supplierArr)? [$getSupplier,$supplierArr[$getSupplier]] : $getSupplier;
	add($id,$number,$supplier);
}
function add($id,$number,$supplier){
	$conn = getConnect();
	$date = date('Y-m-d H:i:s',time());
	$sql = "INSERT INTO `outgoing`.`2020`(`id`, `number`, `supplier`, `technology`, `date`, `enddate`, `state`) VALUES ('{$id}', '{$number}', '{$supplier[0]}','{$supplier[1]}' , '{$date}', '', '0')";
	if(!$conn->query($sql)){
		echoErron("添加外发失败,单号可能已经存在!点击确定返回主页");
	}else{
		echoErron("添加外发成功!点击确定返回主页");
	}
}

?>