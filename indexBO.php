<?php

    // Chargement des autres programmes PHP dont on dépend.
    //import mon fichier pour l'utiliser par la suite
    require_once 'lib/database.php';
    require_once 'models/cocktail.php';
    
    include 'consess.php';
    
    $cocktails = listerCocktails();


    // Récupération de tous les cocktails stockés en base de données

    // Chargement du template
    include 'templates/Back_Office.phtml';