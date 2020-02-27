<?php


function getNews() {
    include_once("./../classes/database.php");
    $database = new Database();
    $query = $database->connection->prepare("SELECT fulName,email FROM users WHERE is_news_letter =1");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);


    if (empty($result)){
        throw new Exception("No product found", 404);
        exit;
    }
    return $result;
}


