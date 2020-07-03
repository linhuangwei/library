<?php
include('../M/user.php');
include('../C/manBroBook.php');
include('../C/manBook.php');


$user = new User();
$manBroBook = new manBroBook();
$manBook = new manBook();

$ISBN = $_POST['ISBN'];
$bookName = $_POST['bookName'];

session_start();
$user = $_SESSION['user'];

$userName = $user->getUserName();
$broNum = $user->getBroNum();

date_default_timezone_set('PRC');
$broTime = date('Y-m-d:H:i:s');

// var_dump($bookName,$ISBN,$userName,$broNum,$broTime);
//检查书库是否还有存书！！以防万一

$result2 = $manBook->isExsist($ISBN);
if($result2 != null){
//把借书记录存入到broBook中
$result1 = $manBroBook->addBroBook($bookName,$ISBN,$userName,$broNum,$broTime);

//把书本从book中扣除
$result = $manBook->delFromBook($ISBN);

if($result && $result1){
	echo "<script>
	alert('借阅成功');
	if(confirm( '继续借阅吗？ '))
  location.href='broBook.php';
  else location.href='manHomePage.php'; 
	</script>";
}else{
	echo "<script>
	alert('借阅失败');
	location.href='broBook.php';
	</script>";
}
}else{
	echo "<script>
	alert('书库已无藏书！');
	location.href='broBook.php';
	</script>";
}
?>