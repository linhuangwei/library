<?php
include('../C/manTheFine.php');
$manTheFine = new manTheFine();

$tId = $_GET['tId'];
var_dump($tId);

// var_dump($bookId,$bookName,$ISBN,$bookPrice,$pubHouse,$bookType,$bookPrice,$bookNum);


$result = $manTheFine->payTheFine($tId);
if($result){
	echo "<script>alert('缴纳成功！');
	window.location.href='showTheFines.php';
	</script>";
}else{
	echo "<script>alert('缴纳失败');window.location.href='showTheFines.php';</script>";
}






?>