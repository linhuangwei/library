<?php
	include('../C/manUser.php');
	include('../C/manSchool.php');

	$manUser =  new manUser();
	$manSchool = new manSchool();

	$broNum = $_GET['broNum'];

	// $rows = $manUser->getAllUser();
	$rows = $manUser->getUserByBroNum($broNum);
	//获取所有学校
	$rowss = $manSchool->getAllSchool();
//  var_dump($broNum);
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>修改借阅者</title>
	<link rel="stylesheet" type="text/css" href="../../css/updUser.css">
</head>
<body>
<div class="ret"><input type="button" name="" value="返回" id="ret"></div>
<div class="table">
<table >
<form action="updUserResult.php" method="post">
<?php
foreach ($rows as $row) {
?>

<input type="text" name="broNum" hidden="true" value="<?php echo $broNum;?>">
<tr>
<td>输入手机号</td>
<td><input type="text" name="userPhone" value="<?php echo $row['userPhone'];?>"><br></td>
</tr>
<tr>
<td>输入姓名</td>
<td><input type="text" name="userName" value="<?php echo $row['userName'];?>"><br></td>
</tr>
<tr>
<td>请选择学校</td>
<td>
<select name = "school">
	<option value = "<?php echo $row['school'];?>">默认</option>
	<?php
	foreach ($rowss as $rowsss) {
		?>
		<option value="<?php echo $rowsss['schId'];?>"><?php echo $rowsss['schName'];?></option>
		<?php
	}
	?>
</select>
</td>
</tr>
<tr>
<td>性别</td>
<td>
<select name = "sex">
	<option value = "<?php echo $row['sex'];?>">默认</option>
	<option value = "1">男生</option>
	<option value = "2">女生</option>
	
</select>
<br>
</td>
</tr>

<td>输入家庭住址</td>
<td>
<input type="text" name="homeAddress" value="<?php echo $row['homeAddress'];?>"><br></td>
</tr>
<?php
}
?>
<div class="upd"><input type="submit" name="" value="确认修改"></div>

</form>
</table></div>

</body>
<script type="text/javascript" src="../../js/updUser.js"></script>
</html>