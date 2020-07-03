<?php
include('../C/manBookType.php');

$manBookType = new manBookType();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>增加图书类型</title>
	<link rel="stylesheet" type="text/css" href="../../css/addBookType.css">
	</head>
<body>

<div class="table">
<div class="ret"><input type="button" name="" value="返回主页" id="ret"></div>
<table>
<form action="addBookTypeResult.php" method="post">
<tr>
<td>输入图书类型</td>
<td><input type="text" name="bookType"><br></td>
</tr>

<div class="add"><input type="submit" name="" value="增加图书类型"></div>

</form>
</table>
</div>

</body>
<script type="text/javascript" src="../../js/addBook1.js"></script>
</html>