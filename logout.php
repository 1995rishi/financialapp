<html><body>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Barclays</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
    <!-- <a id="logo-container" href="logo.png" class="brand-logo">logo</a>-->
		<a href="index.php" class="brand-logo center"><img src="logo2.jpg" style=" position:relative;height:100%; width:20%; min-height:100%;left-padding:25%"/></a>
      <ul class="right hide-on-med-and-down">
        
      </ul>

      <ul id="nav-mobile" class="side-nav">
        	
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
	
  </nav>
<center>
<?php
	echo "<br><br>Logged out successfully. ";
    require('connect.php');
	
	session_start();
	if(isset($_SESSION['email'])){
	$email=$_SESSION['email'];
	session_destroy();
	for ($x = 1; $x <= 12; $x++) {
		$p=rand(0,51);$q=rand(0,51);$r=rand(0,51);$s=rand(0,51);
			$sql1 = "UPDATE offer SET bank1=$p,bank2=$q,bank3=$r,bank4=$s WHERE id='$x'";
			$run1=mysqli_query($con,$sql1);
		}
	#header('Refresh: 5;url=login.php');
    $darray=$_SESSION["darray"];
	$parray=$_SESSION["parray"];
	$barray=$_SESSION["barray"];
	$s=sizeof($darray);
	echo "The transactions You Have Performed in this Session Are-<br><br>";
	echo "<table border=1 width=50%><tr><td><center>Product Number</center></td><td><center>Bank Number</center></td><td><center>Discount</center></td></tr>";
	for($i=0;$i<$s;$i++)
	{
		echo "<tr><td><center>$parray[$i]</center><t></td><td><center>$barray[$i]</center></td><td><center>$darray[$i]</center></td></tr>";
	}
	echo "</table><br><br><a href='login.php'>Click here to Login Again</a>";
	}
	else
	{
		header('Location: login.php');
	}
?>
</center>
</html>