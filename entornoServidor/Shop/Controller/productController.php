<?php

if (!empty($_GET['productView'])) {
        include('./View/productView.phtml');
        exit(); 
    
}

if (!empty($_POST['product'])) {
     ProductRepository::addProduct($_POST, $_FILES);
}

if (!empty($_POST['deleteProduct'])) {
    var_dump($_POST);
    $productId = $_POST['productId'];
    ProductRepository::deleteProduct($productId);
}


?>