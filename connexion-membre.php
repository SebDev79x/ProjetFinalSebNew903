<?php
include_once 'header.php';
include_once 'models/membre.php';
include_once 'controllers/connexion-membreCtrl.php';
include_once 'modal.php';
?>

    <body class="bodyConnectMember">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 offset-sm-4 text-center mt-2">
                <h2>Connexion</h2>
            </div>
        </div>
    </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 offset-sm-4 mt-5">
                    <form action="connexion-membre.php" method="POST">
                        <!--  Input email formulaire-->
                     <div class="form-group">
                            <label class="form-control-label" for="email">Votre adresse mail :</label>
                            <input class="form-control <?= isset($class['email']) ? $class['email'] : '' ?>" name="email" id="email" placeholder="ex : john.doe@gmail.com" type="mail" value="<?= !empty($_POST['email']) ? $_POST['email'] : '' ?>" />
                            <?php if (isset($formError['email'])) {
                                ?><p class="text-danger"><?= $formError['email'] ?></p>
                            <?php } ?>
                        </div>       
                        <!-- Input password formulaire-->
                           <div class="form-group">
                            <label class="form-control-label" for="password">Votre mot de passe : </label>
                            <input class="form-control <?= isset($class['password']) ? $class['password'] : '' ?>" name="password" id="password" type="text" value="<?= !empty($_POST['password']) ? $_POST['password'] : '' ?>" />
                            <?php if (isset($formError['password'])) {
                                ?><p class="text-danger"><?= $formError['password'] ?></p>
                            <?php } ?>
                        </div>
                        <!-- Input submit formulaire-->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-4 offset-sm-4">
                                    <input class="fas fa-plus btn btn-warning" id="submitConnectMember" name="submitConnectMember" type="submit" value="Se connecter" />
                                </div>
                                <div class="col-sm-4 offset-sm-4 mt-5">
                                    <a href="index.php" class="fas fa-plus btn btn-dark">Revenir à l'accueil</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php include_once 'footer.php'; ?>