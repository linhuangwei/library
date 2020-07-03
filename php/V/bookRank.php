<?php

	include('../C/manBroBook.php');

	
	$manBroBook = new manBroBook();
	

	$rows = $manBroBook->bookRank();
	//var_dump(sizeof($rows));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>查看读者借阅排名</title>
	<link rel="stylesheet" type="text/css" href="../../css/rank.css">
</head>
<body>
<!-- 要在这里获取相关的权限，如果权限不足，无法显示删除的操作 -->
<?php

?>

		<div class="ret"><a href="manHomePage.php">返回主页</a></div>
	<!-- 查看指定时间内的借阅历史 -->
	<P><B>若6月份则输入06，1号则输入01</B></P><br>
	<form action="bookRankByTime.php" method="POST">
	<div class="searchBarT">
	<input type="text" placeholder="起始年" name="bYear">
	<input type="text" placeholder="起始月" name="bMonth">
	<input type="text" placeholder="起始日" name="bDay">
	<B>至</B>
	<input type="text" placeholder="搜索年" name="eYear">
	<input type="text" placeholder="搜索月" name="eMonth">
	<input type="text" placeholder="搜索日" name="eDay">

	</div>

	<div class="searchBtnT"><input type="submit" name="" value="搜索"></div>
	</form>
	
	<div class="table">
	<br>
	<br>
	<table border="1">
	<tr>
		<th>次数</th>
		<th>书名</th>
	</tr>
	<?php
	

	foreach ($rows as $row) {
		?>
	<tr>
		<td><?php echo $row['count(*)'];?></td>
		<td><?php echo $row['bookName'];?></td>

	</tr>
		<?php
	}
	
	?>
	</table>
	</div>
</body>
</html>