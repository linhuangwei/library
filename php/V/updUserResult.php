<?php
include('../C/manUser.php');
$manUser = new manUser();

$broNum = $_POST['broNum'];
$userPhone = $_POST['userPhone'];
$userName = $_POST['userName'];
$school = $_POST['school'];
$sex = $_POST['sex'];
$homeAddress = $_POST['homeAddress'];

// var_dump($userName,$userPhone,$homeAddress,$broNum,$school,$sex);

// var_dump($bookId,$bookName,$ISBN,$bookPrice,$pubHouse,$bookType,$bookPrice,$bookNum);

if($userPhone == null || $userName == null ||$homeAddress == null ){
		echo "<script>alert('您的输入有误！');
		window.history.back();
		</script>";
}else{
	$result = $manUser->updUser($broNum,$userPhone,$userName,$school,$sex,$homeAddress);
	var_dump($result);
if($result){
	echo "<script>alert('修改成功！');
	window.location.href='showUsers.php';
	</script>";
}else{
	echo "<script>alert('修改失败');
	window.location.href='showUsers.php';
	</script>";
}

}




?>