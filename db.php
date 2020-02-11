<?php

$con = mysqli_connect('localhost','root','','pickbook');


if(!$con){
    die("Database connection failed");
}

$con->close();