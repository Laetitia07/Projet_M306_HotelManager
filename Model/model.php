<?php
require_once "connexionBD.php";
function addClient($nom, $prenom, $telephone, $adresse, $pays){
    try {
        $bd = CoToBase();
        $requete = $bd->prepare("INSERT INTO clients(`nom`, `prenom`, `telephone`, `adresse`, `pays`) VALUES(:Nom, :Prenom, :Telephone, :Adresse, :Pays)");

        $requete->execute(
            array(
                ':Nom' => $nom,
                ':Prenom' => $prenom,
                ':Telephone' => $telephone,
                ':Adresse' => $adresse,
                ':Pays' => $pays,
            )
        );   
        
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}

function deleteClient($id){
    try {
        $bd = CoToBase();
        $requete = $bd->prepare("DELETE FROM `clients` where idClients = :id");

        $requete->execute(
            array(
                ':id' => $id,
            )
        );
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}

function updateClient($nom, $prenom, $telephone, $adresse, $pays, $idclient){

    try {
        $bd = CoToBase();
        $requete = $bd->prepare("UPDATE clients SET nom = :nomClient, prenom = :prenomClient, telephone = :telephoneClient, adresse = :adresseClient, pays = :paysClient WHERE idClients = :idClients");
        $requete->execute(
            array(
                ':nomClient' => $nom,
                ':prenomClient' => $prenom,
                ':telephoneClient' => $telephone,
                ':adresseClient' => $adresse,
                ':paysClient' => $pays,
                ':idClients' => $idclient,
            )
        );     

    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}

function selectInfoClient($id){
    try {
        $bd = CoToBase();
        $requete = $bd->prepare("SELECT * FROM clients WHERE idClients = :idClient");
        $requete->execute(
            array(
                ':idClient' => $id,
            )
        );   
        return $requete->fetchAll();
          
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}

function checkNomPrenomTel($nom, $prenom, $telephone){

    $estOk = true;
    try {
        $bd = CoToBase();
        $requete = $bd->query('SELECT nom, prenom, telephone FROM clients');

        while ($donnee = $requete->fetch()) {
            if ($nom == $donnee['nom']) {
                if($prenom == $donnee['prenom']){
                    if($telephone == $donnee['telephone']){
                        $estOk = false;
                    }
                }
            }
        }
        return $estOk;
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}

function selectClient(){

    try {
        $bd = CoToBase();
        $requete = $bd->query("SELECT * FROM clients");
        $requete->execute();   
        return $requete->fetchAll();
          
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}

?>