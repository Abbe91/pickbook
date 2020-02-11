<?php

include "customers.php";

$email=$_POST["email"];
$name=$_POST["name"];
$phone=$_POST["phone"];
$address=$_POST["address"];
$postnumber=$_POST["postnumber"];
$zipcode=$_POST["zipcode"];
$city=$_POST["city"];
$country=$_POST["country"];
$password=$_POST["password"];

$cus1=new Customer($email,$name,$phone,$postnumber,$zipcode,$city,$country,$password,$address);
$cus1->register();
echo "Registered";
?>