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
        <li><a href="logout.php">logout</a></li>
		  <li><a href="profile.php">profile</a></li>  		
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="logout.php">logout</a></li>
		<li><a href="profile.php">profile</a></li>  			
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
	
  </nav>
	<center>
<?php
require('connect.php');
session_start();
if(isset($_SESSION["email"]))
{
		$email=$_SESSION["email"];
		$sql = "SELECT * FROM user WHERE email='$email' LIMIT 1";
		$run=mysqli_query($con,$sql);
		while($row = mysqli_fetch_assoc($run)) {
        $id=$row["id"];
		$password=$row["password"];
		$bank1=$row["bank1"];
		$bank2=$row["bank2"];
		$bank3=$row["bank3"];
		$bank4=$row["bank4"];
		}
		
		echo "<br><br><a href='product.php?p=7'>Product 10</a><br><br>";
		echo "<a href='product.php?p=8'>Product 11</a><br><br>";
		echo "<a href='product.php?p=9'>Product 12</a><br><br>";
		
}
?></center>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
</body></html>