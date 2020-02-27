<?php

function add($fulName, $IsAdmin , $email, $phone, $adress, $postNu, $ZIPcode, $city, $country, $Password,$is_news_letter) {
    include_once("./../classes/database.php");
    $database = new Database();
    $query = $database->connection->prepare("INSERT INTO users (fulName,IsAdmin,email,phone,adress,postNu,ZIPcode,city,country,Password,is_news_letter) VALUES (:fulName, :IsAdmin, :email, :phone, :adress, :postNu, :ZIPcode, :city, :country, :Password, :is_news_letter)");
    $status = $query->execute(array(
        "fulName"=>$fulName,
        "IsAdmin"=>$IsAdmin,
        "email"=>$email,
        "phone"=>$phone,
        "adress"=>$adress,
        "postNu"=>$postNu,
        "ZIPcode"=>$ZIPcode,
        "city"=>$city,
        "country"=>$country,
        "Password"=>hash('ripemd160', $Password),
        "is_news_letter"=>$is_news_letter
    ));
    if (!$status){
        throw new Exception("Couldn't add the user, something went wrong", 500);
        exit;
    }
    return $status;
}



