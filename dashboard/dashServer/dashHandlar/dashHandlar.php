<?php
session_start();
// log in site check if the email and the password are match 
function match($myemail, $mypassword) { 
    include_once("../../dashClasses/dashDatabase.php");
    $database = new Database();
    $select = $database->connection->prepare("SELECT * FROM users WHERE email=:myemail AND Password=:mypassword AND IsAdmin =1 ");
    $select->bindParam(":myemail", $myemail);
    $hash = hash('ripemd160', $mypassword);
    $select->bindParam(":mypassword", $hash);

    $select->execute();
    $user = $select->fetch(PDO::FETCH_ASSOC);

    error_log(json_encode($user));
    if($user) {
       
        return true;
    } else {
        return false;
    }
}
?>