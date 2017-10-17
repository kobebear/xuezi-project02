<?php
header("Content-Type:text/plain");
require_once("../init.php");
@$uname=$_REQUEST["uname"];
@$upwd=$_REQUEST["upwd"];
$sql="select * from xz_user where uname='$uname' and binary upwd='$upwd'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result))
  echo "true";
else
  echo "false";