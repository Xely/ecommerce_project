<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Libs/db.php';

class Model_Product
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public
    function getProduct($id)
    {
        $request_sql = "SELECT * FROM product WHERE id=:id";
        $tab = array(
            'id' => $id
        );
        $result = $this->db->fetch($request_sql, $tab);
        return $result;
    }

    public function getAllProducts($category)
    {
        $request_sql = "
                    SELECT *
                    FROM product
                    INNER JOIN product_category
                    ON product_category.id_product = product.id
                    INNER JOIN category
                    ON category.id = product_category.id_category
                    WHERE category.id=:category
                    ";
        $tab = array(
            'id' => $category
        );
        $result = $this->db->fetch($request_sql, $tab);
        return $result;
    }
}