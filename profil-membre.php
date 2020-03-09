<?php
include_once 'models/membre.php';
include_once 'models/annonce.php';
include_once 'controllers/profil-membreCtrl.php';
include_once 'modal.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato|Sigmar+One&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="assets/css/style.css" />
        <title></title>
    </head>
    <body class="bodyMemberProfile">
        <?php include_once 'header.php'; ?>
        <div class="container-fluid">
            <div class="row" >   
                <div class="col-md-4 offset-md-4 text-center mt-2 text-dark">            
                    <h2 class="firstTitle">Profil de <?= $memberProfile->memberName ?></h2>
                    <div class="table-responsive">
                        <table class="table">
                            <!--1ère ligne du tableau, le nom des colonnes-->
                            <tr>
                                <th>Titre</th>
                                <th>Accéder à l'annonce</th>
                            </tr>
                            <!--2ème ligne avec date, nom, prénom et liens et ainsi de suite-->
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
                                <div class="col-sm-2 offset-sm-5">
                                    <input class="fas fa-plus btn btn-warning" id="updateMember" name="updateMember" type="submit" value="Modifier"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 offset-sm-5 mt-5">
                                    <!--ajouter confirmation javascript pour confirmer la suppression-->
                                    <input class="fas fa-plus btn btn-danger" id="deleteMember" name="deleteMember" type="submit" value="Supprimer"/>
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
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>