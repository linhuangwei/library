<?php
include('../C/manBook.php');
include('../C/manUser.php');
include('../M/user.php');

$manBook = new manBook();
$manUser = new manUser();
$user = new User();

$broNum = $_POST['broNum'];
$bookName = $_POST['bookName'];

// var_dump($bookName);

if($broNum == null || $bookName == null)
	echo "<script>alert('请输入借书号和书名');
	window.history.back();</script>";

$rowus = $manUser->getUserByBroNum($broNum);

// var_dump($rowus);
if($rowus == null){
	echo "<script>
	alert('不存在此用户！');
	window.history.back();
	</script>";
}else{
	$rowbs = $manBook->checkBook1($bookName);
	if($rowbs == null){
		echo "<script>
		alert('不存在这本书！');
		window.history.back();
		</script>";
	}
	else{
	foreach($rowus as $rowu){
		$userName = $rowu['userName'];
		$userPhone = $rowu['userPhone'];
	}
	// var_dump($userName);
	// var_dump($userPhone);
	$user->theUser($broNum,$userPhone,$userName);
	session_start();
	$_SESSION['user'] = $user;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>借书详情</title>
	<link rel="stylesheet" type="text/css" href="../../css/broBookResult.css">

</head>
<body>
<!-- <div class="ret"><a href="window.history.back()";>返回</a></div><br> -->
	<form action = "broBookResult1.php" method="POST">
	<div class="table">
	<table border="5">

		<tr>
		<td>书名</td>
		<td><input type = "text" value = "<?php echo $bookName; ?>" name ="bookName"/></td>
		</tr>
		<tr>
		<td>请选择ISBN</td>
		<td>
		<select name = "ISBN">
		<?php
	foreach($rowbs as $rowb){
		?>
		<option value = "<?php echo $rowb['ISBN'];?>"><?php echo $rowb['ISBN'];?></option>
		<?php
	}
	?>
		</select>
		</td>
		</tr>
	
	</table>
	<div class = "bro"><input type = "submit" value = "提交"/></div>
	</form>
	</div>
</body>
</html>
<?php 	}
}
?>