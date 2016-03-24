<html><body>
<?php

$con = mysqli_connect('localhost', 'root', '','test');
if (!$con){
    die("Database Connection Failed" . mysql_error());
}
$select_db = mysqli_select_db($con,'test');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
?>
</body></html>