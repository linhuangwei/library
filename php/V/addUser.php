<?php
include('../C/manSchool.php');
$manSchool = new manSchool();
$rows = $manSchool->getAllSchool();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>注册</title>
	<link rel="stylesheet" type="text/css" href="../../css/addUser2.css">
</head>
<body>
<div class="ret"><input type="button" name="" value="返回" id="ret"></div>

<div class="table">
<table>
<form action="addUserResult.php" method="post">
<tr>
<td>输入的电话号码</td>
<td><input type="text" name="userPhone">
<br></td>
</tr>
<tr>
<td>输入姓名</td>
<td><input type="text" name="userName">
<br></td>
</tr>
<tr>
<td>输入借书号</td>
<td><input type="text" name="broNum" placeholder="名字拼音开头小写+手机号码"><br></td>
</tr>
<tr>
<td>再次输入借书号</td>
<td><input type="text" name="broNum1"><br></td>
</tr>
<tr>
<tr>
<td>选择学校</td>
<td>
<select name="school">
<?php 
	foreach($rows as $row){
		?>
		<option value="<?php echo $row['schId'];?>">
		<?php echo $row['schName'];?>
		</option>
		<?php 
	}
	
?>	
</select>
</td>
</tr>
<tr>
<td>选择性别</td>
<td>
<select name="sex">
<option value="1">男</option>
<option value="2">女</option>
</select>
</td>

<tr>

<tr>
<td>输入家庭住址</td>
<td><input type="text" name="homeAddress" placeholder="例如:吾锋镇枣岭村1号"><br></td>
</tr>

<div class="addUser"><input type="submit" name="" value="注册"></div>

</form>
</table>
</div>
</body>
<script type="text/javascript" src="../../js/showUser.js"></script>
</html>