<?php

session_start();

if(!isset($_SESSION['idUser'])){
    header("location:login.php");
}else{
    if($_SESSION['idUser'] != 1){
        header("location:login.php");
    }
}

?>