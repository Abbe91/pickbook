<?php
include_once("./server/handlers/productHandler.php");
$method = isset($_SERVER['REQUEST_METHOD']);
if($method){
    if($method == 'GET') {
        

        
        if(isset($_GET['categories'])) {
            try{       
                $catergoryChoosen = $_GET['categories'];
                if($catergoryChoosen == "Classic" || $catergoryChoosen == "Kids" || $catergoryChoosen == "Thrillers" || $catergoryChoosen == "accessories"|| $catergoryChoosen == "Romance"){

                    $products = $product->getAll($catergoryChoosen);
                    echo json_encode($products);
                }else {
                    $allProducts = $product->getAll();
                    echo json_encode($allProducts);
                }

        
            }catch(Exception $e) {
                echo $e->getMessage();
        
            }

        } else {
            echo json_encode("Den hittar inte get value");
        }
    }
}

?>