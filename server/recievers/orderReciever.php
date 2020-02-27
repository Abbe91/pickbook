<?php 
try{
    if($_SERVER["REQUEST_METHOD"] == "GET") {

        if($_GET["action"] == "getAllOrder") { 
            include_once("./../handlers/orderHandler.php");              
            echo json_encode(getAllOrder());
            exit;
        }  
    } else {
         throw new Exception("Not a valid request method", 405);
    }

} catch(Exception $e) {
    echo json_encode(array("Message" => $e->getMessage(), "Status" => $e->getCode()));
}
?>