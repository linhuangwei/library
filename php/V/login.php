<?php
include('../C/manMan.php');
include('../M/man.php');
//从登录界面获取数据
$phone = $_POST['phone'];
$password = $_POST['password'];

$manMan = new manMan();
$man = new Man();

if($phone == null || $password == null){
	echo "<script>
	alert('账号密码不能为空');
	window.location.href='login.html';
	</script>";
}else{
	echo $phone;
	$rows = $manMan->searchLogin($phone,$password);
	if($rows == null){
			echo "<script>alert('账号或密码错误!');window.location.href='login.html';</script>";
		
		}else{
			// var_dump("登陆成功");
			// 将管理员信息存储到man
			foreach ($rows as $row) {
				$identity = $row['identity'];
				$man->theMan($row['phone'],$row['password'],$row['identity']);
				session_start();
				$_SESSION['identity'] = $identity;
				header('location:manHomePage.php');
			}

			
		}
}




?>