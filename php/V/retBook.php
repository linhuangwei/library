<?php
  $id = $_GET['bookId'];
  $ISBN = $_GET['ISBN'];
	session_start();
  $_SESSION['id'] = $id;
  $_SESSION['ISBN'] = $ISBN;
  
	//  echo $ISBN;
echo "<script> 
if(confirm( '确认还书吗 '))
  location.href='retBookResult.php';
  else location.href='showBroBooks.php'; 
  </script>"; 

?>

