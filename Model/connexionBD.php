<?php
session_start();
require "define.php";

//Connexion à la base de données
function CoToBase()
{
    static $dbc = null;

   if ($dbc == null) {
       try {
           $dbc = new PDO("mysql:host". HOST . '; port=3307; dbname='. DBNAME, USER, PWD, array(
               PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
               PDO::ATTR_PERSISTENT => true,
               PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
           ));
       } catch (Exception $th) {
           echo 'erreur : ' . $th->getMessage() . 'br />';
           echo 'N°'. $th->getCode();
           
           die("Connexion failed");
       }
   }
   return $dbc;
}
?>