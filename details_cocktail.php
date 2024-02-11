<?php

// Chargement des autres programmes PHP dont on dépend.


    //import mon fichier pour l'utiliser par la suite
    require_once 'lib/database.php';
    require_once 'models/cocktail.php';

    include 'consess.php';

    $cocktail = lireCocktail($_GET['id']);

    $ingredientsCocktail = listerIngredientCocktails($_GET['id']);
   
    

    //appel du template html pour gérer l'affichage
    include 'templates/details_cocktail.phtml';


// Récupération du cocktail stocké en base de données


// Chargement du template