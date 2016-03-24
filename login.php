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
	if (isset($_POST['password']) && isset($_POST['email'])){

	        $password = $_POST['password'];
			$email = $_POST['email'];
	$sql = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
	$run=mysqli_query($con,$sql);
	if($run)
	{
	$sql2= "SELECT id FROM user WHERE email='$email' AND password='$password' LIMIT 1";
	$id=mysqli_query($con,$sql2);
	$r=mysqli_num_rows($run);
	if($r>0){
	$f=md5($password);
	while($row = mysqli_fetch_assoc($run)) {
        $id=$row["id"];
		}
	session_start();
	$_SESSION["id"]=session_id();
	header('Location: profile.php?id='.$id.'&f='.$f);
	}
	else
	{
	echo "Invalid Email/Password.";;
	}
	
	
	}
	else {echo "Some Error occured!";}
	}
?>
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
	<br/><br/><br/><br/><br/><br/><br/><br/>
	<div class="row ">
	 <form class="col s5 offset-s3  lighten-3" style="border-width:1%;border-color:blue;" method="POST" action="">
	  <div class="row">
        
	  <div class="row">
        <div class="input-field col s12 ">
		<i class="material-icons prefix">mail</i>
          <input id="icon_email" type="email" class="validate" name="email">
          <label for="icon_email">Email</label>
        </div>
      </div>
	<div class="row">
        <div class="input-field col s12 ">
		<i class="material-icons prefix">vpn_key</i>
          <input id="password" type="password" class="validate" name="password">
          <label for="password">Password</label>
        </div>
      </div>
      
		 <div class="row">
		
	 <div class="input-field col s12">
    	<!--
		<select multiple>
	  <option value="" disabled selected>Select Bank to be sync</option>
      <option value="1" name="bank1">Bank 1</option>
      <option value="2" name="bank2">Bank 2</option>
      <option value="3" name="bank3">Bank 3</option></select>
	  <label>Select Bank to be sync</label>
	-->
	 </div>
	</div> 
     
   <div class="row">
   <div class="input-field col s12 offset-s3" >
   <button class="btn waves-effect waves-teal" name="submit"> Submit</button>
   </div>
   </div>
    </form>
	</div></div></div>
	
	
	 <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
	<script>$(document).ready(function() {
    $('select').material_select();
});</script>
</body>
</html>