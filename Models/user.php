<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Libs/db.php';

class Model_User
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function getUser($id)
    {
        $request_sql = "SELECT * FROM user WHERE id=:id";
        $tab = array(
            'id' => $id
        );
        $result = $this->db->fetch($request_sql, $tab);
        return $result;
    }

    public function getAllUsers()
    {
        $request_sql = "SELECT * FROM user";
        $result = $this->db->fetch($request_sql);
        return $result;
    }

    public function insertUser($user)
    {
        $request_sql = "INSERT INTO user(name, firstname, username, password) VALUES(:name, :firstname, :username, :password);";
        $this->db->insert($request_sql, $user);
    }
}