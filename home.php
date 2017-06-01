<?php 
session_start();
$conn = mysqli_connect("Localhost","root",'',"book2") or die(mysqli_connect_error());
if(!$_SESSION['user']) header("Location:index.php"); 
else {
	$name = $_SESSION['user_name'];
	if(!isset($_SESSION['sum'])) $_SESSION['sum'] = 0;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->
<!-- Latest compiled and minified JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-inverse">
<div id="header" class="container-fluid">

<a href='logout.php'  class="navbar-brand">Logout</a>
<a href='show_to_cart.php'  class="navbar-brand">MARKET</a>
<a href="home.php"  class="navbar-brand active">HOME</a>
<a href="buy.php"  class="navbar-brand">BUY</a>
<div id="card"  class="navbar-brand"><?php echo $_SESSION['sum']?></div>
<div id="card"  class="navbar-brand"><?php echo ucfirst($name) ?></div>

</div>
</nav>
<div><?php print_r($_SESSION) ?></div>
<div id="categoria">
		<ul class='list-group'>
			<li class='list-group'>CATEGORIA</li>
	<?php
		$q = mysqli_query($conn,"SELECT * FROM categ");
		$res = mysqli_fetch_all($q,MYSQLI_ASSOC);
		// print_r($res);
		foreach ($res as $key => $categ):
	?>
			<li class='list-group' data-id="<?php echo $categ['categid']  ?>"><?php echo $categ['categname'] ?></li>
		<?php endforeach ?>
		</ul>
</div>
<div id="book"></div> 

	<script>
	$(document).ready(function(){
		$("li:not('li:first-child')").click(function(event) {
			var categid = $(this).attr("data-id");
			// alert(categid);
			jQuery.post('home_proc.php', {'categid':categid}, function(data) {
			  	$("#book").html(data);
			});		
		});

		$("#book").delegate('.buy', 'click', function(event) {
			var buyid = $(this).parent().attr('id');
			var price = $(this).parent().find("[name=price]").html();
			jQuery.post('add_to_cart.php',{'buyid': buyid,'price':price}, function(d){
			  	$("#card").html(d);
			  	console.log(d);
			});
			
		});



	})
	</script>
</body>
</html>