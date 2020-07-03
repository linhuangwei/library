<?php

	include('../C/manTheFine.php');

	$manTheFine = new manTheFine();

	//获取所有的图书
	$rows = $manTheFine->getAllTheFine();
	//var_dump(sizeof($rows));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>查看罚款表</title>
	<link rel="stylesheet" type="text/css" href="../../css/theFine.css">
</head>
<body>
<?php
	
?>
	<form action="searchTheFines.php" method="POST">
	<div class="searchBar"><input type="text" placeholder="输入搜索的借书号" name="content"></div>
	<div class="searchBtn"><input type="submit" name="" value="搜索"></div>
	<div class="ret"><a href="manHomePage.php">返回主页</a></div>
	</form>
	
	<div class="table">
	<br>
	<br>
	<table border="1">
	<tr>
		<th>借书号(点击查看详情)</th>
		<th>书名</th>
		<th>罚款金额</th>
		<th>罚款时间</th>	
		<th>缴纳罚款</th>
	</tr>
	<?php
	

	// foreach ($rows as $row) {
		for($i=count($rows)-1;$i>=0;$i--){
			$row = $rows[$i];
		?>
	<tr>
		<td><a href ="getTheUser.php?broNum=<?php echo $row['broNum'];?>">
		<?php echo $row['broNum'];?></a></td>
		<td><?php 
		echo $row['bookName'];
		
		?></td>
		
		<td><?php echo $row['finePrice'];?></td>

		<td><?php echo $row['fineTime'];?></td>

	
		<td><a href="payTheFine.php?
		tId=<?php echo $row['tId'];?>
	
		 ">缴纳罚款</a></td>
	
			<?php 
		}
			?>

	</tr>
		<?php
	
	
	?>
	</table>
	</div>
</body>
</html>