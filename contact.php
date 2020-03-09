<?php
include_once 'header.php';
include_once 'modal.php';
include_once 'models/membre.php';
include_once 'controllers/contactCtrl.php';
?>

<body class="bodyContact">
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 offset-sm-4 text-center mt-2">
                <h2>Nous contacter</h2>
            </div>
        </div>
    </div>
    <form action="index.php" method="POST">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 offset-sm-4 mt-5">
                    <!--  Input email formulaire-->
                    <div class="form-group<?= isset($formError) ? ' has-danger' : '' ?>">
                        <label class="form-control-label" for="email">Votre adresse mail :</label>
                        <input class="form-control <?= isset($formError['email']) ? 'is-invalid' : '' ?>" name="email" id="email" placeholder="ex : john.doe@gmail.com" type="mail" value="<?= !empty($_POST['email']) ? $_POST['email'] : '' ?>" />
                        <?php if (isset($formError['email'])) {
                        ?><p class="text-danger"><?= $formError['email'] ?></p>
                        <?php } ?>
                    </div>
                    <!--  Input pseudo formulaire-->
                    <div class="form-group<?= isset($formError) ? ' has-danger' : '' ?>">
                        <label class="form-control-label" for="memberName">Votre pseudo : </label>
                        <input class="form-control <?= isset($formError['login']) ? 'is-invalid' : '' ?>" name="memberName" id="memberName" placeholder="ex : CatMan" type="text" value="<?= !empty($_POST['memberName']) ? $_POST['memberName'] : '' ?>" />
                        <?php if (isset($formError['memberName'])) {
                        ?><p class="text-danger"><?= $formError['memberName'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group<?= isset($formError) ? ' has-danger' : '' ?>">
                        <label class="form-control-label" for="messageContact">Votre message :</label>
                        <textarea class="form-control <?= isset($formError['messageContact']) ? 'is-invalid' : '' ?>" name="messageContact" id="messageContact" placeholder="Votre message ici..." type="text" /><?= !empty($_POST['messageContact']) ? $_POST['messageContact'] : '' ?></textarea>
                        <?php if (isset($formError['messageContact'])) {
                        ?><p class="text-danger"><?= $formError['messageContact'] ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2 offset-sm-4">
                        <button class="fas fa btn btn-warning" id="submitContact" name="submitContact" type="submit">Envoyer le message</button>
                    </div>
                    <div class="col-sm-4 offset-sm-4 mt-5">
                        <a href="index.php" class="fas fa-plus btn btn-dark">Revenir à l'accueil</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php include_once 'footer.php'; ?>