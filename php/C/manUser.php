<?php

class manUser{
	//验证登录用户
	public function searchLogin($phone,$password){
		include('connect.php');
		$sql = "select * from manage where phone = {$phone} and password = {$password};";
		$result = $db->query($sql);

		$rows = [];
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$rows[] = $row;
		}
		return $rows;
	}
	//获取所有用户
	public function getAllUser(){
		include('connect.php');
		$sql = "select * from user;";
		$result = $db->query($sql);
		$row = [];
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$rows[] = $row;
		}
		return $rows;
	}
	//删除用户
	public function delUser($broNum){
		include('connect.php');
		$sql = "delete from user where broNum = '{$broNum}';";
		$result = $db->query($sql);
		return $result;
	}

	//增加用户
	public function addUser($broNum,$userPhone,$userName,$school,
	$sex,$homeAddress){
		include('connect.php');
		$sql = "insert into user values ('{$broNum}','{$userPhone}',
		'{$userName}','{$school}','{$sex}','{$homeAddress}');";
		$result = $db->query($sql);
		return $result;
	}

	//通过借书号查阅用户
	public function getUserByBroNum($broNum){
		include('connect.php');
		$sql = "select *from user where broNum ='{$broNum}';";
		$result = $db->query($sql);
		$rows = [];
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$rows[] = $row;
		}
		return $rows;
	}
	// 更改用户
	public function updUser($broNum,$userPhone,$userName,$school,$sex,$homeAddress){
		include('connect.php');
		$sql = "update user set userPhone = '{$userPhone}',
		userName='{$userName}',
		school='{$school}',
		sex='{$sex}',
		homeAddress='{$homeAddress}'
		where 
		broNum = '{$broNum}';";
		$result = $db->query($sql);
		return $result;
	}
}

?>