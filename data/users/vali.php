<?php
header("Content-Type:text/plain");
require_once("../init.php");
@$uname=$_REQUEST["uname"];
@$email=$_REQUEST["email"];
$sql="select * from xz_user where ";
if($uname){
  $sql.="uname='$uname'";
}else{
  $sql.="email='$email'";
}
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result))
  echo "false";
else
  echo "true";