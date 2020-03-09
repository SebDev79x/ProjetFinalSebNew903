<?php

//ne pas oublier d'instancier l'objet
$members = new members;


if (isset($_POST['searchMember'])) {
    if (!empty($_POST['search'])) {
        $searchArray = array();
        $searchArray['memberName'] = '%' . htmlspecialchars($_POST['search']) . '%';
        $membersList = $members->getMembersList($searchArray);
    }
} else {
    $membersList = $members->getMembersList();
}
if (isset($_POST['searchMember'])) {
    if (!empty($_POST['search'])) {
        $members->memberName = '%' . htmlspecialchars($_POST['search']) . '%';
        $membersList = $members->getMemberBySearchField();
    }
} else {
    $membersList = $members->getMembersList();
}
// Pagination, pour permettre une navigation entre les pages et rendre le tout plus fluide
$paginationPages = $members->countPaginationNumberPages();
$messagePerPage = 10;
if (isset($_GET['page'])) {
    $currentPage = htmlspecialchars(intval($_GET['page']));
} else {
    $currentPage = 1;
}
$offset = ($currentPage - 1) * 10;
$listMembers = $members->getShowMembersList($offset);




