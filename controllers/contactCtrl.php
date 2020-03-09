<?php

$formError = array();
//j'accepte de très nombreux caractères accentués en raison de notre société cosmopolite
$regexMemberName = '/^([0-9A-Za-zàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\-\s]{2,50})$/';
//regex à ajouter
if (isset($_POST['submitContact'])) {
    $members = new members();
    if (!empty($_POST['memberName'])) {
        if (preg_match($regexMemberName, $_POST['memberName'])) {
            $members->memberName = htmlspecialchars($_POST['memberName']);
        } else {
            $formError['memberName'] = 'Le pseudo ne peut contenir que des lettres (majuscules et/ou minuscules) et des chiffres, ainsi que des tirets et/ou des espaces.';
        }
    } else {
        $formError['memberName'] = 'Veuillez saisir un pseudo s\'il vous plait';
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
        if (!empty($_POST['messageContact'])) {
        if (filter_var($_POST['messageContact'], FILTER_VALIDATE_EMAIL)) {
            $members->email = htmlspecialchars($_POST['messageContact']);
        } else {
            $formError['messageContact'] = 'Veuillez saisir un message valide s\'il vous plait';
        }
    } else {
        $formError['messageContact'] = 'Veuillez saisir votre message s\'il vous plait';
    }
    //créer méthode et 
}