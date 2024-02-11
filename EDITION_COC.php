<?php
    require_once 'lib/database.php';
    require_once 'models/cocktail.php';

    include 'consess.php';

   // A-t'on reçu le formulaire (HTTP POST) ?
if(empty($_POST) == false)
{

    // OUI, traitement du formulaire d'édition de cocktail

    editerCocktail(
        $_POST['id'], 
        $_POST['nom'],
        $_POST['description'],
        $_POST['anneeConception'],
        $_POST['prixMoyen'], 
        $_POST['idFamille'],         // Valeur de l'<option> sélectionnée
        $_POST['ingredients']
    );
    // Les données du formulaire sont fournies dans l'ordre des arguments de la fonction

    // Redirection vers le back-office (Post-Redirect-Get)
    header('Location: indexBO.php');
}
else
{
    // NON, affichage du template de formulaire d'édition de cocktail

    // Est-ce que l'id est bien fourni dans l'URL ?
    if(array_key_exists('id', $_GET) == false)
    {
        // NON, redirection vers le back-office
        header('Location: back_office.php');
    }

    // Récupération du cocktail stocké en base de données
    $cocktail = lireCocktail($_GET['id']);

    // Récupération de toutes les familles de cocktails stockées en base de données
    $famillesCocktails = listerFamillesCocktails();

    $listIngredient = listerIngredient();

    $listIngredientCocktail = listIngredientCocktail($_GET['id']);
    $tabIngredientCocktail = array();
    foreach($listIngredientCocktail as $row){
        array_push($tabIngredientCocktail, $row['idIngredient']);
    }
        include ('templates/EditCoc.phtml');    
    }


?>