<?php 
function getAllOrder() {
    include_once("./../classes/database.php");
    $database = new Database();
    $query = $database->connection->prepare("SELECT * FROM orders");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($result)){
        throw new Exception("No product found", 404);
        exit;
    }
    return $result;
}
?>