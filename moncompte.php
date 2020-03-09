<?php
include_once 'header.php';
include_once 'models/membre.php';
include_once 'models/annonce.php';
include_once 'controllers/moncompteCtrl.php';
include_once 'modal.php';
?>

<body class="bodyMemberAccount">
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 offset-sm-4 text-center mt-2">
                <h2>Votre profil</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col-sm-6">
            <div class="row">
                <?php if (isset($modifIsOk)) : ?>
                    <div class="col-lg-4 mx-auto mt-2 alert alert-warning">
                        <p class="text-center"><?= $modifIsOk ?></p>
                    </div>
                <?php elseif (isset($modifIsNotOk)) : ?>
                    <div class="col-lg-4 mx-auto mt-2 alert alert-danger">
                        <p class="text-center"><?= $modifIsNotOk ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4 text-center mt-2 text-dark">
                <h2 class="firstTitle">Profil de <?= $memberProfile->memberName ?></h2>
                <div class="table-responsive">
                    <table class="table">
                        <!--1ère ligne du tableau, le nom des colonnes-->
                        <tr>
                            <th>Titre</th>
                            <th>Accéder à l'annonce</th>
                        </tr>
                        <!--2ème ligne avec infos annonce(s) et ainsi de suite-->
                        <?php foreach ($announcesForAMember as $announce) : ?>
                            <tr>
                                <td><?= $announce->title ?></td>
                                <td><a href="annonce.php?id=<?= $announce->id ?>"><i class="fas fa-plus btn btn-warning">Annonce</i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h2>Modifier le profil</h2>
                <!--action nous redirige vers la page qui traite le formulaire-->
                <form action="profil-membre.php?id=<?= $_GET['id'] ?>" method="POST">
                    <!--  Input email formulaire-->
                    <div class="form-group">
                        <label class="form-control-label" for="email">Modifier l'adresse mail :</label>
                        <input class="form-control <?= isset($class['email']) ? $class['email'] : '' ?>" name="email" id="email" placeholder="ex : john.doe@gmail.com" type="mail" value="<?= !empty($_POST['email']) ? $_POST['email'] : '' ?>" />
                        <?php if (isset($formError['email'])) {
                        ?><p class="text-danger"><?= $formError['email'] ?></p>
                        <?php } ?>
                    </div>
                    <!-- Input password formulaire-->
                    <div class="form-group">
                        <label class="form-control-label" for="password">Modifier le mot de passe : </label>
                        <input class="form-control <?= isset($class['password']) ? $class['password'] : '' ?>" name="password" id="password" type="text" value="<?= !empty($_POST['password']) ? $_POST['password'] : '' ?>" />
                        <?php if (isset($formError['password'])) {
                        ?><p class="text-danger"><?= $formError['password'] ?></p>
                        <?php } ?>
                    </div>
                    <!-- Input about formulaire-->
                    <div class="form-group">
                        <label class="form-control-label" for="abouts">Modifier la présentation :</label>
                        <textarea class="form-control <?= isset($class['abouts']) ? $class['abouts'] : '' ?>" name="abouts" id="abouts" type="text"><?= !empty($_POST['abouts']) ? $_POST['abouts'] : '' ?></textarea>
                        <?php if (isset($formError['abouts'])) {
                        ?><p class="text-danger"><?= $formError['abouts'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-2 offset-sm-5">
                                <input class="fas fa-plus btn btn-warning" id="updateMember" name="updateMember" type="submit" value="Valider les modifications" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 offset-sm-5 mt-5">
                                <!--ajouter confirmation javascript pour confirmer la suppression-->
                                <input class="fas fa-plus btn btn-danger" id="deleteMember" name="deleteMember" type="submit" value="Supprimer" />
                            </div>
                            <div class="col-sm-2 offset-sm-5 mt-5">
                                <!--ajouter confirmation javascript pour confirmer la suppression-->
                                <a href="index.php" class="fas fa-plus btn btn-dark">Revenir à l'accueil</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php' ?>