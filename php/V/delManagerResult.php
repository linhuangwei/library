<?php
include('../C/manMan.php');
$phone = $_GET['phone'];
$manMan = new manMan();

$result = $manMan->delMan($phone);
if($result){
	echo "<script>alert('删除成功！');window.location.href='showManagers.php';</script>";
}else{
	echo "<script>alert('删除失败！');window.location.href='showManagers.php';</script>";
}

?>