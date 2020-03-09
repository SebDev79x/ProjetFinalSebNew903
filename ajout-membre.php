<?php
include_once 'header.php';
include_once 'modal.php';
include_once 'models/membre.php';
include_once 'controllers/ajout-membreCtrl.php';
?>

<body class="bodyAddMember">
    <div class="container-fluid">
        <div class="col">
            <div class="row">
                <?php if (isset($memberIsRegistered)) : ?>
                    <div class="col-lg-4 mx-auto mt-2 alert alert-warning">
                        <p class="text-center"><?= $memberIsRegistered ?></p>
                    </div>
                <?php elseif (isset($memberIsAlreadyRegistered)) : ?>
                    <div class="col-lg-4 mx-auto mt-2 alert alert-danger">
                        <p class="text-center"><?= $memberIsAlreadyRegistered ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 offset-sm-4 text-center mt-2">
                <h2>Inscription</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 offset-sm-4 mt-5">
                <form action="#" method="POST">
                    <!-- Input memberName formulaire-->
                    <div class="form-group">
                        <label class="form-control-label" for="memberName">Choisissez un pseudo : </label>
                        <input class="form-control <?= isset($class['memberName']) ? $class['memberName'] : '' ?>" name="memberName" id="memberName" placeholder="ex : CatMan" type="text" value="<?= !empty($_POST['memberName']) ? $_POST['memberName'] : '' ?>" />
                        <?php if (isset($formError['memberName'])) {
                        ?><p class="text-danger"><?= $formError['memberName'] ?></p>
                        <?php } ?>
                    </div>
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
                        <label class="form-control-label" for="password">Choisissez un mot de passe : </label>
                        <input class="form-control <?= isset($class['password']) ? $class['password'] : '' ?>" name="password" id="password" type="text" value="<?= !empty($_POST['password']) ? $_POST['password'] : '' ?>" />
                        <?php if (isset($formError['password'])) {
                        ?><p class="text-danger"><?= $formError['password'] ?></p>
                        <?php } ?>
                    </div>
                    <!-- 10 Input about formulaire-->
                    <div class="form-group">
                        <label class="form-control-label" for="abouts">Nous vous invitons à vous présenter :</label>
                        <textarea class="form-control <?= isset($class['abouts']) ? $class['abouts'] : '' ?>" name="abouts" id="abouts" placeholder="Collectionneur depuis..." type="text"><?= !empty($_POST['abouts']) ? $_POST['abouts'] : '' ?></textarea>
                        <?php if (isset($formError['abouts'])) {
                        ?><p class="text-danger"><?= $formError['abouts'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-4 offset-sm-5">
                                <input class="fas fa-plus btn btn-warning" id="submitAddMember" name="submitAddMember" type="submit" value="S'inscrire" />
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