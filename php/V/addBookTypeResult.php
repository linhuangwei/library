<?php
include('../C/manBookType.php');

$manBookType = new manBookType();
$bName = $_POST['bookType'];
if($bName == null){
	echo "<script>
	alert('请输入正确的类型');
	window.history.back();
	</script>";
}else{
	$r = $manBookType->addBookType($bName);
	if($r)
	{
		echo "<script>
		alert('添加成功！');
		window.location.href='addBookType.php';
		</script>";
	} else{
		echo "<script>
		alert('添加失败');
		window.location.href='addBookType.php';
		</script>";
	}	}

// var_dump($bName);

?>
