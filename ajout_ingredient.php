<?php

require_once 'lib/database.php';
require_once 'models/cocktail.php';


// A-t'on reçu le formulaire (HTTP POST) ?
if(empty($_POST) == false)
{
    // OUI, traitement du formulaire d'ajout de cocktail

    /*
     * Partie 2 : enregistrement du cocktail en base de données
     */

    ajouterIngredient(
        $_POST['nom']      // Valeur de l'<option> sélectionnée
    );
    // Les données du formulaire sont fournies dans l'ordre des arguments de la fonction

    // Redirection vers la page d'accueil (Post-Redirect-Get)
    header('Location: index.php');
}
else
{
    // NON, affichage du template de formulaire d'ajout de cocktail

    include 'templates/ajout_ingredient.phtml';
}