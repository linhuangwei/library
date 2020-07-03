<?php
	include('../M/book.php');
	include('../C/manBook.php');
	include('../C/manPub.php');
	include('../C/manBookType.php');
	include('../C/manBookStatus.php');
	include('../C/manBroBook.php');

	$manPub = new manPub();
	$manBookType = new manBookType();
	$manBookStatus = new manBookStatus();

	$manBook = new manBook();
	$manBroBook = new manBroBook();
	
	//检索所有图书，是否存在0本
	$manBook->setBook();
	
	$manBook->setBook1();

	$rows = $manBook->allBooks();

	$rowOuts = $manBroBook->getBroBookOut();
	$rowLosts = $manBroBook->getLostBook();
	//var_dump(sizeof($rows));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>管理图书</title>
	<link rel="stylesheet" type="text/css" href="../../css/showBooks.css">
</head>
<body>
<!-- 要在这里获取相关的权限，如果权限不足，无法显示删除的操作 -->
<?php
	session_start();
	$identity = $_SESSION['identity'];
	// var_dump($identity);
?>
	<form action="searchBook.php" method="POST">
	<div class="searchBar"><input type="text" placeholder="输入搜索的书本名" name="content"></div>
	<div class="searchBtn"><input type="submit" name="" value="搜索"></div>
	<div class="ret"><a href="manHomePage.php">返回主页</a></div>
	</form>
	
	<!-- 在这里显示所有书本，借阅书本，丢失书本 -->
	<?php
	$book1 = 0;
	// $book1是未借阅的书本
	foreach($rows as $row1){
		$book1 = $book1 + $row1['bookNum'];
	}
	$book2 = 0;
	foreach($rowOuts as $row2){
		$book2 = $book2 + 1;
	}
	$book3 = 0;
	foreach($rowLosts as $row3){
		$book3 = $book3 + 1;
	}

	// <!-- 通过页码查询书本 -->
	$pageSize = 50;   //每页显示的数量
	$rowCount = 0;   //要从数据库中获取
	$pageNow = 1;    //当前显示第几页
	$rowns = $manBook->getBookNum();
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

	
	$res2 = $manBook->getAllBooks($pre,$pageSize);
	 
	//$sql = "select * from user";
	//$res = mysql_query($sql,$con);
	$rows = [];
	while($r2 = $res2->fetch_array(MYSQLI_ASSOC)){
	  $rows[] = $r2;
	}
	?>
	
	<div class="go">
	<?php
	if($pageNow>1){
		$prePage = $pageNow-1;
		echo "<a href='showBooks.php?pageNow=$prePage'>上一页</a>&nbsp;";
	  }
	  if($pageNow<$pageCount){
		$nextPage = $pageNow+1;
		echo "<a href='showBooks.php?pageNow=$nextPage'>下一页</a>&nbsp;";
		echo "当前第{$pageNow}页/共{$pageCount}页";
	  }

	?>
	</div><br>
	 <form action="showBooks.php">
    <div class="goBar">
	<input type="text" name="pageNow" placeholder="输入页数">
    </div>
	<div class="goBtn">
	<input type="submit" value="GO">
	</div>
  </form>

	<P><B>书屋共有书本：<?php echo $book1+$book2?>本书,借阅在外:<?php echo $book2?>本书,丢失了<?php echo $book3?>本书</B></P>
	
	
	
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
	

	// foreach ($rows as $row) {

	for($i=count($rows)-1;$i>=0;$i--)
	{
		$row = $rows[$i];
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