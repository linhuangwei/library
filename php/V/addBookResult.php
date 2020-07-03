<?php
include('../C/manBook.php');
$manBook = new manBook();

$bookName = $_POST['bookName'];
$ISBN = $_POST['ISBN'];
$pubHouse = $_POST['pubHouse'];
$bookType = $_POST['bookType'];
$bookPrice = $_POST['bookPrice'];
$bookNum = $_POST['bookNum'];

// var_dump($bookName,$ISBN,$pubHouse,$bookType
// ,$bookNum,$bookPrice);

if($bookName == null || $ISBN == null || 
$bookNum == null || $bookPrice == null){
		echo "<script>alert('请输入完整内容！');
		window.location.href='addBook.php';</script>";
}
else{
	$r = $manBook->getBookPriceByISBN($ISBN);
	if($r != null){
		echo "<script>alert('书库中已经存在相同的ISBN号，请检查！！！');
		window.history.back();</script>";
	}else{

	
	$result = $manBook->addBook($bookName,
	$ISBN,$pubHouse,$bookType,1,$bookPrice ,$bookNum);
	
		if($result){
			echo "<script>alert('增加成功！');
			window.location.href='addBook.php';</script>";
		}else{
			echo "<script>alert('增加失败');
			window.location.href='addBook.php';
			</script>";
		}

}}




?>