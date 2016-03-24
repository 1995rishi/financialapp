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
		  	
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="logout.php">logout</a></li>	
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
	
  </nav>
	
<center>
<?php
require('connect.php');
if (isset($_GET['id']) && isset($_GET['f'])) {
$id=$_GET['id'];
$f=$_GET['f'];
$sql = "SELECT * FROM user WHERE id='$id' LIMIT 1";
$run=mysqli_query($con,$sql);
if($run)
{

	$r=mysqli_num_rows($run);
	session_start();
	if($_SESSION["id"]==session_id())
	{
	if($r>0){
		
		while($row = mysqli_fetch_assoc($run)) {
			$name=$row["name"];
			$e=$row["email"];
			$mobile=$row["mobile"];
			$bank1=(int)($row["bank1"]);
			$bank2=(int)($row["bank2"]);
			$bank3=(int)($row["bank3"]);
			$bank4=(int)($row["bank4"]);
			echo "
			<div class='container'>
			<div class='row' style='color:blue'>
			
			<h3>Welcome $name </h3><br>
			Here are the details of your Account:<br>
			Mobile : $mobile<br>Your Banks are:-<br> 
			
			";
			$_SESSION["email"]=$e;
			if($bank1)
			echo "Bank 1 <br>";
			if($bank2)
			echo "Bank 2 <br>";
			if($bank3)
			echo "Bank 3 <br>";
			if($bank4)
			echo "Bank 4 <br>";
			#echo "<a href='main.php'>Main</a>";
			
			}
			}
			
			
			
			
			
			
			
			
		}
		else {header('Location: login.php');}
		
	}
	else {echo"<script>alert('some error occured')</script>";}
}
else
{
header('Location: login.php');
}
?>

	</div></div>
<br><br>
	<div class="container">
	<div class="row">
	<div class="row">
        <div class="col s12 m12 l12">
		<div class="col s3 m3 l3">
          <div class="card ">
		  <a href="eshop.php">
            <div class="card-image image-responsive">
              <img src="eshop.png">
            </div>
           
            <div class="card-action">
              E-Shopping</a>
            </div>
          </div>
        </div>
		<div class="col s3 m3 l3">
		 <a href="food.php">
          <div class="card ">
            <div class="card-image image-responsive">
              <img src="food.png">
              
            </div>
           
            <div class="card-action">
             Food Cart</a>
            </div>
          </div>
        </div>
		<div class="col s3 m3 l3">
		  <a href="electronics.php">
          <div class="card ">
            <div class="card-image image-responsive">
              <img src="electronics.jpg">
              
            </div>
            <div class="card-action">
            Electronics</a>
            </div>
          </div>
        </div>
		<div class="col s3 m3 l3">
		  <a href="others.php">
          <div class="card ">
            <div class="card-image image-responsive">
              <img src="others.png">
            </div>

            <div class="card-action">
            Others</a>
            </div>
          </div>
        </div>
           </div>
	</div>
	</div>
	</div>

	</center>
	  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
</body></html>