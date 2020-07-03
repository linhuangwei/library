<?php
include('../C/manUser.php');
$broNum = $_GET['broNum'];
$manUser = new manUser();

$result = $manUser->delUser($broNum);
if($result){
	echo "<script>alert('删除成功！');window.location.href='showUsers.php';</script>";
}else{
	echo "<script>alert('删除失败！');window.location.href='showUsers.php';</script>";
}

?>