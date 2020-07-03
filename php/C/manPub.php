<?php

class manPub{
	//通过id查找出版社
	public function getPubById($pubId){
		include('connect.php');
		$sql = "select * from pubHouse where pubId = {$pubId};";
		$result = $db->query($sql);
		$rows = [];
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}
	//获取所有出版社
	public function getAllPub(){
		include('connect.php');
		$sql = "select * from pubHouse ;";
		$result = $db->query($sql);
		$rows = [];
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}

	//增加出版社
	public function addPub($pubName){
		include('connect.php');
		$sql = "insert into pubHouse(pubName) values('{$pubName}');";
		$result = $db->query($sql);
		return $result;
	}

}

?>