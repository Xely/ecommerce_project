<?php

class Controller_Product
{
    public function viewProduct($id)
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Models/product.php';
        $product = new Model_Product($id);
        $myProduct = $product->getProduct($id);
        require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Views/Product/viewProduct.php';
    }

    public function viewAllProducts($category)
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Models/product.php';
        $product = new Model_Product();
        $product_list = $product->getAllProducts($category);
        require $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Views/Product/viewAllProducts.php';
    }

    public function addProduct()
    {
        if (!empty($_POST)) {
            // vérifie que tout est saisi correctement

            // j'insère en bdd
            require_once '';
        } else {
            // j'affiche mon formulaire
            require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Views/Product/addProduct.php';
        }
    }
}