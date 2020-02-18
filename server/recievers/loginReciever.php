<?php

//inlogning 
try{
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["action"] == "add") { 
            include_once("./../handlers/loginHandler.php"); 
              echo json_encode(match(
                $_POST["myemail"],
                $_POST["mypassword"]
            ));
            // $_SESSION["insertUserEmail"]=$myemail;
            exit;
        }else{
                throw new Exception("Not a valid endpont", 501);
        };
    } } catch(Exception $e) {
        echo json_encode(array("Message" => $e->getMessage(), "Status" => $e->getCode()));
    }
  

?>