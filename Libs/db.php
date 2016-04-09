<?php

class DB
{
    private static $_instance = null;
    public $bdd;

    private function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');
    }

    public function fetch($request, $values = array())
    {
        $req = $this->bdd->prepare($request);
        $req->execute($values);
        return $req->fetchAll();
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function insert($request, $values = array())
    {
        $req = $this->bdd->prepare($request);
        $req->execute($values);
    }
}