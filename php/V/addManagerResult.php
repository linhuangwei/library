<?php
include('../C/manMan.php');

$phone = $_POST['phone'];
$password = $_POST['password'];
$password1 = $_POST['password1'];

// var_dump($phone,$password);


if($phone == null || $password == null ){
	echo "<script>
	alert('输入的内容不可以为空');
	window.history.back();
	</script>";
}else{
	if($password != $password1){
	echo "<script>
	alert('两次输入的密码不匹配');
	window.history.back();
	</script>";
	}else{
		$manMan = new manMan();
		$result = $manMan->addManager($phone,$password);
		// var_dump($result);
		if($result){
			echo "<script>alert('增加成功');
			window.location.href='showManagers.php';</script>";
		}else{
			echo "<script>alert('增加失败，该手机号码已经被注册过');
			window.history.back();</script>";
		}
	}
}

?>