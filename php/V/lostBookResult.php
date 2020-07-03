<?php
include('../C/manTheFine.php');
include('../C/manBroBook.php');
include('../C/manBook.php');

$manTheFine = new manTheFine();
$manBroBook = new manBroBook();
$manBook = new manBook();

	session_start();
	$id = $_SESSION['id'] ;
	$broNum = $_SESSION['broNum'] ;
	$bookName = $_SESSION['bookName'];
	$ISBN = $_SESSION['ISBN'];
	//挂失的话，在借阅表填上 丢失 ，然后数据存入罚款表
	date_default_timezone_set('PRC');
	$fineTime = date('Y-m-d:H:i:s');
	$rowps = $manBook->getBookPriceByISBN($ISBN);
	foreach($rowps as $rowp){
		$price = $rowp['bookPrice'];
	}
	$retTime = "丢失";
	$result = $manBroBook->retBroBook($id,$retTime);
	$result1 = $manTheFine->setTheFine($broNum,$bookName,$price,$fineTime);
	// var_dump($broNum,$bookName,$price,$fineTime);
	

if($result && $result1){
	echo "<script>alert('挂失成功');window.location.href='showBroBooks.php';</script>";
}else{
	echo "<script>alert('挂失失败！');window.location.href='showBroBooks.php';</script>";
}

?>