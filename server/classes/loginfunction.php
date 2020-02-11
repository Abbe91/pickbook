<?php

include "customers.php";

$email=$_POST["email"];
$password=$_POST["password"];

$cus1=new Customer($email,null,null,null,null,null,null,$password,null);
$result= $cus1->login();
$row=$result->fetch();
if($row==null){
      echo "False";
}else{
      echo "True";
}
// header("Location:../index.html");    
?>