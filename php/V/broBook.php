<?php
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>借书</title>
	<link rel="stylesheet" type="text/css" href="../../css/broBook.css">

	</head>
<body>
<div class="table">
<table>
<div class="ret"><input type="button" name="" value="返回" id="ret"></div>

<form action="broBookResult.php" method="post">
<tr>
<td>输入借书号</td>
<td><input type="text" name="broNum">
<br></td>
</tr>
<tr>
<td>书名</td>
<td><input type="text" name="bookName">
<br></td>
</tr>

<div class="bro"><input type="submit" name="" value="借阅"></div>

</form>
</table>
</div>
</body>
<script type="text/javascript" src="../../js/addBook1.js"></script>
</html>