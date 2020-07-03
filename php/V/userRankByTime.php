<?php

	include('../C/manBroBook.php');

	
	$manBroBook = new manBroBook();
	
	$bYear = $_POST['bYear'];
	$bMonth = $_POST['bMonth'];
	$bDay = $_POST['bDay'];
	$eYear = $_POST['eYear'];
	$eMonth = $_POST['eMonth'];
	$eDay = $_POST['eDay'];
	if($bYear == null || $bMonth == null || $bDay == null ||
	$eYear == null || $eMonth == null || $eDay == null){
		echo "<script>alert('查询时间不能为空');
		window.history.back();
		</script>";
	}else{
	$bTime = $bYear.'-'.$bMonth.'-'.$bDay.':00:00:00';
	$eTime = $eYear.'-'.$eMonth.'-'.$eDay.':24:00:00';

	$rows = $manBroBook->userRankByTime($bTime,$eTime);
	//var_dump(sizeof($rows));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>管理图书</title>
	<link rel="stylesheet" type="text/css" href="../../css/rank.css">
</head>
<body>
<!-- 要在这里获取相关的权限，如果权限不足，无法显示删除的操作 -->
<?php

?>

		<div class="ret"><a href="manHomePage.php">返回主页</a></div>

	
	
	<div class="table">
	<br>
	<br>
	<table border="1">
	<tr>
		<th>次数</th>
		<th>借书号</th>
	</tr>
	<?php
	

	foreach ($rows as $row) {
		?>
	<tr>
		<td><?php echo $row['count(*)'];?></td>
		<td><?php echo $row['broNum'];?></td>

	</tr>
		<?php
	}
	
	?>
	</table>
	</div>
</body>
</html>
<?php }?>