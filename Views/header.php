<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Site E-Commerce</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
</head>


<div class="header col-xs-12">
    <a href="../Project_ecommerce/index.php?action=homepage">
        <div class="col-xs-4 header__logo">
            Tabl'Art
        </div>
    </a>

    <?php if (array_key_exists('registered', $_SESSION) && $_SESSION['registered']) { ?>
        <div class="col-xs-4">Connecté en tant que <?php echo $_SESSION['username']; ?></div>
        <a href="../Project_ecommerce/index.php?action=logout"
                                 class="navbar-link header__logout"><div class="col-xs-4">Se
                déconnecter</div></a>
    <?php } else { ?>
        <div class="col-xs-4"><a href="../Project_ecommerce/index.php?action=login"
                                 class="navbar-link header__login">Connexion</a>
        </div>
        <div class="col-xs-4"><a href="../Project_ecommerce/index.php?action=register" class="header__register">Inscription</a>
        </div>
    <?php } ?>
</div>

<br>

<body>