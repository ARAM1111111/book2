<?php
session_start();


// $_SESSION['sum'] = 0;
if(!empty($_POST['buyid']) && !empty($_POST['price'])){

	 $buyid = $_POST['buyid'];
	 $price = $_POST['price'];
	$_SESSION['sum'] +=$price;
	echo $sum = $_SESSION['sum'];
	$_SESSION['card'][] = $buyid;
	// $_SESSION['card'] = [];
	// array_unshift($_SESSION['card'], $buyid);
	
	// print_r($_SESSION);


}



?>