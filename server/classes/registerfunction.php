<?php

include "users.php";

$email=$_POST["email"];
$fulName=$_POST["name"];
$phone=$_POST["phone"];
$adress=$_POST["address"];
$postNu=$_POST["postnumber"];
$ZIPcode=$_POST["zipcode"];
$city=$_POST["city"];
$country=$_POST["country"];
$Password=$_POST["password"];
$IsAdmin=0;
$is_news_letter=0;
$cus1=new User(0,$fulName,$IsAdmin,$email,$phone,$adress,$postNu,$ZIPcode,$city,$country,$Password,$is_news_letter);

$cus1->register();

echo "Registered";
?>