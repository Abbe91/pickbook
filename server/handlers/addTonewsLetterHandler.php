<?php
function send($name ,$email) {
    include_once("./../classes/database.php");

    $database = new Database();
    $letter = $database->connection->prepare("INSERT INTO news_letters ( name, email ) VALUES (:name, :email )");
    $status = $letter->execute(array(
        "name"=>$name,
        "email"=>$email
    
    ));

    if (!$status){
        throw new Exception("Couldn't Send" , 500);
        exit;
    }

    return $status;

}

function deletNewsletter($email){
include_once("./../classes/database.php");
$database = new Database();

$query = $database->connection->prepare("DELETE FROM news_letters WHERE email = :email");
$result=$query->execute(array(
"email"=>$email
));
if (!$result){
    throw new Exception("No products to delete" , 500);
    exit;
}
return $query->rowCount();
} 

?>