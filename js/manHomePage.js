	

	var allBook = document.getElementById('allBook');
	var addBook = document.getElementById('addBook');
	var allUsers = document.getElementById('allUser');
	var showManagers = document.getElementById('showManagers');
	
	var logOut = document.getElementById('logOut');

	var myFine = document.getElementById('myFine');

	var theBro = document.getElementById('theBro');
	var addBookType = document.getElementById('addBookType');
	var addSchool = document.getElementById('addSchool');
	var addPub = document.getElementById('addPub');
	var retBook = document.getElementById('retBook');
	var broBook = document.getElementById('broBook');
	var userRank = document.getElementById('userRank');
	var bookRank = document.getElementById('bookRank');

	allBook.onclick = function(){
		window.location.href='showBooks.php';
	}
	addBook.onclick = function(){
		window.location.href='addBook.php';
	}
	allUsers.onclick = function(){
		self.location='showUsers.php';
	}
	showManagers.onclick = function(){
		window.location.href='showManagers.php';
	}
	logOut.onclick = function(){
		window.location.href='logOut.php';
	}
	myFine.onclick = function(){
		window.location.href='showTheFines.php';
	}
	theBro.onclick = function(){
		window.location.href='showBroBooks.php';
	}
	// addBookType.onclick = function(){
	// 	window.location.href='addBookType.php';
	// }
	addSchool.onclick = function(){
		window.location.href='addSchool.php';
	}
	// addPub.onclick = function(){
	// 	window.location.href='addPub.php';
	// }
	broBook.onclick = function(){
		window.location.href='broBook.php';
	}
	userRank.onclick = function(){
		window.location.href='userRank.php';
	}
	bookRank.onclick = function(){
		window.location.href='bookRank.php';
	}



