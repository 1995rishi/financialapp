<!DOCTYPE html>
<html lang="en">
<?php
session_start();
	require('connect.php');
	if(isset($_SESSION["email"]))
	{
		$email=$_SESSION["email"];
		$sql = "SELECT * FROM user WHERE email='$email' LIMIT 1";
		$run=mysqli_query($con,$sql);
		while($row = mysqli_fetch_assoc($run)) {
        $id=$row["id"];
		$password=$row["password"];
		}
		$f=md5($password);
		header('Location: profile.php?id='.$id.'&f='.$f);
	}
	?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Banking App</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style>
	html{
	min-height:700px;;background: url(bank.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover; 
	}
  </style>
</head>
<body >

  <nav class="white" role="navigation" >
    <div class="nav-wrapper container">
    <!-- <a id="logo-container" href="logo.png" class="brand-logo">logo</a>-->
		<a href="index.php" class="brand-logo center"><img src="logo2.jpg" style="position:relative;height:100%; width:20%; min-height:100%;left-padding:25%"/></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="login.php">login</a></li>
		  <li><a href="signup.php">signup</a></li>	
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="login.php">login</a></li>
		  <li><a href="signup.php">signup</a></li>	
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
	
  <div class="container col s12 l12 m12" style="height:50%; background:white; opacity:0.8;margin-top:10%;">
  <div class="row">
  <div class=" col s6 offset-s3" >
		<h2 style="font-family: 'AbrahamLincoln'; src:url('../font/AbrahamLincoln.ttff');"> Financial monitoring APP   </h2> 
		</div>
  </div>
  
	</div>
    <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
</body>
</html>