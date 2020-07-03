<?php

class manBookType{
	//通过id查找出版社
	public function getBookTypeById($id){
		include('connect.php');
		$sql = "select * from bookType where bid = {$id};";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}
//获取所有的图书类型
	public function getAllBookType(){
		include('connect.php');
		$sql = "select * from bookType;";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}
	//增加图书类型
	public function addBookType($bName){
	include('connect.php');
		$sql = "insert into bookType(bName) values('{$bName}');";
		$result = $db->query($sql);
		return $result;;
	}
}

?>