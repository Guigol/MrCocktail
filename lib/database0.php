<?php

    //declaration de la function
    function connectToDatabase(){

        //definition des différentes variables
        $host = "localhost";
        $dbname = "MisterCocktail";
        $port = "80";
        $username = "root";
        $password = " ";

        //declaration de la chaine de connexion
        $connexion = new PDO("mysql:host=$host:$port;dbname=$dbname", $username, $password);
        

        //renvoi de l'objet de connexion
        return $connexion;
    }

    ?>