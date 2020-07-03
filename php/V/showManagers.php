<?php

	include('../C/manMan.php');
	$manMan = new manMan();
	$rowms = $manMan->getAllManager();
	
	session_start();
	$identity = $_SESSION['identity'] ;
	if($identity == 1){
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>管理者</title>
	<link rel="stylesheet" type="text/css" href="../../css/showManager.css">
</head>
<body>
<div class="ret"><a href="manHomePage.php">返回主页</a></div><br>
<div class="ret1"><a href="addManager.php">注册管理员</a></div><br>
	<div class="table">
	<table border="1">
	<tr>
		<th>手机号码</th>
		<th>密码</th>
		<th>身份</th>
		<th>删除</th>
	</tr>
	<?php

	foreach ($rowms as $row) {
		?>
	<tr>
		<td><?php echo $row['phone'];?></td>
		<td><?php echo $row['password'];?></td>
		<?php
		if($row['identity'] == 1){
			$identity = "超级管理员";
		}else{
			$identity = "普通管理员";
		}
		?>
		<td><?php echo $identity;?></td>

		<?php if($identity != "超级管理员"){
			?>
		<td><a href="delManagerReSult.php?phone=<?php echo $row['phone'] ?>">删除</a></td>
		<?php }?>
	</tr>
		<?php
	}
	?>
	</table>
	</div>
</body>
</html>
 <?php 
	}else{
		echo "<script>alert('权限不足！！！需要超级管理员权限！！！');
		window.location.href='manHomePage.php';</script>";

	}
 ?>