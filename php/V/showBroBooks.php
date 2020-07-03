<?php
	include('../M/book.php');
	include('../C/manBroBook.php');

	$manBroBook = new manBroBook();

	//获取所有的图书
	$rows = $manBroBook->getAllBroBook();
	//var_dump(sizeof($rows));


	
	// <!-- 通过页码查询书本 -->
	$pageSize = 60;   //每页显示的数量
	$rowCount = 0;   //要从数据库中获取
	$pageNow = 1;    //当前显示第几页
	$rowns = $manBroBook->getBroBookNum();
	foreach($rowns as $r){
		$rowCount = $r['count(*)'];
	}
	//计算共有多少页，ceil取进1
	$pageCount = ceil(($rowCount/$pageSize));
	$pageNow = $pageCount;
	// $rowCount = $book1+$book2;
	//如果有pageNow就使用，没有就默认第一页。
	if (!empty($_GET['pageNow'])){
		$pageNow = $_GET['pageNow'];
	  }

	  
	//使用sql语句时，注意有些变量应取出赋值。
	$pre = ($pageNow-1)*$pageSize;

	
	$res2 = $manBroBook->getBroBooks($pre,$pageSize);
	 
	//$sql = "select * from user";
	//$res = mysql_query($sql,$con);
	$rows = [];
	while($r2 = $res2->fetch_array(MYSQLI_ASSOC)){
	  $rows[] = $r2;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>查看已借阅的书本</title>
	<link rel="stylesheet" type="text/css" href="../../css/showBroBooks.css">
</head>
<body>
<?php
	
?>
	<form action="searchBroBooks.php" method="POST">
	<div class="searchBar"><input type="text" placeholder="输入搜索的借书号" name="content"></div>
	<div class="searchBtn"><input type="submit" name="" value="搜索"></div>
	<div class="ret"><a href="manHomePage.php">返回主页</a></div>
	<div class="ret1"><a href="searchBroBooksOut.php">查看未归还</a></div>
	</form>
<!-- 查看指定时间内的借阅历史 -->
	<P><B>若6月份则输入06，1号则输入01</B></P><br>
	<form action="searchBroBooksByTime.php" method="POST">
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