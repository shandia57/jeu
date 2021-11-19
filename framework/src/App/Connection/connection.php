<?php

function getConnection()
{
    try {
        $connection = new PDO('mysql:host=localhost; dbname=hoffma183u_lpphp', 'root', '');
    } catch (PDOException $e) {
        echo "Connexion à la base de données impossible. Vérifier que les identifiants existent et que la base de données aussi !";
    }
    return $connection;
}