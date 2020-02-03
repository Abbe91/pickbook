<?php


if($_SERVER["request_method"] == "POST") {
    if($_POST["entity"] == "user") {
        include("./user.php");
        if($_POST["action"] == "add") {
            echo json_encode(addUser($_POST["name"], $_POST["adress"]));
        }
    }
}


?>