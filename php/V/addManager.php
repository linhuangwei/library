<?php
include('../C/manMan.php');
$manMan = new manMan();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>注册管理员</title>
	<link rel="stylesheet" type="text/css" href="../../css/addManager.css">
	</head>
<body>
<div class="ret"><input type="button" name="" value="返回" id="ret"></div>
<div class="table">
<table>
<form action="addManagerResult.php" method="post">
<tr>
<td>输入电话号码</td>
<td><input type="text" name="phone">
<br></td>
</tr>
<tr>
<td>输入密码</td>
<td><input type="password" name="password">
<br></td>
</tr>
<tr>
<td>再次输入密码</td>
<td><input type="password" name="password1">
<br></td>
</tr>

<div class="add"><input type="submit" name="" value="注册"></div>

</form>
</table>
</div>

</body>
<script type="text/javascript" src="../../js/addManager.js"></script>
</html>