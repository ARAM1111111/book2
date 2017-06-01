<?php  
require "lib.php";
session_start();
$conn = mysqli_connect("Localhost","root",'',"book2") or die(mysqli_connect_error());


if(!empty($_POST["mail"]) && !empty($_POST["pass"])){
	$mail =$_POST["mail"];
	$pass =$_POST["pass"];
	email($mail);
	pass($pass);



$query = mysqli_query($conn,"SELECT * FROM user WHERE email='$mail' and pass='$pass'");
$res = mysqli_fetch_assoc($query);

if($res){
	$_SESSION['user'] = $res['id'];
	$_SESSION['user_name'] = $res['name'];
	if($_POST['check']=="true"){
		setcookie("book",$_SESSION['user'],time()+3600*24);
	}
	echo "refresh";
}
else echo "<p class='err'>WRONG LOGIN OR PASSWORD<p>";

}

// $mail = "aram@mail.ru";
// $pass = 1;
// $query = mysqli_query($conn,"SELECT * FROM user WHERE email='$mail' and pass='$pass'");
// $res = mysqli_fetch_assoc($query);
// print_r($res);

// if($res){
// 	$_SESSION['user'] = $res['id'];
// 	$_SESSION['user_name'] = $res['name'];
// 	print_r($_SESSION);
// }
// else echo "CHKA";





// $a  = [$mail, $pass];


// echo  json_encode($a);
 
//echo $check;





?>