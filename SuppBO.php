<?php

    // Chargement des autres programmes PHP dont on dépend.
    //import mon fichier pour l'utiliser par la suite
    require_once 'lib/database.php';
    require_once 'models/cocktail.php';
    
    // Est-ce que l'id est bien fourni dans l'URL ?
    if(array_key_exists('id', $_GET) == true)
    {
        // OUI, suppression du cocktail spécifié par l'id
        supprimerCocktail($_GET['id']);
    }

    
    header("location:indexBO.php");

   //supression de la photo
   $cocktail = listFamily($id);
   if(is_file(__DIR__."/www/images/cocktails/",$coctail['urlPhoto'])){
       unlink(__DIR__."/www/images/cocktails/",$coctail['urlPhoto']);
   }

    