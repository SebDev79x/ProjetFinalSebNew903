<?php
include_once 'header.php';
include_once 'models/membre.php';
include_once 'models/annonce.php';
include_once 'controllers/liste-annoncesCtrl.php';
include_once 'modal.php';
?>

    <body class="bodyListAnnounces">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 offset-sm-4 text-center mt-2">
                <h2>Annonces</h2>
            </div>
        </div>
    </div>
        <div class="container-fluid containerItems">
            <article class="row firstItem">
                <div class="col-sm-6 offset-sm-2 mt-5 firstItemDescription">Description de l'objet, infos membre
                </div>
                <div class="col-sm-2 mt-5 firstItemPic">Image Principale
                </div>
            </article>
            <article class="row secondItem">
                <div class="col-sm-6 offset-sm-2 mt-5 secondItemDescription">Description de l'objet, infos membre
                </div>
                <div class="col-sm-2 mt-5 secondItemPic ">Image Principale
                </div>
            </article>
            <article class="row thirdItem">
                <div class="col-sm-6 offset-sm-2  mt-5 thirdItemDescription">Description de l'objet, infos membre
                </div>
                <div class="col-sm-2 mt-5 thirdItemPic ">Image Principale
                </div>
            </article>
            <article class="row fourthItem">
                <div class="col-sm-6 offset-sm-2  mt-5 fourthItemDescription">Description de l'objet, infos membre
                </div>
                <div class="col-sm-2 mt-5 fourthItemPic">Image Principale
                </div>
            </article>
            <article class="row fifthItem">
                <div class="col-sm-6 offset-sm-2  mt-5 fifthItemDescription">Description de l'objet, infos membre
                </div>
                <div class="col-sm-2 mt-5 fifthItemPic">Image Principale
                </div>
            </article>
        </div>

        <?php include_once 'footer.php'; ?>
