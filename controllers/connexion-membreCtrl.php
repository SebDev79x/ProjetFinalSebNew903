<?php
session_start();
$formError = array();
//j'accepte de très nombreux caractères accentués en raison de notre société cosmopolite
$regexMemberName = '/^([0-9A-Za-zàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\-\s]{2,50})$/';
//regex à ajouter
if (isset($_POST['submitConnectMember'])) {
    $members = new members();
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $members->email = htmlspecialchars($_POST['email']);
        } else {
            $formError['email'] = 'Cette adresse mail est hélas inconnue';
        }
    } else {
        $formError['email'] = 'Veuillez saisir votre adresse mail s\'il vous plait';
    }
    if (!empty($_POST['password'])) {
        //renvoie un string de 60 caractères, un peu comme l'htmlsc
        $members->password = $_POST['password'];
    } else {
        $formError['password'] = 'Le mot de passe est incorrect';
    }
} else {
    $formError['password'] = 'Veuillez saisir un mot de passe s\'il vous plait';
}
if (count($formError) == 0) {
    // ça doit retourner un objet sinon cela signifie qu'il y a une erreur
    $membersInfo = $members->getMemberInfo();
    if (is_object($membersInfo)) {
        if (password_verify($members->password, $membersInfo->password)) {
            $_SESSION['id'] = $membersInfo->id;
            $_SESSION['memberName'] = $membersInfo->memberName;
            header('location:index.php');
            exit();
        }
    }
}

