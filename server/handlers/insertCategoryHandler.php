<?php 
function addCategory($productt_id,$categoryName,$categoryDescription) {
    include_once("./../classes/database.php");

    $database = new Database();
    $query = $database->connection->prepare("INSERT INTO categories (productt_id,categoryName,categoryDescription) VALUES (:productt_id,:categoryName,:categoryDescription)");
    $status = $query->execute(array(
        "categoryName" => $categoryName,
        "categoryDescription"=>$categoryDescription,
        "productt_id"=>$productt_id,
    ));

    if (!$status){
        throw new Exception("Could not add new category", 500);
        exit;
    }
    return $status;
}
?>