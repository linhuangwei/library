<?php
$localhost = '127.0.0.1';
$user = 'root';
$pwd = '123456';
$dbName = 'sanyou';

// 连接数据库
$db = new mysqli($localhost,$user,$pwd,$dbName);

if($db->connect_errno <> 0){
	echo "连接数据库失败,",$db->connect_error;
}else{
	// echo "连接成功","<br>";
	$sql = "SET NAMES UTF8;";
	$db->query($sql);
}

?>