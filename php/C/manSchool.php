<?php

class manSchool{
	//通过id查找学校
	public function getSchoolById($pubId){
		include('connect.php');
		$sql = "select * from school where schId = {$pubId};";
		$result = $db->query($sql);
		$rows = [];
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}
	//获取所有学校
	public function getAllSchool(){
		include('connect.php');
		$sql = "select * from school ;";
		$result = $db->query($sql);
		$rows = [];
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}

	//增加学校
	public function addSchool($sName){
	include('connect.php');
	$sql = "insert into school(schName) values('{$sName}') ;";
	$result = $db->query($sql);
	
	return $result;
	}
}

?>