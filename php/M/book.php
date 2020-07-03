<?php
class Book{
	public $bookName;
	public $ISBN;
	public $pubHouse;
	public $bookType;
	public $bookStatus;
	public $bookPrice;
	public $bookNum;
	//采用魔术函数
	public function myBook($bookName,$ISBN,$pubHouse,$bookType,$bookStatus,$bookPrice,$bookNum){
		$this->bookName = $bookName;
		$this->ISBN = $ISBN;
		$this->pubHouse = $pubHouse;
		$this->bookType = $bookType;
		$this->bookStatus = $bookStatus;
		$this->bookNum = $bookNum; 
		$this->bookPrice = $bookPrice;
	}
	public function getBookName(){
		return $this->bookName;
	}
	public function getISBN(){
		return $this->ISBN;
	}
	public function getPubHouse(){
		return $this->pubHouse;
	}
	public function getbookType(){
		return $this->bookType;
	}
	public function getBookStatus(){
		return $this->bookStatus;
	}
	public function getBookNum(){
		return $this->bookNum;
	}
	public function getbookPrice(){
		return $this->bookPrice;
	}

}
?>