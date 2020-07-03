<?php

class manBookStatus{
	//通过id查找出版社
	public function getBookStatusById($id){
		include('connect.php');
		$sql = "select * from bookStatus where staId = {$id};";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}

	//查找所有出版社
	public function getAllBookStatus(){
		include('connect.php');
		$sql = "select * from bookStatus;";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}

}

?>