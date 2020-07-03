<?php

class manMan{
	//验证登录用户
	public function searchLogin($phone,$password){
		include('connect.php');
		// $sql = "select * from manage where phone = ".$phone." and password = {$password};";
		$sql = "select * from manage where phone = '".$phone."' and password = '".$password."';";
		$result = $db->query($sql);

		$row = [];
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$rows[] = $row;
		}
		return $rows;
	}

	//获取所有管理者
	public function getAllManager(){
		include('connect.php');
		$sql = "select * from manage;";
		$result = $db->query($sql);

		$row = [];
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$rows[] = $row;
		}
		return $rows;
	}

	//增加管理者
	public function addManager($phone,$password){
		include('connect.php');
		$sql = "insert into manage values (
			'{$phone}','{$password}','2'
		);";
		$result = $db->query($sql);
		return $result;
	}

	//删除管理者
	public function delMan($phone){
		include('connect.php');
		$sql = "delete from manage where phone = {$phone};";
		$result = $db->query($sql);
		return $result;
	}
}

?>