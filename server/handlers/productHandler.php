<?php

function add($product_name,$description,$quantity,$unit_price,$discount,$image) {
    include_once("./../handlers/imageHandler.php");
    include_once("./../classes/database.php");
    $imageUrl = uploadImage($image);

    $database = new Database();
    $query = $database->connection->prepare("INSERT INTO products (product_name,description,quantity,unit_price,discount,image) VALUES (:product_name, :description, :quantity, :unit_price, :discount, :image)");
    $status = $query->execute(array(
        "product_name"=>$product_name,
        "description"=>$description,
        "quantity"=>$quantity,
        "unit_price"=>$unit_price,
        "discount"=>$discount,
        "image"=>$imageUrl
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
    $query = $database->connection->prepare("SELECT product_id,product_name,description,quantity,unit_price,discount,image FROM products");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($result)){
        throw new Exception("No product found", 404);
        exit;
    }
    return $result;
}


function deleteOneProduct($productName) {
    include_once("./../classes/database.php");
    $database = new Database();

    $query = $database->connection->prepare("DELETE FROM products WHERE product_name = :productName;");
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

    $query = $database->connection->prepare("DELETE FROM products");
    $result = $query->execute();

    if (!$result){
        throw new Exception("No products to delete", 500);
        exit;
    }
    return $query->rowCount();
}




?>