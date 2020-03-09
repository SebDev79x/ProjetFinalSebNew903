<?php
include_once 'header.php';
include_once 'models/membre.php';
include_once 'models/annonce.php';
include_once 'controllers/liste-annoncesCtrl.php';
include_once 'controllers/liste-membresCtrl.php';
include_once 'modal.php';
?>

    <body class="bodyMembersList">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 offset-sm-4 text-center mt-2">
                <h2>Liste des membres</h2>
            </div>
        </div>
    </div>
        <div class="container-fluid">
            <div class="row" >   
                <div class="search mx-auto mt-2">            
                    <form action="liste-membres.php" method="POST"> 
                        <div class="text-center d-flex justify-content-center">
                            <input type="search" class="form-control" placeholder="Rechercher un membre..." name="search" id="search" />
                        </div>
                        <div class="text-center d-flex justify-content-center">
                            <button type="submit"  name="searchMember" id="searchMember" class="mt-2 btn btn-warning">Valider</button>
                        </div>
                    </form>                
                </div>
            </div>
            
            <div class="row" >   
                <div class="table-responsive mt-5">
                    <table class="table">
                        <tr>
                            <th class="firstTh">Pseudo du membre</th>
                            <th>Profil</th>
                            <th>Annonce(s)</th>

                        </tr>
                        <?php foreach ($listMembers as $member) : ?>
                            <tr>
                                <td class="firstTd"><?= $member->memberName ?></td>
                                <td><a href="profil-membre.php?id=<?= $member->id ?>"><i class="fas fa-plus btn btn-warning">Accès au profil</i></a></td>
                                <td><a href="profil-membre.php?id=<?= $member->announces ?>"><i class="fas fa-plus btn btn-warning">Accès aux annonces</i></a></td>

                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-center mb-2">
            <a href="index.php" class="fas fa-plus btn btn-dark">Revenir à l'accueil</a>
        </div>
        <div class="d-flex justify-content-between my-1">
            <?php if ($currentPage > 1) { ?>
                <a href="liste-membres.php?page=<?= $currentPage - 1 ?>" class="btn btn-success">Page Précédente</a>
            <?php } for ($infPages = 3; $infPages >= 1; $infPages--) { ?>
                <?php if ($currentPage - $infPages >= 1) { ?><a href="liste-membres.php?page=<?= $currentPage - $infPages ?>" class="btn btn-default"><?= $currentPage - $infPages; ?></a><?php } ?>
            <?php } ?>
            <a href="liste-membres.php?page=<?= $currentPage ?>" class="btn btn-warning"><?= $currentPage; ?></a>
            <?php for ($supPages = 1; $supPages <= 3; $supPages++) { ?>
                <?php if ($currentPage + $supPages <= ceil($paginationPages['numberPages'])) { ?><a href="liste-membres.php?page=<?= $currentPage + $supPages ?>" class="btn btn-default"><?= $currentPage + $supPages; ?></a><?php } ?>
            <?php } ?>
            <?php if ($currentPage < $paginationPages['numberPages']) { ?>
                <a href="liste-membres.php?page=<?= $currentPage + 1 ?>" class="btn btn-success">Page Suivante</a>
            <?php } ?>
        </div>
        <?php include_once 'footer.php'; ?>
