<?php

    if(
        isset($_POST) &&
        !empty($_POST['login']) &&
        !empty($_POST['password'])
    ){

        if($_POST['login'] == 'Admin' && $_POST['password'] = 'Admine123'){
            session_start();
            $_SESSION['idUser'] = 1;
            header('location:index.php');
        }else{
            echo 'Erreur identifiant mot de passe faux';
            include 'templates/login.phtml';
        }

    }else{
        include 'templates/login.phtml';
    }

    
?>