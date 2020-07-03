<?php
	include('../M/book.php');
	include('../C/manBroBook.php');

	$manBroBook = new manBroBook();
	$broNum = $_POST['content'];
	//获取所有的图书
	$rows = $manBroBook->getBroBookByBroNum($broNum);
	//var_dump(sizeof($rows));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>查看已借阅的书本</title>
	<link rel="stylesheet" type="text/css" href="../../css/searchBroBooks.css">
</head>
<body>
<?php
	
?>	
		<div class="ret"><a href="manHomePage.php">返回主页</a></div><br>
		<!-- <div class="ret"><a href="showBroBooks.php">返回上一页</a></div> -->
		<div class="ret1"><a href="searchBroBooksOut1.php?broNum=<?php echo $broNum?>">查看未归还</a></div>

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
		for($i = count($rows)-1; $i >= 0 ; $i--){
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

		<?php 
		if($row['retTime'] ==  null){
		?>
		<td><a href="retBook.php?bookId=<?php echo $row['id'] ?>&ISBN=
		=<?php echo $row['ISBN'] ?>">还书</a></td>


		<td><a href="lostBook.php?
		bookName=<?php echo $row['bookName'];?>
		&
		ISBN=<?php echo $row['ISBN'] ?>
		&
		bookId=<?php echo $row['id'] ;?>
		&
		broNum=<?php echo $row['broNum'];?>
		 ">挂失</a></td>
	
			<?php 
		}
			?>

	</tr>
		<?php
	}
	
	?>
	</table>
	</div>
</body>
</html>