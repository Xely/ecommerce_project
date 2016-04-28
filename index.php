<?php
session_start();
if ($_GET['action'] == "viewProduct" && !empty($_GET['id'])) {
    $id = intval($_GET['id']);
    require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Controllers/product.php';
    $product = new Controller_Product();
    $product->viewProduct($id);
} else if ($_GET['action'] == "viewAllProducts") {
    require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Controllers/product.php';
    $product = new Controller_Product();
    $product->viewAllProducts();
} else if ($_GET['action'] == "addProduct") {
    require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Controllers/product.php';
    $product = new Controller_Product();
    $product->addProduct();
} else if ($_GET['action'] == "register") {
    require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Controllers/user.php';
    $inscription = new Controller_User();
    $inscription->registerForm();
} else if ($_GET['action'] == "login") {
    require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Controllers/user.php';
    $inscription = new Controller_User();
    $inscription->userLogin();
} else if ($_GET['action'] == "logout") {
    require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Controllers/user.php';
    $inscription = new Controller_User();
    $inscription->userLogout();
} else if ($_GET['action'] == "homepage") {
    require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Views/Website/homepage.php';
}