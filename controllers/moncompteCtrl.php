<?php

$formError = array();
$regexMemberName = '/^([0-9A-Za-zàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\-\s]{2,50})$/';
$regexAbouts = '/^([0-9A-Za-zàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\?\.\!\-\s]{2,500})$/';

if (!empty($_GET['id'])) {
    //ne pas oublier d'instancier l'objet
    $members = new members();
    $announces = new announces();
    //on réassigne notre attribut id ci-dessous
    //on vérifie qu'il existe dans la base de données ci-dessous
    $members->id = $_GET['id'];
    $announces->id = $_GET['id'];
    $membersCount = $members->checkIfAMemberExistsById();
    //memberExistsById = ALIAS de COUNT(`id`) dans la méthode checkIfAMemberExistsById()
    if ($membersCount->memberExistsById == 1) {
        if (isset($_POST['updateMember'])) {
            if (!empty($_POST['memberName'])) {
                if (preg_match($regexMemberName, $_POST['memberName'])) {
                    $members->memberName = htmlspecialchars($_POST['memberName']);
                    // ce else correspond au if du preg_match
                } else {
                    $formError['memberName'] = 'Le pseudo ne peut contenir que des lettres (majuscules et/ou minuscules) et des chiffres, ainsi que des tirets et/ou des espaces.';
                }
            } else {
                $formError['memberName'] = 'Veuillez saisir un pseudo s\'il vous plait';
            }
            if (!empty($_POST['password'])) {
                //renvoie un string de 60 caractères
                $members->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            } else {
                $formError['password'] = 'Veuillez saisir un mot de passe s\'il vous plait';
            }
            if (!empty($_POST['email'])) {
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $members->email = htmlspecialchars($_POST['email']);
                } else {
                    $formError['email'] = 'Veuillez saisir une adresse mail valide s\'il vous plait';
                }
            } else {
                $formError['email'] = 'Veuillez saisir votre adresse mail s\'il vous plait';
            }
            if (!empty($_POST['abouts'])) {
                if (preg_match($regexAbouts, $_POST['abouts'])) {
                    $members->abouts = htmlspecialchars($_POST['abouts']);
                } else {
                    $formError['abouts'] = 'La présentation...';
                }
            } else {
                $formError['abouts'] = 'Veuillez saisir une présentation s\'il vous plait';
            }
            if (count($formError) == 0) {
                $members->updateMemberProfile();
                $modifIsOk = 'Les modifications ont bien été prises en compte ! Youpi !';
            }else{
                $modifIsNotOk = 'Oups ! Les modifications n\'ont pas été prises en compte !';

            }
        }
        $memberProfile = $members->getMemberProfile();
        /*$announcesForAMember = $announces->getAnnouncesListByMember();
        var_dump($announcesForAMember);*/
    } else {
        header('location:index.php');
        exit;
    }
} else {
    header('location:index.php');
    exit;
}
