<?php 
session_start();
unset($_SESSION["myemail"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
header("Location: index.php");
?>