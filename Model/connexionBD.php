<?php
session_start();
require_once("define.php");

//Connexion à la base de données
function CoToBase()
{
    try {
        $serveur = HOST;
        $pseudo = USER;
        $pwd = PWD;
        $db = DBNAME;

        static $bd = null;

        if ($bd === null) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bd = new PDO("mysql:host=$serveur;dbname=$db", $pseudo, $pwd, $pdo_options);
            $bd->exec('SET CHARACTER SET utf8');
        }

        return $bd;
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}
?>