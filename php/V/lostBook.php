<?php
  
  $bookName = $_GET['bookName'];
  $ISBN = $_GET['ISBN'];
  $id = $_GET['bookId'];
  $broNum = $_GET['broNum'];
  
  // var_dump($id,$broNum,$bookName,$ISBN);

	session_start();
  $_SESSION['id'] = $id;
  $_SESSION['broNum'] = $broNum;
  $_SESSION['bookName'] = $bookName;
  $_SESSION['ISBN'] = $ISBN;

echo "<script> 
if(confirm( '确认挂失吗？ '))
  location.href='lostBookResult.php';
  else location.href='showBroBooks.php'; 
  </script>"; 

?>

