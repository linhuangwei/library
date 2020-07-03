<?php

class manBroBook{
	//增加借阅
	public function addBroBook($bookName,$ISBN,$userName,$broNum,$broTime){
		include('connect.php');
		$sql = "insert into broBook(bookName,ISBN,userName,broNum,broTime)
		 values('{$bookName}','{$ISBN}','{$userName}','{$broNum}',
		 '{$broTime}');";
		 $result = $db->query($sql);
		 return $result;
	}
	//获取所有已被借阅的书
	public function getAllBroBook(){
		include('connect.php');
		$sql = "select * from broBook;";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}

		//获取书本数量
		public function getBroBookNum(){
			include('connect.php');
			$sql = "select count(*) from broBook;";
			$result = $db->query($sql);
			$rows = [];
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$rows[] = $row;
			}
			return $rows;
		}

		//通过页码数查找所有图书
	public function getBroBooks($pre,$pageSize){
		include('connect.php');
		$sql = "select * from brobook limit $pre,$pageSize";
		$result = $db->query($sql);
		return $result;
	}


	//通过时间范围内获取所有已被借阅的书
	public function getAllBroBookByTime($bTime,$eTime){
		include('connect.php');
		$sql = "select * from broBook where broTime > '{$bTime}' and broTime < '{$eTime}';";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}

	//归还图书，通过id写入归还时间,丢失图书的时候，把归还时间写为丢失
	public function retBroBook($id,$retTime){
		include('connect.php');
		$sql = "update broBook set retTime = '{$retTime}'
		where id = '{$id}';";
		 $result = $db->query($sql);
		 return $result;
	}

	//模糊查询
	public function getBroBookByBroNum($broNum){
		include('connect.php');
		$sql = "select * from broBook where broNum like '%{$broNum}%';";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;

	}

	//查询未归还的书本
	public function getBroBookOut(){
		include('connect.php');
		$sql = "select * from broBook where retTime is null;";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}
	//查询未归还的书本，通过broNum
	public function getBroBookOut1($broNum){
		include('connect.php');
		$sql = "select * from broBook where broNum like '%{$broNum}%' and retTime is null;";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}
	//借阅排名
	public function userRank(){
		include('connect.php');
		$sql = "select distinct count(*),broNum as broNum from
		 broBook group by broNum order by count(*) desc;";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}

	//通过时间查询借阅排名
	public function userRankByTime($bTime,$eTime){
		include('connect.php');
		$sql = "select distinct count(*),broNum as broNum from
		 broBook where broTime >= '{$bTime}' and broTime <= '{$eTime}'
		 group by broNum order by count(*) desc;";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}
	//书本排名
	public function bookRank(){
		include('connect.php');
		$sql = "select distinct count(*),bookName as bookName from
		 broBook group by bookName order by count(*) desc;";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}

	//书本排名
	public function bookRankByTime($bTime,$eTime){
		include('connect.php');
		$sql = "select distinct count(*),bookName as bookName from
		 broBook where broTime >= '{$bTime}' and broTime <= '{$eTime}' group by bookName order by count(*) desc;";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}

	//查询丢失的书本
	public function getLostBook(){
		include('connect.php');
		$sql = "select * from broBook where retTime = '丢失';";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}

}

?>