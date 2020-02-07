<?php

function add($Description,$Quantity,$UnitPrice,$Discount) {
    include_once("./../classes/database.php");
    $database = new Database();
    $query = $database->connection->prepare("INSERT INTO product (Description,Quantity,UnitPrice,Discount) VALUES (:description, :quantity, :unitPrice, :discount)");
    $status = $query->execute(array(
        "description"=>$Description,
        "quantity"=>$Quantity,
        "unitPrice"=>$UnitPrice,
        "discount"=>$Discount
    ));
    
    if (!$status){
        throw new Exception("Could not add new product", 500);
        exit;
    }
    return $status;
}

function getAll() {
    include_once("./../classes/database.php");
    $database = new Database();
    $query = $database->connection->prepare("SELECT * FROM product;");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    if (empty($result)){
        throw new Exception("No students found", 404);
        exit;
    }
    return $result;
}

function deleteOneProduct($productName) {
    include_once("./../classes/database.php");
    $database = new Database();

    $query = $database->connection->prepare("DELETE FROM product WHERE Description = :productName;");
    //$query->bindValue(":productName", "MacBook");
    $result = $query->execute(array(
        "productName" =>$productName,
    ));

    if (!$result){
        throw new Exception("No products to delete", 500);
        exit;
    }
    return $query->rowCount();
}


function deleteAllProduct() {
    include_once("./../classes/database.php");
    $database = new Database();

    $query = $database->connection->prepare("DELETE FROM product");
    $result = $query->execute();

    if (!$result){
        throw new Exception("No products to delete", 500);
        exit;
    }
    return $query->rowCount();
}


?>