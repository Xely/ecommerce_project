<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Views/header.php';
?>
<div class="col-xs-12">
    <div class="col-lg-6">
        <form action="" method="post">
            <div class="form-group <?php if (!empty($inscription_error_table['name'])) { echo "has-error has-feedback";} ?>">
                <label <?php if (!empty($inscription_error_table['name'])) { echo 'class="control-label"';} ?> for="name">Nom: </label>
                <input type="text" class="form-control" id="nom" placeholder="Nom" name="name">
                <?php if (empty($_POST['name'])) { ?><span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php } ?>
            </div>
            <div class="form-group <?php if (!empty($inscription_error_table['firstname'])) { echo "has-error has-feedback";} ?>">
                <label <?php if (!empty($inscription_error_table['firstname'])) { echo 'class="control-label"';} ?> for="firstname">Prénom: </label>
                <input type="text" class="form-control" id="firstname" placeholder="Prénom" name="firstname">
            </div>
            <div class="form-group <?php if (!empty($inscription_error_table['username'])) { echo "has-error has-feedback";} ?>">
                <label <?php if (!empty($inscription_error_table['username'])) { echo 'class="control-label"';} ?> for="username">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" placeholder="Nom d'utilisateur" name="username">
            </div>
            <div class="form-group <?php if (!empty($inscription_error_table['email'])) { echo "has-error has-feedback";} ?>">
                <label <?php if (!empty($inscription_error_table['email'])) { echo 'class="control-label"';} ?> for="email">E-mail: </label>
                <input type="email" class="form-control" id="email" placeholder="E-mail" name="email">
            </div>
            <div class="form-group <?php if (!empty($inscription_error_table['password'])) { echo "has-error has-feedback";} ?>">
                <label <?php if (!empty($inscription_error_table['password'])) { echo 'class="control-label"';} ?> for="password">Mot de passe:</label>
                <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password">
            </div>
            <div class="form-group <?php if (!empty($inscription_error_table['password'])) { echo "has-error has-feedback";} ?>">
                <label <?php if (!empty($inscription_error_table['password'])) { echo 'class="control-label"';} ?> for="conf_password">Confirmation mot de passe:</label>
                <input type="password" class="form-control" id="conf_password" placeholder="Mot de passe"
                       name="conf_password">
            </div>
            <button type="submit" class="btn btn-success">Valider inscription</button>
        </form>
    </div>
</div>



<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Views/footer.php'
?>