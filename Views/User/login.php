<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Views/header.php';
?>


    <div class="container">
        <div class="row">
            <div class="col-md-offset-5 col-md-3">
                <div class="form-login">
                    <h4>J'ai deja un compte:</h4>
                    <form action="" method="post">
                        <div class="form-group <?php if (!empty($login_error_table['username'])) {
                            echo "has-error has-feedback";
                        } ?>">
                            <label <?php if (!empty($login_error_table['username'])) {
                                echo 'class="control-label"';
                            } ?> for="username">Nom d'utilisateur: </label>
                            <input type="text" class="form-control" id="username" placeholder="Nom d'utilisateur"
                                   name="username">
                        </div>
                        <div class="form-group <?php if (!empty($login_error_table['password'])) {
                            echo "has-error has-feedback";
                        } ?>">
                            <label <?php if (!empty($login_error_table['username'])) {
                                echo 'class="control-label"';
                            } ?> for="password">Mot de passe: </label>
                            <input type="password" class="form-control" id="password" placeholder="Mot de passe"
                                   name="password">
                        </div>

                        <button type="submit" class="btn btn-success">Se connecter</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Views/footer.php'
?>