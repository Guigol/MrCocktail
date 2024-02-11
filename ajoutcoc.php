<?php

require_once 'lib/database.php';
require_once 'models/cocktail.php';


// A-t'on reçu le formulaire (HTTP POST) ?
if(empty($_POST) == false)
{
    // OUI, traitement du formulaire d'ajout de cocktail

    /*
     * Partie 1 : traitement de l'upload de la photo du cocktail
     */

    $urlPhoto = null;
    if(array_key_exists('urlPhoto', $_FILES) == true)
    {
        // Est-ce que l'upload du fichier s'est bien passé ?
        if($_FILES['urlPhoto']['error'] == UPLOAD_ERR_OK)
        {
            // OUI, est-ce que le fichier uploadé est bien une image JPEG ?
            if($_FILES['urlPhoto']['type'] == 'image/jpeg')
            {
                /*
                 * OUI, déplacement du fichier uploadé d'un répertoire temporaire du serveur vers son emplacement
                 * final, le répertoire des images de l'application
                 */

                 /*
                 * Utilisation de la fonction basename() pour récupérer de manière sûre juste un nom de fichier :
                 * https://www.php.net/manual/fr/function.basename.php
                 */
                $photoFileName = basename($_FILES['urlPhoto']['name']);

                /*
                 * Le nom de fichier original de l'utilisateur est peut-être déjà existant sur le serveur, 
                 * on ne peut pas se permettre d'écraser quoique ce soit donc il faut créer un nouveau nom de 
                 * fichier final.
                 *
                 * Un moyen simple est de se servir de la fonction uniqid() qui génère des valeurs uniques en 
                 * se basant sur la date et l'heure courante :
                 * https://www.php.net/manual/fr/function.uniqid
                 */
                $photoFileName = uniqid() . "-$photoFileName";

                /*
                 * Construction de la chaîne contenant la destination finale du fichier uploadé :
                 * - Utilisation de la constante magique __DIR__ pour récupérer le répertoire exact (on
                 *   parle de chemin absolu) du fichier PHP dans lequel nous sommes :
                 *   https://www.php.net/manual/fr/language.constants.predefined.php
                 * - Concaténation avec le répertoires des images de l'application
                 * - Concaténation avec le nom de fichier final
                 */
                $destination = __DIR__ . "/deco/images/cocktails/$photoFileName";

                // Déplacement sur le serveur du fichier uploadé vers sa destination finale.
                if(move_uploaded_file($_FILES['urlPhoto']['tmp_name'], $destination) == true)
                {
                    /*
                     * L'upload s'est totalement bien passé, stockage du nom de fichier final
                     * en tant qu'URL de la photo dans la base de données.
                     */
                    $urlPhoto = $photoFileName;
                }
                // https://www.php.net/manual/fr/function.move-uploaded-file.php
            }

            /*
             * Liste des codes d'erreurs possibles pour l'upload :
             * https://www.php.net/manual/fr/features.file-upload.errors.php
             */
        }

        /*
         * Documentation de la variable $_FILES :
         * https://www.php.net/manual/fr/features.file-upload.post-method.php
         */
    }


    /*
     * Partie 2 : enregistrement du cocktail en base de données
     */

     ajouterCocktail(
        $_POST['nom'],
        $_POST['description'],
        $urlPhoto,
        $_POST['anneeConception'],
        $_POST['prixMoyen'], 
        $_POST['idFamille']         // Valeur de l'<option> sélectionnée
    );
    // Les données du formulaire sont fournies dans l'ordre des arguments de la fonction

    // Redirection vers la page d'accueil (Post-Redirect-Get)
    header('Location: index.php');
}
else
{
    // NON, affichage du template de formulaire d'ajout de cocktail

    // Récupération de toutes les familles de cocktails stockées en base de données
    $famillesCocktails = listerFamillesCocktails();
    
    
    
   

    include 'templates/ajout_cocktail.phtml';
}

