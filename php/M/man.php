<?php
class Man{
	public $phone;
	public $password;
	public $identity;

	public function theMan($phone,$password,$identity){
		$this->phone = $phone;
		$this->password = $password;
		$this->identity = $identity;
		
	}
	public function setPhone($phone){
		$this->phone = $phone;
	}
	public function getPhone(){
		return $this->phone;
	}

	public function setPassword($password){
		$this->password = $password;
	}
	public function getPassword(){
		return $this->password;
	}

	public function setIdentity($identity){
		$this->identity = $identity;
	}
	public function getIdentity(){
		return $this->identity;
	}

	

	
}
?>