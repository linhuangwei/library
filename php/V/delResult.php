<?php
	$bookId = $_GET['bookId'];
	session_start();
	$_SESSION['bookId'] = $bookId;
	
echo "<script> 
if(confirm( '确认删除图书吗？ '))
  location.href='delResult1.php';
  else location.href='showBooks.php'; 
  </script>"; 

?>

