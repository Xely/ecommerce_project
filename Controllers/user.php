<?php

class Controller_User
{
    public function inscriptionForm()
    {
        $inscription_error_table = array(
            "name" => array(),
            "firstname" => array(),
            "username" => array(),
            "password" => array()
        );

        if (!empty($_POST)) {
            $this->checkInscriptionErrors($inscription_error_table);
            $this->addUserInscription($inscription_error_table);
        }

        if (
            !empty($inscription_error_table['name']) ||
            !empty($inscription_error_table['firstname']) ||
            !empty($inscription_error_table['username']) ||
            !empty($inscription_error_table['password']) ||
            empty($_POST)
        ) {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/php/Project_ecommerce/Views/User/inscription.php';
        }
    }

    public function checkInscriptionErrors(&$inscription_error_table)
    {

        $this->checkMissingField($inscription_error_table);
        $this->checkSamePassword($inscription_error_table);
        $this->checkExistingUsername($inscription_error_table);
    }

    public function checkMissingField(&$inscription_error_table)
    {
        foreach ($_POST as $input => $value) {
            if (
                strlen($value) == 0 &&
                array_key_exists($input, $inscription_error_table)
            ) {
                $inscription_error_table[$input]["missing"] = 1;
            }
        }
    }

    public function checkSamePassword(&$inscription_error_table)
    {
        if ($_POST['password'] != $_POST['conf_password']) {
            $inscription_error_table['password']['unmatch'] = 1;
        }
    }

    public function checkExistingUsername(&$inscription_error_table)
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/php/Project_ecommerce/Models/user.php';
        $Model_User = new Model_User();
        $allUsers = $Model_User->getAllUsers();
        foreach ($allUsers as $user) {
            if ($user['username'] == $_POST['username']) {
                $inscription_error_table['username']['alreadyExists'] = 1;
            }
        }
    }

    public function addUserInscription($inscription_error_table)
    {
        if (
            empty($inscription_error_table['name']) &&
            empty($inscription_error_table['firstname']) &&
            empty($inscription_error_table['username']) &&
            empty($inscription_error_table['password'])
        ) {
            $name = htmlspecialchars($_POST['name']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $username = htmlspecialchars($_POST['username']);
            $password = SHA1(htmlspecialchars($_POST['password']));
            $user = array(
                "name" => $name,
                "firstname" => $firstname,
                "username" => $username,
                "password" => $password
            );
            $this->addUser($user);
        }
    }

    public function addUser($user)
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/php/Project_ecommerce/Models/user.php';
        $model_user = new Model_User();
        $model_user->insertUser($user);
        require_once $_SERVER['DOCUMENT_ROOT'] . '/php/Project_ecommerce/Views/User/inscription_complete.php';
    }
}