<?php

class Controller_User
{
    public function userLogin()
    {
        $login_error_table = array(
            "username" => array(),
            "password" => array()
        );

        if (!empty($_POST)) {
            $this->checkLoginErrors($login_error_table);
            var_dump($login_error_table);

            if (
                empty($login_error_table['username']) &&
                empty($login_error_table['password'])
            ) {
                $this->checkLoginPassword($login_error_table);
            }

        }

        if (
            !empty($login_error_table['username']) ||
            !empty($login_error_table['password']) ||
            empty($_POST)
        ) {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/php/Project_ecommerce/Views/User/login.php';
        }

    }

    public function checkLoginErrors(&$login_error_table)
    {
        $this->checkMissingField($login_error_table);
        if (!$this->checkExistingUsername($login_error_table)) {
            $login_error_table['username']['nonExistant'] = 1;
        }
        $this->checkLoginPassword($login_error_table);

    }

    public function checkLoginPassword(&$login_error_table)
    {
        $Model_User = new Model_User();
        $user = $Model_User->getUser($this->checkExistingUsername($login_error_table));
        var_dump($user[0]['password']);

        if ($user[0]['password'] != SHA1($_POST['password'])) {
            $login_error_table['password']['notMatched'] = 1;
        }
    }

    public function registerForm()
    {
        $register_error_table = array(
            "name" => array(),
            "firstname" => array(),
            "username" => array(),
            "password" => array()
        );

        if (!empty($_POST)) {
            $this->checkRegisterErrors($register_error_table);
            $this->addUserRegister($register_error_table);
        }

        if (
            !empty($register_error_table['name']) ||
            !empty($register_error_table['firstname']) ||
            !empty($register_error_table['username']) ||
            !empty($register_error_table['password']) ||
            empty($_POST)
        ) {
            var_dump($register_error_table);
            require_once $_SERVER['DOCUMENT_ROOT'] . '/php/Project_ecommerce/Views/User/register.php';
        }
    }


    public function checkRegisterErrors(&$register_error_table)
    {
        $this->checkMissingField($register_error_table);
        $this->checkSamePassword($register_error_table);
        if ($this->checkExistingUsername($register_error_table)) {
            $register_error_table['username']['alreadyExists'] = 1;
        }
    }

    public function checkMissingField(&$register_error_table)
    {
        foreach ($_POST as $input => $value) {
            if (
                strlen($value) == 0 &&
                array_key_exists($input, $register_error_table)
            ) {
                $register_error_table[$input]["missing"] = 1;
            }
        }
    }

    public function checkSamePassword(&$register_error_table)
    {
        if ($_POST['password'] != $_POST['conf_password']) {
            $register_error_table['password']['unmatch'] = 1;
        }
    }

    public function checkExistingUsername(&$register_error_table)
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/php/Project_ecommerce/Models/user.php';
        $Model_User = new Model_User();
        $allUsers = $Model_User->getAllUsers();
        foreach ($allUsers as $user) {
            if ($user['username'] == $_POST['username']) {
                // $register_error_table['username']['alreadyExists'] = 1;
                return $user['id'];
            }
        }
        return 0;

    }

    public function addUserRegister($error_table)
    {
        // $flag will be set to 1 if $error_table contains any error
        $flag = 0;
        foreach ($error_table as $field => $value) {
            if (!empty($value)) {
                $flag = 1;
            };
        }

        if (!$flag) {
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
        require_once $_SERVER['DOCUMENT_ROOT'] . '/php/Project_ecommerce/Views/User/register_complete.php';
    }
}