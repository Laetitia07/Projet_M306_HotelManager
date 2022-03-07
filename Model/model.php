<?php
require_once "connexionBD.php";
function addRoom($type, $telephone){
    try {
        $bd = CoToBase();
        $requete = $bd->prepare("INSERT INTO chambres(`type`, `telephone`) VALUES(:type, :telephone)");

        $requete->execute(
            array(
                ':type' => $type,
                ':telephone' => $telephone,
            )
        );   
        
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}

function checkRoom($telephone){

    $estOk = true;
    try {
        $bd = CoToBase();
        $requete = $bd->query('SELECT telephone FROM chambres');

        while ($donnee = $requete->fetch()) {
            if ($telephone == $donnee['telephone']) {
                $estOk = false;
            }
        }
        return $estOk;
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}

function selectRoom(){

    try {
        $bd = CoToBase();
        $requete = $bd->query("SELECT * FROM chambres");
        $requete->execute();   
        return $requete->fetchAll();
          
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}
function selectInfoRoom($id){
    try {
        $bd = CoToBase();
        $requete = $bd->prepare("SELECT * FROM chambres WHERE numeroChambre = :idRoom");
        $requete->execute(
            array(
                ':idRoom' => $id,
            )
        );   
        return $requete->fetchAll();
          
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}

function deleteRoom($id){
    try {
        $bd = CoToBase();
        $requete = $bd->prepare("DELETE FROM `chambres` where numeroChambre = :id");

        $requete->execute(
            array(
                ':id' => $id,
            )
        );
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}

function updateRoom($type, $telephone, $idRoom){

    try {
        $bd = CoToBase();
        $requete = $bd->prepare("UPDATE chambres SET type = :typeChambre, telephone = :telephone WHERE numeroChambre = :idRoom");
        $requete->execute(
            array(
                ':typeChambre' => $type,
                ':telephone' => $telephone,
                ':idRoom' => $idRoom,
            )
        );     

    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}

?>