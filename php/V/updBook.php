<?php
	include('../C/manBook.php');
	include('../C/manPub.php');
	include('../C/manBookType.php');
	
	
	$manBook =  new manBook();
	$manPub = new manPub();
	$manBookType = new manBookType();

	$bookId = $_GET['bookId'];
	$rows = $manBook->getBookById($bookId);
	//获取所有出版社
	$rowps = $manPub->getAllPub();
	// var_dump($bookId);
	//获取所有的图书类型
	$rowts = $manBookType->getAllBookType();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>修改图书</title>
	<link rel="stylesheet" type="text/css" href="../../css/updBook.css">
</head>
<body>
<div class="ret"><input type="button" name="" value="返回" id="ret"></div>
<div class="table">
<table >
<form action="updBookResult.php" method="post">
<?php
foreach ($rows as $row) {
?>

<input type="text" name="bookId" hidden="true" value="<?php echo $bookId;?>">
<tr>
<td>输入图书名</td>
<td><input type="text" name="bookName" value="<?php echo $row['bookName'];?>"><br></td>
</tr>
<tr>
<td>输入ISNBN</td>
<td><input type="text" name="ISBN" value="<?php echo $row['ISBN'];?>"><br></td>
</tr>
<tr>
<td>请选择出版社</td>
<td>
<input type="text" name="pubHouse" value="<?php echo $row['pubHouse'];?>"><br></td>
</tr>
<tr>
<td>选择图书类型</td>
<td>
<input type="text" name="bookType" value="<?php echo $row['bookType'];?>"><br></td>
</tr>
<tr>
<td>请选择图书状态</td>
<td>
<input type="text" name="bookStatus" value="<?php echo $row['bookStatus'];?>"><br></td>
</tr>
<tr>
<td>输入价格</td>
<td><input type="text" name="bookPrice" value="<?php echo $row['bookPrice'];?>"><br></td>
</tr>
<tr>
<td>输入图书数量</td>
<td>
<input type="text" name="bookNum" value="<?php echo $row['bookNum'];?>"><br></td>
</tr>

<div class="upd"><input type="submit" name="" value="确认修改"></div>
<?php
}
?>
</form>
</table></div>
</body>
<script type="text/javascript" src="../../js/updBook.js"></script>
</html>