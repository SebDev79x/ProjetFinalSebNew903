<?php
include_once 'controllers/headerCtrl.php';
include_once 'modal.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Chewy|Chicle|Patrick+Hand+SC|Spectral|Trade+Winds&display=swap" rel="stylesheet">
    <title>Val'€stim</title>
</head><!-- Bloc contenant NavBar et input recherche avec bouton (membres et articles par la suite) -->
<!--  sticky top ???-->
<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-company-red">
    <a class="navbar-brand" href="index.php"><span class="valestim">Val'<span class="€">€</span>stim</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <?php if (!isset($_SESSION['memberName'])) : ?>
                <li class="nav-item active">
                    <a class="nav-link" href="ajout-membre.php">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="connexion-membre.php">Connexion</a>
                </li>
            <?php else : ?>
               
                <li class="nav-item">
                    <a class="nav-link" href="?action=disconnect">Se déconnecter</a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="ajout-annonce.php">Ajouter une annonce</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="liste-annonces.php">Voir les dernières annonces</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="liste-membres.php">Rechercher un membre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="moncompte.php">Mon compte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="annonceMembre.php">Une annonce-type</a>
                </li>
        <button id="who" class="fas fa-plus btn-xs btn-warning">Qui sommes-nous ?</button>

    </div>
</nav>
<p><?= isset($_SESSION['memberName']) ? 'Bienvenue ' . $_SESSION['memberName'] : '' ?></p>