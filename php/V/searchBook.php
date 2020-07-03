<?php
	include('../M/book.php');
	include('../C/manBook.php');
	include('../C/manPub.php');
	include('../C/manBookType.php');
	include('../C/manBookStatus.php');

	$manPub = new manPub();
	$manBookType = new manBookType();
	$manBookStatus = new manBookStatus();

	$manBook = new manBook();
	
	//var_dump(sizeof($rows));
	$content = $_POST['content'];
	
	$rows = $manBook->searchBooks($content);
	

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>管理图书</title>
	<link rel="stylesheet" type="text/css" href="../../css/searchBroBooks.css">
</head>
<body>
<!-- 要在这里获取相关的权限，如果权限不足，无法显示删除的操作 -->
<?php
	session_start();
	$identity = $_SESSION['identity'];
	// var_dump($identity);
?>
	
	<div class="ret"><a href="manHomePage.php">返回主页</a></div><br>
	<div class="ret1"><a href="showBooks.php">返回上一页</a></div>
	
	
	<div class="table">
	<br>
	<br>
	<table border="1">
	<tr>
		<th>图书名称</th>
		<th>ISBN</th>
		<th>出版社</th>
		<th>图书类型</th>
		<th>图书状态</th>
		<th>价格</th>
		<th>数量</th>
		<th>修改</th>		
		<th>删除</th>
	</tr>
	<?php
	

	foreach ($rows as $row) {
		?>
	<tr>
		<td><?php echo $row['bookName'];?></td>
		<td><?php echo $row['ISBN'];?></td>
		
	<td>

		<?php
		echo $row['pubHouse'];
		
		?>
		
		</td>

		<td>
		
			<?php
			echo $row['bookType'];
			
			 ?>
			
			</td>

		<td>
		
		<?php
		echo $row['bookStatus'];
		
		?>
		
			</td>

		<td><?php echo $row['bookPrice'],'￥';?></td>
		<td><?php echo $row['bookNum'];?></td>
		<td><a href="updBook.php?bookId=<?php echo $row['bookId'] ?>">修改</a></td>
		<td>
		<?php
		if(
			$identity == 1
			)

		{
			?>
		<a href="delReSult.php?bookId=<?php echo $row['bookId'] ?>">删除</a>
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