<?php
header("Content-Type:text/plain");
require_once("../init.php");
@$uname=$_REQUEST["uname"];
@$upwd=$_REQUEST["upwd"];
@$email=$_REQUEST["email"];
if($uname&&$upwd&&$email){
  $sql="insert into xz_user(uname,upwd,email) values('$uname','$upwd','$email')";
  $result=mysqli_query($conn,$sql);
  if($result)
    echo "true";
  else
    echo "false";
}else
  echo "false";