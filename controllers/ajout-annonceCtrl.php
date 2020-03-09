<?php

$regexName = '/^([A-Za-zàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\-\s]{2,35})$/';
$regexBrands = '/^([0-9A-Za-zàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\?\.\!\-\s]{2,500})$/';

//$regexHour factorisée = '/^(([0|1][0-9])|([2][0-3]))[:]([0-5][0-9])$/';
$formError = array();

if (isset($_POST['addAnnounce'])) {
    
}
    if (!empty($_POST['brands'])) {
        $announces = new announces();
        if (preg_match($regexBrands, $_POST['brands'])) {
            $announces->brands = htmlspecialchars($_POST['brands']);
        } else {
            $formError['brands'] = 'Le nom de la marque ne peut contenir que des lettres (majuscules et/ou minuscules), des chiffres, des tirets et/ou des espaces.';
            $class['brands'] = 'is-invalid';
        }
    } else {
        $formError['brands'] = 'Veuillez saisir une marque s\'il vous plait';
        $class['brands'] = 'is-invalid';
    }
        if (!empty($_POST['model'])) {
        if (preg_match($regexBrands, $_POST['model'])) {
            $announces->model  = htmlspecialchars($_POST['model']);
            $class['model'] = 'is-valid';
        } else {
            $formError['model'] = 'Le nom du modèle ne peut contenir que des lettres (majuscules et/ou minuscules), des chiffres, des tirets et/ou des espaces.';
            $class['model'] = 'is-invalid';
        }
    } else {
        $formError['model'] = 'Veuillez saisir un modèle ou un type (console, jeu, accessoire) s\'il vous plait';
        $class['model'] = 'is-invalid';
    }
            if (!empty($_POST['title'])) {
        if (preg_match($regexBrands, $_POST['title'])) {
            $announces->title  = htmlspecialchars($_POST['title']);
            $class['title'] = 'is-valid';
        } else {
            $formError['title'] = 'Le titre de votre annonce ne peut contenir que des lettres (majuscules et/ou minuscules), des chiffres, des tirets et/ou des espaces.';
            $class['title'] = 'is-invalid';
        }
    } else {
        $formError['title'] = 'Veuillez ajouter un titre à votre annonce s\'il vous plait';
        $class['title'] = 'is-invalid';
    }
             if (!empty($_POST['descriptive'])) {
        if (preg_match($regexBrands, $_POST['descriptive'])) {
            $announces->descriptive  = htmlspecialchars($_POST['descriptive']);
            $class['descriptive'] = 'is-valid';
        } else {
            $formError['descriptive'] = 'Le descriptif de votre annonce ne peut contenir que des lettres (majuscules et/ou minuscules), des chiffres, des tirets et/ou des espaces.';
            $class['descriptive'] = 'is-invalid';
        }
    } else {
        $formError['descriptive'] = 'Veuillez ajouter un descriptif à votre annonce s\'il vous plait';
        $class['descriptive'] = 'is-invalid';
    }
               if (!empty($_POST['nameImage'])) {
        if (preg_match($regexBrands, $_POST['descriptive'])) {
            $announces->descriptive  = htmlspecialchars($_POST['descriptive']);
            $class['descriptive'] = 'is-valid';
        } else {
            $formError['descriptive'] = 'Le descriptif de votre annonce ne peut contenir que des lettres (majuscules et/ou minuscules), des chiffres, des tirets et/ou des espaces.';
            $class['descriptive'] = 'is-invalid';
        }
    } else {
        $formError['descriptive'] = 'Veuillez ajouter un descriptif à votre annonce s\'il vous plait';
        $class['descriptive'] = 'is-invalid';
    }
    