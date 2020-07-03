<?php
include('../C/manPub.php');
include('../C/manBookType.php');

$manPub = new manPub();
$manBookType = new manBookType();
$rowps = $manPub->getAllPub();
$rowts = $manBookType->getAllBookType();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>增加书本</title>
	<link rel="stylesheet" type="text/css" href="../../css/addBook.css">
	</head>
<body>
<div class="table">
<table>
<div class="ret"><input type="button" name="" value="返回主页" id="ret"></div>
<form action="addBookResult.php" method="post">
<tr>
<td>输入图书名</td>
<td><input type="text" name="bookName"><br></td>
</tr>
<tr>
<td>输入ISBN</td>
<td><input type="text" name="ISBN"><br></td>
</tr>
<tr>
<td>输入出版社</td>
<td><input type="text" name="pubHouse"><br></td>
</tr>
<tr>
<td>选择图书类型</td>
<td><input type="text" name="bookType"><br></td>
</tr>
<tr>
<td>输入图书价格</td>
<td><input type="text" name="bookPrice"><br></td>
</tr>

<td>输入图书数量</td>
<td><input type="text" name="bookNum"><br></td>
</tr>

<div class="add"><input type="submit" name="" value="增加书本"></div>

</form>
</table>
</div>

</body>
<script type="text/javascript" src="../../js/addBook1.js"></script>
</html>