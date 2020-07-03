<?php
	include('../M/book.php');
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
	
	// echo $bTime;
	// echo $eTime;
	
	//获取时间段里面的借阅书本
	$rows = $manBroBook->getAllBroBookByTime($bTime,$eTime);
	//var_dump(sizeof($rows));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>查看已借阅的书本</title>
	<link rel="stylesheet" type="text/css" href="../../css/searchBroBooksByTime.css">
</head>
<body>
<?php
	
?>
	<form action="searchBroBooks.php" method="POST">
	<div class="ret"><a href="manHomePage.php">返回主页</a></div>
	<div class="ret1"><a href="showBroBooks.php">返回上一页</a></div>
	</form>
	
	<div class="table">
	<br>
	<br>
	<table border="1">
	<tr>
		<th>图书名称</th>
		<th>ISBN</th>
		<th>借阅者名字</th>
		<th>借书号</th>
		<th>借阅时间</th>
		<th>归还时间</th>
		<th>还书</th>		
		<th>挂失</th>
	</tr>
	<?php
	

	// foreach ($rows as $row) {
		for($i = count($rows)-1;$i>=0;$i--){
			$row = $rows[$i];
		?>
	<tr>
		<td><?php echo $row['bookName'];?></td>
		<td><?php 
		echo $row['ISBN'];
		
		?></td>
		
		<td><?php echo $row['userName'];?></td>

		<td><?php echo $row['broNum'];?></td>

		<td><?php echo $row['broTime'];?></td>
		<td><?php echo $row['retTime'];?></td>
		<td>
		<?php 
		if($row['retTime'] ==  null){
		?>
		<a href="retBook.php?bookId=<?php echo $row['id'] ?>&ISBN=
		<?php echo $row['ISBN'] ?>">还书</a></td>


		<td>
			<a href="lostBook.php?
		bookName=<?php echo $row['bookName'];?>
		&
		ISBN=<?php echo $row['ISBN'] ?>
		&
		bookId=<?php echo $row['id'] ;?>
		&
		broNum=<?php echo $row['broNum'];?>
		 ">挂失</a>
	
			<?php 
		}
			?>
			</td>

	</tr>
		<?php
	}
	
	?>
	</table>
	</div>
</body>
</html>

<?php }?>