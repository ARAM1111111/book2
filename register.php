<?php  
require "lib.php";
session_start();
$conn = mysqli_connect("Localhost","root",'',"book2") or die(mysqli_connect_error());


if(!empty($_POST['name']) && !empty($_POST['mail']) && !empty($_POST['pass'])){
    $name = $_POST['name'];
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];
	
	 name($name);
	 email($mail);
	 pass($pass);

	 $stugum = mysqli_query($conn,"SELECT * FROM user WHERE email='$mail' and pass='$pass'");
	$resstugum = mysqli_fetch_assoc($stugum);
	if(!$resstugum){
		$query = "INSERT INTO user(name,email,pass) VALUES('$name','$mail','$pass')";
		$res = mysqli_query($conn,$query) or die("CANT DO THAT");
		if($res) echo "<p class='err'>YOU ARE REGISTRED<p>";	
	}else echo "<p class='err'>HAS A REGISTRED USER<p>";
}
