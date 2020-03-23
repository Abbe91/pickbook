
<?php 
try {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["action"] == "deleteOneCategory") { 
            include_once("./../handlers/getCategoryHandler.php"); 
            echo json_encode(deleteOneCategory($_POST['category_id']));
            exit;
        
        }else {
            throw new Exception("Not a valid endpont", 501);
        }
    } else if($_SERVER["REQUEST_METHOD"] == "GET") {

        if($_GET["action"] == "getAllCategory") { 
            include_once("./../handlers/getCategoryHandler.php");              
            echo json_encode(getAllCategory());
            exit;
        }  
    } else {
         throw new Exception("Not a valid request method", 405);
    }

} catch(Exception $e) {
    echo json_encode(array("Message" => $e->getMessage(), "Status" => $e->getCode()));
}
?>

