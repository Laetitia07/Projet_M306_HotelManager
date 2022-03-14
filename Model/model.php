<?php
require_once "connexionBD.php";
function addRoom($numeroChambre, $type, $telephone){
    try {
        $bd = CoToBase();
        $requete = $bd->prepare("INSERT INTO chambres( `type`, `telephone`,`disponibilite`,`numeroChambre`) VALUES(:type, :telephone,:dispo, :numero)");

        $requete->execute(
            array(
                ':type' => $type,
                ':telephone' => $telephone,
                ':numero' => $numeroChambre,
                ':dispo' => "Disponible",
            )
        );   
        
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}

function checkRoom($num){

    $estOk = true;
    try {
        $bd = CoToBase();
        $requete = $bd->query('SELECT numeroChambre FROM chambres');

        while ($donnee = $requete->fetch()) {
            if ($num == $donnee['numeroChambre']) {
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

function updateRoom($num,$type, $telephone, $idRoom, $dispo){

    try {
        $bd = CoToBase();
        $requete = $bd->prepare("UPDATE chambres SET type = :typeChambre, telephone = :telephone, disponibilite = :dispo ,numeroChambre = :num WHERE numeroChambre = :idRoom");
        $requete->execute(
            array(
                ':typeChambre' => $type,
                ':telephone' => $telephone,
                ':idRoom' => $idRoom,
                ':num' => $num,
                ':dispo' => $dispo,
            )
        );     

        header('location: ./room.php');

    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}

?>