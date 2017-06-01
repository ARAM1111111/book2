<?php
session_start();
	session_unset();
	session_destroy();
	setcookie('book',"",time()-10);
	header("Location:index.php");	


?>