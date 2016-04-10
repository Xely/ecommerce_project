<?php

if ($_GET['action'] == "viewProduct" && !empty($_GET['id'])) {
    $id = intval($_GET['id']);
    require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Controllers/product.php';
    $product = new Controller_Product();
    $product->viewProduct($id);
}

if ($_GET['action'] == "viewAllProducts") {
    require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Controllers/product.php';
    $product = new Controller_Product();
    $product->viewAllProducts();
}

if ($_GET['action'] == "addProduct") {
    require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Controllers/product.php';
    $product = new Controller_Product();
    $product->addProduct();
}

if($_GET['action'] == "register") {
    require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Controllers/user.php';
    $inscription = new Controller_User();
    $inscription->registerForm();
}

if($_GET['action'] == "login") {
    require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Controllers/user.php';
    $inscription = new Controller_User();
    $inscription->userLogin();
}
