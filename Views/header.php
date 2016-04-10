<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Site E-Commerce</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
</head>

<div class="header">
    <div class="col-xs-3">Header</div>
    <div class="col-xs-3"><a href="../Project_ecommerce/index.php?action=login" class="navbar-link">Se connecter</a>
    </div>
    <?php if (array_key_exists('registered', $_SESSION) && $_SESSION['registered']) { ?>
        <div class="col-xs-3">Connecté en tant que <?php echo $_SESSION['username']; ?></div>
        <div class="col-xs-3"><a href="../Project_ecommerce/index.php?action=logout" class="navbar-link">Se
                déconnecter</a></div>
    <?php } ?>
</div>

<br>

<body>