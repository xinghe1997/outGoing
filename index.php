<?php
require 'function.php';
$rows = getOutGoing();
function getOutGoing(){
	$conn = getConnect();
	$sql = "SELECT * from `2020` where state = '0'";
	if(!$result = $conn -> query($sql)){
		return false;
	}
	$rows = [];
	while($row = $result->fetch_assoc()){
		$rows[] = $row;
	}
	return $rows;
}

?>

<!doctype html>
<html>
	<head>
		<title>
			发货1.0
		</title>
		<meta charset="utf-8">
		<style>
			
			.main{
				width: 800px;
				//border:1px solid red;
				margin: 0 auto;
			}
			.top{
				margin: 10px 0 10px 0;
			}
			form{
				margin-top: 10px;
				display: none;
			}
			form > input{
				margin-top: 10px;
				margin-bottom: 10px;
			}
			.show{
				display: none;
			}
			.top > span{
				padding: 0.3rem 1.25rem
			}
			.table{
				text-align: center;
			}
		</style>
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css"/>
		
	</head>
	<body>
		<div class="main">
			<div class="top">
				<button id="add" class="btn btn-outline-primary">
					添加
				</button>
				<button id="delect" class="btn btn-outline-success">
					完成
				</button>
				<?php if(!empty($_GET['add'])):?>
					<span class="alert alert-primary" role="alert">
						添加成功
					</span>
				<?php endif?>
				<span class="show alert alert-danger" role="alert">
				</span>
				<form action="add.php" method="get" class="get">
					<input type="text" class="form-control id" placeholder="单号" name="id"/>
					<input type="text" class="form-control number" placeholder="数量" name="number"/>
					<input type="text" class="form-control supplier" placeholder="供应商" name="supplier"/>
					<button class="btn btn-outline-primary">提交</button>
				</form>
			</div>
			<div class="bottom">
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th scope="col">单号</th>
					  <th scope="col">数量</th>
					  <th scope="col">耗时</th>
					  <th scope="col">供应商</th>
					  <th scope="col">工序</th>
					</tr>
				  </thead>
				  <tbody>
					<?php foreach($rows as $val):?>
						<tr id="tr">
						  <td  scope="row"><?php echo $val['id']?></td>
						  <td><?php echo $val['number']?></td>
						  <td id="date" data-day="<?php echo $val['date']?>"></td>
						  <td><?php echo $val['supplier']?></td>
						  <td>官方店</td>
						</tr>
					<?php endforeach?>
				  </tbody>
				</table>
			</div>
		</div>
		<script src="js/jquery.js"></script>
		<script src="js/index.js"></script>
	</body>
</html>