<?php 
session_start();
if(isset($_COOKIE['book'])){
	header("Location:home.php");
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
<div id="main">
	<div id="l">
		<input type="mail"  name="email" placeholder="EMAIL" required><br/>
		<input type="password"  name="pass" placeholder="PASSWORD" required><br/>
		REMEMBER ME <input type="checkbox" name="remember" id="check"><br/>
		<button id="login">LOGIN</button>
		<button id="register">REGISTER</button>
		<p id="log"></p>
	</div>

	<div id="reg" style="display: none">
		<input type="text" name="name" placeholder="ENTER YOUR NAME" required>
		<input type="mail"  name="remail" placeholder="EMAIL" required><br/>
		<input type="password"  name="rpass" placeholder="PASSWORD" required><br/>
		<button id="loginn">LOGIN</button>
		<button id="registerr">REGISTER</button>
		<p id="rlog"></p>
	</div>
</div>

<script type='text/javascript'>
$(document).ready(function(){
	$("#login").click(function(event) {
		var mail = $("[name=email]").val();
		var pass = $("[name=pass]").val();
		var check = $("#check").is(':checked');
		$.ajax({
			url:"login.php",
			type:"POST",
			data:{"mail":mail,"pass":pass,'check':check},
			success:function(d) {
				if($("#log").html()=="WRONG LOGIN OR PASSWORD"){
					location.reload();
				}
				if(d=="refresh"){
					window.location = "home.php";
				}
				else $('#log').html(d);
			}
		})


	});

$("#register").click(function(){
		$("#l").hide();
		$("#reg").show();
	});
$("#loginn").click(function(){
		$("#l").show();
		$("#reg").hide();
	});

$("#registerr").click(function(){
		var name =$("[name=name]").val();
		var mail = $("[name=remail]").val();
		var pass = $("[name=rpass]").val();
		
		$.ajax({
			url:"register.php",
			type:"POST",
			data:{"name":name,"mail":mail,"pass":pass},
			success:function(d){
				$('#rlog').html(d);
				console.log(d);
			}
		})
	});

})
</script>

</body>
</html>