<?php 

try {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["action"] == "add") { 
            include_once("./../handlers/usersHandler.php"); 
              echo json_encode(add(
                $_POST["fulName"],
                $_POST["IsAdmin"],
                $_POST["email"],
                $_POST["phone"],
                $_POST["adress"],
                $_POST["postNu"],
                $_POST["ZIPcode"],
                $_POST["city"],
                $_POST["country"],
                $_POST["Password"],
                $_POST["is_news_letter"]
            ));
            exit;
        }else {
            throw new Exception("Not a valid endpont", 501);
        }
    }  

} catch(Exception $e) {

    echo json_encode(array("Message" => $e->getMessage(), "Status" => $e->getCode()));
}