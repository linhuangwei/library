<?php
include('../C/manUser.php');

$userPhone = $_POST['userPhone'];
$userName = $_POST['userName'];
$broNum = $_POST['broNum'];
$school = $_POST['school'];
$sex = $_POST['sex'];
$homeAddress = $_POST['homeAddress'];

if($userPhone == null || $userName == null || $broNum == null || 
$school == null || $sex == null || $homeAddress == null){
	echo "<script>
	alert('输入的内容不可以为空');
	window.history.back();
	</script>";
}else{

		$manUser = new manUser();
		$result = $manUser->addUser($broNum,$userPhone,$userName,$school,
		$sex,$homeAddress);
		if($result){
			echo "<script>alert('注册成功');
			window.location.href='showUsers.php';</script>";
		}else{
			echo "<script>alert('注册失败，可能该借书号已注册过');
			window.history.back();</script>";
		}
	
}

?>