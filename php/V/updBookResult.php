<?php
include('../C/manBook.php');
$manBook = new manBook();

$bookId = $_POST['bookId'];
$bookName = $_POST['bookName'];
$ISBN = $_POST['ISBN'];
$pubHouse = $_POST['pubHouse'];
$bookType = $_POST['bookType'];
$bookPrice = $_POST['bookPrice'];
$bookNum = $_POST['bookNum'];
$bookStatus = $_POST['bookStatus'];

// var_dump($bookId,$bookName,$ISBN,$bookPrice,$pubHouse,$bookType,$bookPrice,$bookNum);

if($bookName == null || $ISBN == null ||$bookPrice == null || $bookNum == null){
		echo "<script>alert('您的输入有误！');window.history.back();</script>";
}else{
	$result = $manBook->updBook($bookId,$bookName,$ISBN,$pubHouse,$bookType,$bookStatus,$bookPrice,$bookNum);
if($result){
	echo "<script>alert('修改成功！');
	window.location.href='showBooks.php';
	</script>";
}else{
	echo "<script>alert('修改失败');window.location.href='showBooks.php';</script>";
}

}




?>