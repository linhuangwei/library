<?php
	session_Start();
	if($_SESSION['identity']==null){
		echo "<script> 
		window.location.href='login.html';
		</script>";
	}else{

	
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	<title>管理员界面</title>
	<link rel="stylesheet" type="text/css" href="../../css/manHomePage1.css">
    </head>
    <body>
    <div class="btn1"><button id="allBook">查看所有图书(修改/删除)</button><br></div>

	<div class="btn3"><button id="allUser">管理所有用户(修改/删除/增加)</button><br></div>

	<div class="btn6"><button id="myFine">罚款表</button><br></div>
	
	<div class="btn12"><button id="userRank">读者借阅排名</button><br></div>

	<div class="btn13"><button id="bookRank">书本借阅排名</button><br></div>

	<div class="btn2"><button id="addBook">增加图书</button><br></div>
	
	<div class="btn4"><button id="showManagers">增加管理员</button><br></div>
	
	<div class="btn8"><button id="addBookType" hidden="true">增加图书类型</button><br></div>

	<div class="btn9"><button id="addSchool" >增加学校</button><br></div>

	<div class="btn10"><button id="addPub" hidden="true">增加出版社</button><br></div>

	<div class="btn11"><button id="broBook">借书</button><br></div>

	<div class="btn7"><button id="theBro">借阅表(还书)</button><br></div>

	<div class="btn5"><button id="logOut">退出登录</button><br></div>
    </body>
	<script type="text/javascript" src="../../js/manHomePage.js"></script> 
</html>
<?php
}
?>