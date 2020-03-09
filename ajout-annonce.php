<?php
include_once 'header.php';
include_once 'modal.php';
?>


<body class="bodyAddAnnounce">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 offset-sm-4 text-center mt-2">
                <h2>Ajouter une annonce</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 mt-5 mx-auto">
                <div>
                    <label for="itemCategory"><span>Catégories</span> :</label>
                </div>
                <div class="select">
                    <select id="itemCategory" onchange="selectCategory()" name="itemCategory">
                        <option disabled selected>Catégorie de votre article</option>
                        <option value="vg" selected="selected">Jeux Vidéo</option>
                        <option value="toys">Jouets</option>
                    </select>
                </div>
                <!--Formulaire Jeux Vidéo -->
                <form action="ajout-annonce.php" method="POST">
                    <!--<div class="">-->
                    <!-- TYPE SubCAt -->
                    <!--<div>
                                <label>Type</label>
                                <select name="itemSubcategoryVG" id="itemSubcategoryVG">
                                    <option disabled selected>Sous-Catégorie Jeux Vidéo</option>
                                    <option value="system">Consoles</option>
                                    <option value="game">Jeux</option>
                                    <option value="accessory">Accessoires</option>
                                </select>
                                <select id="itemSubcategoryToy" name="itemSubcategoryToy">
                                    <option disabled selected>Sous-Catégorie Jouets</option>
                                    <option value="character">Figurines</option>
                                    <option value="diecast">Voitures Miniatures</option>
                                    <option value="other">Autres</option>
                                </select>
                            </div>-->
                    <!-- ETAT  article-->
                    <!-- <div>
                                <label>Etat</label>
                                <select name="itemConditions">
                                    <option disabled selected>Etat de votre article</option>
                                    <option value="brandNewSealed">Neuf</option>
                                    <option value="pristineCondition">Comme neuf</option>
                                    <option value="excellentCondition">Très bon état</option>
                                    <option value="goodCondition">Bon état</option>
                                    <option value="acceptableCondition">Etat correct</option>
                                    <option value="poorCondition">Etat moyen ou mauvais état</option>
                                </select>
                            </div>-->
                    <!-- COMPLETUDE article -->
                    <!--<div>
                                <label>Boite / Notice</label>
                                <select name="itemCompleteness">
                                    <option disabled selected>Complétude de votre article</option>
                                    <option value="complete">AVEC boîte ET notice</option>
                                    <option value="boxWithoutNotice">AVEC boîte SANS notice</option>
                                    <option value="noticeWithoutBox">SANS boîte AVEC Notice </option>
                                    <option value="loose">SANS boîte NI notice</option>
                                </select>
                            </div>-->
                    <!-- MARQUE article -->
                    <div class="form-group frame <?= isset($formError) ? ' has-danger' : '' ?>">
                        <label for="brands"><span>Marque</span> :</label>
                        <input class="form-control <?= isset($formError['brands']) ? 'is-invalid' : '' ?>" type="text" name="brands" id="brands" placeholder="ex : Hot Wheels" value="<?= !empty($_POST['brands']) ? $_POST['brands'] : '' ?>">
                        <?php if (isset($formError['brands'])) : ?>
                            <p class="text-danger"><?= $formError['brands'] ?></p>
                        <?php endif; ?>
                    </div>
                    <!-- MODELE article -->
                    <div class="form-group frame <?= isset($formError) ? ' has-danger' : '' ?>">
                        <label for="model"><span>Modèle</span> :</label>
                        <input class="form-control <?= isset($formError['model']) ? 'is-invalid' : '' ?>" type="text" name="model" id="model" placeholder="ex : Rodger Dodger" value="<?= !empty($_POST['model']) ? $_POST['model'] : '' ?>">
                        <?php if (isset($formError['model'])) : ?>
                            <p class="text-danger"><?= $formError['model'] ?></p>
                        <?php endif; ?>
                    </div>
                    <!-- TITRE article -->
                    <div class="form-group frame <?= isset($formError) ? ' has-danger' : '' ?>">
                        <label for="title"><span>Titre de votre annonce</span> :</label>
                        <input class="form-control <?= isset($formError['title']) ? 'is-invalid' : '' ?>" type="text" name="title" id="title" placeholder="ex : Hot Wheels Rodger Dodger de 1985" value="<?= !empty($_POST['title']) ? $_POST['title'] : '' ?>">
                        <?php if (isset($formError['title'])) : ?>
                            <p class="text-danger"><?= $formError['title'] ?></p>
                        <?php endif; ?>
                    </div>
                    <!-- DESCRIPTIF article-->
                    <div>
                        <label for="descriptive"><span>Description de votre article</span> :</label>
                        <textarea class="form-control <?= isset($formError['descriptive']) ? 'is-invalid' : '' ?>" type="text" name="descriptive" id="descriptive" placeholder="ex : Voiture miniature en loose..." value="<?= !empty($_POST['descriptive']) ? $_POST['descriptive'] : '' ?>">
                        </textarea>
                        <?php if (isset($formError['descriptive'])) : ?>
                            <p class="text-danger"><?= $formError['descriptive'] ?></p>
                        <?php endif; ?>
                    </div>
                        <!--image-->
                                <div>
                        <label for="descriptive"><span>Description de votre article</span> :</label>
                        <textarea class="form-control <?= isset($formError['descriptive']) ? 'is-invalid' : '' ?>" type="text" name="descriptive" id="descriptive" placeholder="ex : Voiture miniature en loose..." value="<?= !empty($_POST['descriptive']) ? $_POST['descriptive'] : '' ?>">
                        </textarea>
                        <?php if (isset($formError['descriptive'])) : ?>
                            <p class="text-danger"><?= $formError['descriptive'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="text-center mb-2">
                        <button type="submit" class="btn btn-warning mt-5" name="addAnnounce" id="addAnnounce">Valider votre annonce</button>
                    </div>
                    <div class="text-center mb-2 mt-5">
                        <a href="index.php" class="fas fa-plus btn btn-dark">Revenir à l'accueil</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>