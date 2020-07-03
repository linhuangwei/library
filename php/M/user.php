<?php
class User{
	public $broNum;
	public $usrPhone;
	public $userName;



	public function theUser($broNum,$userPhone,$userName){
		$this->broNum = $broNum;
		$this->userPhone = $userPhone;
		$this->userName = $userName;
		
	}
	
	public function getBroNum(){
		return $this->broNum;
	}

	
	public function getUserPhone(){
		return $this->userPhone;
	}

	public function getUserName(){
		return $this->userName;
	}

	

	
}
?>