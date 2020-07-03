<?php
include('../C/manBook.php');
include('../C/manBroBook.php');
$manBook = new manBook();
$manBroBook = new manBroBook();
	session_start();
	$id = $_SESSION['id'] ;
	$ISBN = $_SESSION['ISBN'] ;
	//还书的话，在借阅表填上借阅时间，然后数据存入书库
	date_default_timezone_set('PRC');
	$retTime = date('Y-m-d:H:i:s');
	// echo $ISBN;
	$result1 = $manBook->retBook($ISBN);
	$result = $manBroBook->retBroBook($id,$retTime);

	


if($result && $result1){
	echo "<script>alert('还书成功！');window.location.href='showBroBooks.php';</script>";
}else{
	echo "<script>alert('还书失败！');window.location.href='showBroBooks.php';</script>";
}

?>