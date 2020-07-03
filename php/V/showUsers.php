<?php

	include('../C/manUser.php');
	include('../C/manSchool.php');
	$manUser = new manUser();
	$manSchool = new manSchool();
	$rows = $manUser->getAllUser();
	
	//var_dump(sizeof($rows));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>管理用户</title>
	<link rel="stylesheet" type="text/css" href="../../css/showUsers.css">
</head>
<body>
<div class="ret"><a href="manHomePage.php">返回主页</a></div><br>
<div class="ret1"><a href="addUser.php">注册借阅者</a></div><br>
	<div class="table">
	<table border="1">
	<tr>
		<th>借书号</th>
		<th>用户电话</th>
		<th>用户名字</th>
		<th>学校</th>
		<th>性别</th>
		<th>家庭住址</th>
		<th>修改</th>
		<th>删除</th>
	</tr>
	<?php

	foreach ($rows as $row) {
		?>
	<tr>
		<td><?php echo $row['broNum'];?></td>
		<td><?php echo $row['userPhone'];?></td>
		
		<td><?php echo $row['userName'];?></td>
		<?php
		$rowss = $manSchool->getSchoolById($row['school']);
		foreach($rowss as $rowsss){
			?>
			<td><?php echo $rowsss['schName'];?></td>
			<?php
		}
			?>
			<?php
		if( $row['sex'] == 1){
			$sex = "男";
		}else {
			$sex = "女";
		}	?>
	
		<td><?php echo $sex;?></td>
		<td><?php echo $row['homeAddress'];?></td>
		
		<td><a href="updUser.php?broNum=<?php echo $row['broNum'] ?>">修改</a></td>
		<td><a href="delUserReSult.php?broNum=<?php echo $row['broNum'] ?>">删除</a></td>
	</tr>
		<?php
	}
	?>
	</table>
	</div>
</body>
</html>
