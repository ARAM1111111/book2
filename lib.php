<?php 

function email($email)
{
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		echo "<p class='err'>Invalid email format</p>";
  		exit;
	}else return true;
}

function pass($pass){
	if(strlen($pass)<5) {
		echo "<p class='err'>PASSWORD MUST BE > 4</p>";
		exit;
	}
	else return true;
}

function name($name){
	if(strlen($name)<5) {
		echo "<p class='err'>NAME MUST BE > 4</p>";
		exit;
	}
	else return true;
}


?>