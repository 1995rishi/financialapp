<!DOCTYPE html>
<html lang="en">
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
		}
		$f=md5($password);
		header('Location: profile.php?id='.$id.'&f='.$f);
	}
	if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['mobile']) && (isset($_POST['bank1'])|| isset($_POST['bank2'])|| isset($_POST['bank3'])|| isset($_POST['bank4'])))
	{

	        $name = $_POST['name'];
			$mobile = $_POST['mobile'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			if(isset($_POST['bank1']))$bank1 = $_POST['bank1'];else $bank1=0;
			if(isset($_POST['bank2']))$bank2 = $_POST['bank2'];else $bank2=0;
			if(isset($_POST['bank3']))$bank3 = $_POST['bank3'];else $bank3=0;
			if(isset($_POST['bank4']))$bank4 = $_POST['bank4'];else $bank4=0;
	$sql = "SELECT id FROM user WHERE email='$email' LIMIT 1";
	$run=mysqli_query($con,$sql);
	//if($run)print("dammit");
	if($run)
	{
	$r=mysqli_num_rows($run);
	if($r>0){
	echo "Sorry Username/Email already exists!";
	}
	else
	{
	$query="INSERT INTO user(name,mobile,password,email,bank1,bank2,bank3,bank4) VALUES('$name','$mobile','$password','$email','$bank1','$bank2','$bank3','$bank4')";
	$result=mysqli_query($con,$query);
	if ($result) {
    print("New record created successfully.");
	$to=$email;
	$subject='Account Registration';
	$q="SELECT id FROM user WHERE email='$email' LIMIT 1";
	$temp=mysqli_query($con,$q);
	$ans=mysqli_fetch_array($temp);
	$id=$ans['id'];
	$message="Click here to Activate your account :- localhost/hack/activate.php?id=".$id."&e=".$email;
	$header="From: Account Registration<no-reply@project.com>";
	$b=mail($to,$subject,$message,$header);
	
	}
	
	}
	}
	else {echo "Some Error occured!";}
	}//else {echo "Some Error occured!";}
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
   <br/><br/>
	
	 
	  <br/><br/>
	<div class="row ">
	 <form class="col s5 offset-s3  lighten-3" style="border-width:1%;border-color:blue;" method="POST" action="">
	  <div class="row">
        <div class="input-field col s12">
			<i class="material-icons prefix">account_circle</i>
          <input  id="full_name" type="text" class="validate" name="name">
          <label for="full_name">Full Name</label>
        </div>
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
     <div class="input-field col s12 ">
          <i class="material-icons prefix">phone</i>
          <input id="icon_telephone" type="tel" class="validate" name="mobile">
          <label for="icon_telephone">Mobile</label>
        </div>
		</div>
		 
		
	 
	 
	
	<center><label>Select Bank to be sync</label></center>
     <div class="row">
     <div class="input-field col s12 ">
      <input type="checkbox" id="test5" name="bank1" value=1/>
      <label for="test5">Bank1</label>
	  <br>
	  <input type="checkbox" id="test6" name="bank2" value=1/>
      <label for="test6">Bank2</label>
	  <br>
	  <input type="checkbox" id="test7" name="bank3" value=1/>
      <label for="test7">Bank3</label>
	 <br>
	 <input type="checkbox" id="test8" name="bank4" value=1/>
      <label for="test8">Bank4</label>
  </div>	
  </div>
   <div class="row">
   <div class="input-field col s12 offset-s3">
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