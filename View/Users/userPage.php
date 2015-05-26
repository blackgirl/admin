<?php
session_start();
if(isset($_SESSION['name']) and isset($_SESSION['id'])){
$name = $_SESSION['name'];
echo "<h1 style='text-align: center;'>Hello, ".$name.", what you want to do?</h1><br /></h1>";
	include'view/words/myBooks.php';
	include'view/words/sendProposal.php';
	include'view/words/answerFM.php';
	include'view/users/editUser.php';
	include'view/users/deleteUser.php';
	include'view/words/showWords.php';
	include'view/words/allAuthors.php';
	include'view/users/exit.php';
echo<<<_END
<html>
<head>
<title>userPage</title>
<style>
body{
    background-color: #FFFFE0;
   }
</style>
</head>
<body>
</body>
</html>
_END;
}
?>