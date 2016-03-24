<html><body>
<?php
if (isset($_GET['id']) && isset($_GET['u']) && isset($_GET['e'])) {
require('connect.php');
$id=$_GET['id'];
$e=$_GET['e'];
$sql = "SELECT * FROM user WHERE id='$id' AND username='$username' AND email='$e' LIMIT 1";
$run=mysqli_query($con,$sql);
if($run)
{
	$r=mysqli_num_rows($run);
	if($r>0){
	$sql = "UPDATE user SET active='1' WHERE id='$id' LIMIT 1";
	$run=mysqli_query($con,$sql);
	$query="SELECT * FROM user WHERE id='$id' AND active='1' LIMIT 1";
	$s=mysqli_query($con,$query);
	if($s)
	{
		$x=mysqli_num_rows($s);
		if($x>0){
		echo "Account registration Successfull";
		}
	}
	else {echo "Some Error occured!";}
	}
	else {echo "Your Account is not valid!";}
	
}
else {echo "Some Error occured!";}}
?>
</body></html>