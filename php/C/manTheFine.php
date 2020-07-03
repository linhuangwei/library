<?php

class manTheFine{
	//写入罚款
	public function setTheFine($broNum,$bookName,$finePrice,$fineTime){
		include('connect.php');
		$sql = "insert into theFine(broNum,bookName,finePrice,fineTime) 
		values('{$broNum}','{$bookName}',
		'{$finePrice}','{$fineTime}');";
		$result = $db->query($sql);
		
		return $result;
	}

	//获取罚款列表
	public function getAllTheFine(){
		include('connect.php');
		$sql = "select * from theFine;";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}

	//缴纳罚款
	public function payTheFine($tId){
		include('connect.php');
		$sql = "delete from theFine where tId = '{$tId}';";
		$result = $db->query($sql);
		
		return $result;
	}

	//模糊查询
	public function getTheFineByBroNum($broNum){
		include('connect.php');
		$sql = "select * from theFine where broNum like '%{$broNum}%' ;";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}
	
}

?>