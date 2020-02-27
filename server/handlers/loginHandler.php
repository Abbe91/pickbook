<?php
session_start();
// log in site check if the email and the password are match 
function match($myemail, $mypassword) { 
    include_once("./../classes/database.php");
    $database = new Database();
    $select = $database->connection->prepare("SELECT * FROM users WHERE email=:myemail AND Password=:mypassword ");
    $select->bindParam(":myemail", $myemail);
    $hash = hash('ripemd160', $mypassword);
    $select->bindParam(":mypassword", $hash);

    $select->execute();
    $user = $select->fetch(PDO::FETCH_ASSOC);

    error_log(json_encode($user));
    if($user) {
        $_SESSION["myemail"]=$myemail;
        return true;
    } else {
        return false;
    }
}
?>