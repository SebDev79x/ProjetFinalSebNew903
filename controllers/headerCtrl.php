<?php
if(isset($_GET['action'])){
    if($_GET['action'] == 'disconnect'){
        unset($_SESSION['id']);
        unset($_SESSION['memberName']);
        header('location:index.php');
        exit();
    }
}