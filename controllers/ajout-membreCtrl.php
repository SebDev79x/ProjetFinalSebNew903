<?php

$formError = array();
//j'accepte de très nombreux caractères accentués en raison de notre société cosmopolite
$regexMemberName = '/^([0-9A-Za-zàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\-\s]{2,50})$/';
$regexAbouts = '/^([0-9A-Za-zàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\?\.\!\-\s]{2,500})$/';

//regex à ajouter pour la présentation, qui doit prendre en compte certains éléments de ponctuation et les caractères alphanumériques

if (isset($_POST['submitAddMember'])) {
    $members = new members();
    if (!empty($_POST['memberName'])) {
        if (preg_match($regexMemberName, $_POST['memberName'])) {
            $members->memberName = htmlspecialchars($_POST['memberName']);
            $class['memberName'] = 'is-valid';
        } else {
            $formError['memberName'] = 'Le pseudo ne peut contenir que des lettres (majuscules et/ou minuscules) et des chiffres, ainsi que des tirets et/ou des espaces.';
            $class['memberName'] = 'is-invalid';
        }
    } else {
        $formError['memberName'] = 'Veuillez saisir un pseudo s\'il vous plait';
        $class['memberName'] = 'is-invalid';
    }
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $members->email = htmlspecialchars($_POST['email']);
            $class['email'] = 'is-valid';
        } else {
            $formError['email'] = 'Veuillez saisir une adresse mail valide s\'il vous plait';
            $class['email'] = 'is-invalid';
        }
    } else {
        $formError['email'] = 'Veuillez saisir votre adresse mail s\'il vous plait';
        $class['email'] = 'is-invalid';
    }
    if (!empty($_POST['password'])) {
        //renvoie un string de 60 caractères
        $members->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    } else {
        $formError['password'] = 'Veuillez saisir un mot de passe s\'il vous plait';
        $class['password'] = 'is-invalid';
    }
    if (!empty($_POST['abouts'])) {
        if (preg_match($regexAbouts, $_POST['abouts'])) {
            $members->abouts = htmlspecialchars($_POST['abouts']);
            $class['abouts'] = 'is-valid';
        } else {
            $formError['abouts'] = 'La présentation semble quelque peu succincte...';
            $class['abouts'] = 'is-invalid';
        }
    } else {
        $formError['abouts'] = 'Veuillez saisir une présentation s\'il vous plait';
        $class['abouts'] = 'is-invalid';
    }

    if (count($formError) == 0) {
        $membersCount = $members->checkIfAMemberExists();
        if (!$membersCount->memberExists) {
            /* memberExists = alias de Count dans la méthode */
            $members->addMember();
            $memberIsRegistered = 'Votre inscription a bien été prise en compte ! Nous vous remercions de votre inscription !';
        } else {
            $memberIsAlreadyRegistered = 'Ce membre existe déjà !';
        }
    }
}

    