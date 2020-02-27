<?php 
try{
    if($_SERVER["REQUEST_METHOD"] == "POST") {

   if($_POST["action"] == "InsertCategory") { 
        include_once("./../handlers/insertCategoryHandler.php"); 
          echo json_encode(addCategory(
            $_POST["productt_id"],
            $_POST["categoryName"],
            $_POST["categoryDescription"],
        ));
            exit;
        }  
    } else {
         throw new Exception("Not a valid request method", 405);
    }

} catch(Exception $e) {
    echo json_encode(array("Message" => $e->getMessage(), "Status" => $e->getCode()));
}


?>
