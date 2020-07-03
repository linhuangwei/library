<?php

class manBook{
	//查找所有图书
	public function allBooks(){
		include('connect.php');
		$sql = "select * from book;";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}
	//获取书本数量
	public function getBookNum(){
		include('connect.php');
		$sql = "select count(*) from book;";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}
	//通过页码数查找所有图书
	public function getAllBooks($pre,$pageSize){
		include('connect.php');
		$sql = "select * from book limit $pre,$pageSize";
		$result = $db->query($sql);
		return $result;
	}
	//通过id查找图书
	public function getBookById($id){
		include('connect.php');
		$sql = "select * from book where bookId = {$id};";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}
	//修改图书
	public function updBook($bookId,$bookName,$ISBN,$pubHouse,
	$bookType,$bookStatus,$bookPrice,$bookNum){
		include('connect.php');
		$sql = "update book set bookName = 
		'{$bookName}',ISBN='{$ISBN}',
		pubHouse='{$pubHouse}',bookType='{$bookType}',bookStatus='{$bookStatus}',
		bookPrice='{$bookPrice}',bookNum ='{$bookNum}'
		 where bookId = {$bookId};";
		 $result = $db->query($sql);
		 return $result;
	}
	//删除图书
	public function delBook($bookId){
		include('connect.php');
		$sql = "delete from book where bookId = '{$bookId}';";
		$result = $db->query($sql);
		return $result;
	}

	//增加图书
	public function addBook($bookName,
	$ISBN,$pubHouse,$bookType,$bookStatus,$bookPrice ,$bookNum){
		include('connect.php');
		$sql = "insert into book(bookName,ISBN,pubHouse,bookType,
		bookStatus,bookPrice,bookNum) 
		values('{$bookName}','{$ISBN}','{$pubHouse}','{$bookType}',
		'{$bookStatus}','{$bookPrice}','{$bookNum}');";
		$result = $db->query($sql);
		return $result;
	}

	//监测数据库是否存在书本
	public function checkBook($bookName){
		include('connect.php');
		$sql = "select * from book where bookName = '{$bookName}';";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}
	//利用书名寻找本书不为0的ISBN
	public function checkBook1($bookName){
		include('connect.php');
		$sql = "select * from book where bookName = '{$bookName}' and bookNum != '0';";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}
	//通过ISBN去借阅书本，在book减去一本书
	public function delFromBook($ISBN){
		include('connect.php');
		$sql = "update book 
		set bookNum = bookNum - 1 
		where ISBN = '{$ISBN}';";
		$result = $db->query($sql);
		return $result;
	}

	//通过isbn还书
	public function retBook($ISBN){
		include('connect.php');
		$sql = "update book set bookNum = bookNum + 1 where ISBN = '{$ISBN}';";
		$result = $db->query($sql);
		return $result;
	}

	//通过ISBN获取书本价格
	public function getBookPriceByISBN($ISBN){
		include('connect.php');
		$sql = "select * from book where ISBN = '{$ISBN}';";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}
	//模糊查询书本
	public function searchBooks($content){
		include('connect.php');
		$sql = "select * from book where bookName like '%{$content}%';";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}

	//检查是否有存书
	public function isExsist($ISBN){
		include('connect.php');
		$sql = "select * from book where ISBN = '{$ISBN}' and bookNum > 0;";
		$result = $db->query($sql);
		$rows = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}
	//改变图书状态
	public function setBook(){
		include('connect.php');
		$sql = "update book set bookStatus = '已借阅' where bookNum = '0';";
		$result = $db->query($sql);
		return $result;
	}
	//改变图书状态
	public function setBook1(){
		include('connect.php');
		$sql = " update book set bookStatus = '在库' where bookNum > '0';";
		$result = $db->query($sql);
		return $result;
	}
	

	}
?>