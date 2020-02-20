<?php 

try {
        if($_SERVER["REQUEST_METHOD"] == "GET") {

            if($_GET["action"] == "getNewsUser") { 
                include_once("./../handlers/newsLetterHandlar.php");              
                echo json_encode(getNews());
                exit;
            }  
        } 
      

} catch(Exception $e) {

    echo json_encode(array("Message" => $e->getMessage(), "Status" => $e->getCode()));
}
?>