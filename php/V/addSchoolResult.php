<?php
include('../C/manSchool.php');

$manSchool = new manSchool();
$sName = $_POST['school'];
if($sName == null){
	echo "<script>
	alert('请输入正确的类型');
	window.history.back();
	</script>";
}else{
	$r = $manSchool->addSchool($sName);
	if($r)
	{
		echo "<script>
		alert('添加成功！');
		window.location.href='addSchool.php';
		</script>";
	} else{
		echo "<script>
		alert('添加失败');
		window.location.href='addSchool.php';
		</script>";
	}
}
// var_dump($bName);

?>
