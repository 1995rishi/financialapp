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
		$bank1=$row["bank1"];
		$bank2=$row["bank2"];
		$bank3=$row["bank3"];
		$bank4=$row["bank4"];
		}
		$p=$_GET['p'];
		$sql1="SELECT * FROM offer WHERE id='$p' ";
		$run1=mysqli_query($con,$sql1);
		while($row = mysqli_fetch_assoc($run1)) {
			$array["1"]=$row["bank1"];
			$array["2"]=$row["bank2"];
			$array["3"]=$row["bank3"];
			$array["4"]=$row["bank4"];
		}
		arsort($array);
		foreach ($array as $k => $v) {
		$x=(int)$k;
		echo "<br><br><br>";
		if($x==1)
		{
			if($bank1) {echo "<strong>Bank1 is offering a discount of $v %<br></strong>";echo "<a href='naya.php?d=$v&b=$x&p=$p'> Click here to avail this offer</a>";}
			else echo "Bank1 is offering a discount of $v %<br>";
		}
		if($x==2)
		{
			if($bank2) {echo "<strong>Bank2 is offering a discount of $v %<br></strong>";echo "<a href='naya.php?d=$v&b=$x&p=$p'> Click here to avail this offer</a>";}
			else echo "Bank2 is offering a discount of $v %<br>";
			
		}
		if($x==3)
		{
			if($bank3){ echo "<strong>Bank3 is offering a discount of $v %<br></strong>";echo "<a href='naya.php?d=$v&b=$x&p=$p'> Click here to avail this offer</a>";}
			else echo "Bank3 is offering a discount of $v %<br>";
			
		}
		if($x==4)
		{
			if($bank4) {echo "<strong>Bank4 is offering a discount of $v %<br></strong>";echo "<a href='naya.php?d=$v&b=$x&p=$p'> Click here to avail this offer</a>";}
			else echo "Bank4 is offering a discount of $v %<br>";
			
			
		}
			
		}		
}
?>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
</body></html>