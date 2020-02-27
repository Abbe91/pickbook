<?php

try{
    if($_SERVER["REQUEST_METHOD"] == "POST") { 

    if($_POST["action"] == "add") {
        include_once("../handlers/addTonewsLetterHandler.php"); 
        echo json_encode(send(
            $_POST["nameForNewsLetter"],
          $_POST["emailForNewsLetter"] 
      ));
      exit;
    }
    else if($_POST["action"]=="deletNewsletter"){
        include_once("./../handlers/addTonewsLetterHandler.php");
        echo json_encode(deletNewsletter(
            $_POST["deleteOneEmail"]
        ));
        exit;
    }else{
        throw new Exception(" Not a Valid endpont" , 501 );
    } 
 }
} catch( Exception $e ) {
    echo json_encode ( array ("Message" => $e -> getMessage(), "Status" => $e -> getCode()));
}



?>