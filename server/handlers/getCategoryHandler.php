<?php 
function getAllCategory() {
    include_once("./../classes/database.php");
    $database = new Database();
    $query = $database->connection->prepare("SELECT * FROM categories");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($result)){
        throw new Exception("No category found", 404);
        exit;
    }
    return $result;
}

function deleteOneCategory($category_id) {
    include_once("./../classes/database.php");
    $database = new Database();

    $query = $database->connection->prepare("DELETE FROM categories WHERE category_id = :category_id");
    $result = $query->execute(array(
        "category_id" =>$category_id,
    ));

    if (!$result){
        throw new Exception("No category to delete", 500);
        exit;
    }
    return $query->rowCount();
}
?>