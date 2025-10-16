<?php

namespace Config;

use PDO;
use Exception;

class Database
{
    static function getConnection()
    {
        try {
            // Connexion à la base
            $pdo = new PDO(
                "mysql:host=database;dbname=todolistdb;charset=utf8",
                "root",
                "admin"
            );
            


        } catch (Exception $e) {
            // Gestion d'erreur
            die("Erreur de connexion ❌ : " . $e->getMessage());
        };
        return $pdo;
    }
}