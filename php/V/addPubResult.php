<?php
include('../C/manPub.php');

$manPub = new manPub();
$sName = $_POST['pub'];
if($sName == null){
	echo "<script>
	alert('请输入正确的类型');
	window.history.back();
	</script>";
}else{
	$r = $manPub->addPub($sName);
	if($r)
	{
		echo "<script>
		alert('添加成功！');
		window.location.href='addPub.php';
		</script>";
	} else{
		echo "<script>
		alert('添加失败');
		window.location.href='addPub.php';
		</script>";
	}
}
// var_dump($bName);

?>
