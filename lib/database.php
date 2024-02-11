<?php

    //declaration de la function
    function connectToDatabase(){

/*
     * Data Source Name = la chaîne de connexion vers MySQL
     *
     * Il faut indiquer :
     * 1- L'emplacement réseau du serveur MySQL, la plupart du temps localhost
     * 2- Si le numéro de port où se trouve MySQL n'est pas 3306 (port par défaut) il faut l'indiquer
     * 3- Le nom de la base de données où on veut se connecter
     * 4- Que les données qui transitent entre PHP et MySQL sont encodées en UTF-8
     */
    $dsn = 'mysql:host=localhost:3306;dbname=MisterCocktail;charset=utf8';

    // Nom d'utilisateur pour se connecter
    $user = 'root';

    // Mot de passe pour se connecter
    $password = '';     // Il y a un mot de passe par défaut avec MAMP
    // $password = '';      // Il n'y a pas de mot de passe par défaut avec XAMPP et WampServer

    // Connexion à la base de données en utilisant les paramètres indiqués au-dessus.
    $pdo = new PDO($dsn, $user, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $pdo->exec('SET NAMES utf8');
    // Autre moyen d'indiquer à PHP et MySQL que les données qui transitent sont encodées en UTF-8

    return $pdo;
}