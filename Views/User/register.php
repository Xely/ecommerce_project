<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Views/header.php';
if (array_key_exists('registered', $_SESSION) && $_SESSION['registered']) {
?>
    </br>
    <div class="col-xs-12 text-center register__logoutmessage">Veuillez vous déconnecter pour créer un compte.</div>
<?php } else { ?>

<div class="col-xs-12 register__form">
    <div class="col-lg-6 col-lg-offset-3">
        <form action="" method="post">
            <div class="form-group <?php if (!empty($register_error_table['name'])) { echo "has-error has-feedback";} ?>">
                <label <?php if (!empty($register_error_table['name'])) { echo 'class="control-label"';} ?> for="name">Nom: </label>
                <input type="text" class="form-control" id="name" placeholder="Nom" name="name">
            </div>
            <div class="form-group <?php if (!empty($register_error_table['firstname'])) { echo "has-error has-feedback";} ?>">
                <label <?php if (!empty($register_error_table['firstname'])) { echo 'class="control-label"';} ?> for="firstname">Prénom: </label>
                <input type="text" class="form-control" id="firstname" placeholder="Prénom" name="firstname">
            </div>
            <div class="form-group <?php if (!empty($register_error_table['username'])) { echo "has-error has-feedback";} ?>">
                <label <?php if (!empty($register_error_table['username'])) { echo 'class="control-label"';} ?> for="username">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" placeholder="Nom d'utilisateur" name="username">
            </div>
            <div class="form-group <?php if (!empty($register_error_table['email'])) { echo "has-error has-feedback";} ?>">
                <label <?php if (!empty($register_error_table['email'])) { echo 'class="control-label"';} ?> for="email">E-mail: </label>
                <input type="email" class="form-control" id="email" placeholder="E-mail" name="email">
            </div>
            <div class="form-group <?php if (!empty($register_error_table['password'])) { echo "has-error has-feedback";} ?>">
                <label <?php if (!empty($register_error_table['password'])) { echo 'class="control-label"';} ?> for="password">Mot de passe:</label>
                <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password">
            </div>
            <div class="form-group <?php if (!empty($register_error_table['password'])) { echo "has-error has-feedback";} ?>">
                <label <?php if (!empty($register_error_table['password'])) { echo 'class="control-label"';} ?> for="conf_password">Confirmation mot de passe:</label>
                <input type="password" class="form-control" id="conf_password" placeholder="Mot de passe"
                       name="conf_password">
            </div>
            <button type="submit" class="btn btn-success">Valider inscription</button>
        </form>
    </div>
</div>

<?php
}
require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Views/footer.php'
?>