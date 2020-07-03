<?php
include('../C/manBook.php');
$manBook = new manBook();
	session_start();
	$bookId = $_SESSION['bookId'] ;
$result = $manBook->delBook($bookId);
if($result){
	echo "<script>alert('删除成功！');window.location.href='showBooks.php';</script>";
}else{
	echo "<script>alert('删除失败！');window.location.href='showBooks.php';</script>";
}

?>