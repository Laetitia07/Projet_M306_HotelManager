<?php
require("connexionBD.php");

/**
 * Lis les réservations
 */
function readReservation(){
    $con =  CoToBase();
    static $ps = null;
    $sql = 'SELECT reservation.id, client.nomClient, client.prenomClient, reservation.roomNumber, reservation.entryDate, reservation.realeaseDate FROM `reservation` JOIN client ON reservation.id = client.idClient ;';
    if ($ps == null) {
      $ps = $con->prepare($sql);
    }
    try {
      $ps->execute();
      if($ps->rowCount() == 0){
        echo "pas de reservation";
      }else{
        $reservations = $ps->fetchAll();
        $echo='';
        foreach ($reservations as $reservation) {
            $echo.= '<a href="#" class="list-group-item list-group-item-action" onclick="tableauClick("'.$reservation['id'].'")" id="'.$reservation['id'].'">'.$reservation['nomClient'] .' '. $reservation['prenomClient'] .', '.$reservation['roomNumber'].', '.$reservation['entryDate'] .', '. $reservation['realeaseDate'] .'</a>'; 
        
        }
      }
      
      return $echo;
      
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  
}

/**
 * Liste des clients
 */
function readClients(){
  $con =  CoToBase();
    static $ps = null;
    $sql = 'SELECT * FROM client;';
    if ($ps == null) {
      $ps = $con->prepare($sql);
    }
    try {
      $ps->execute();
      if($ps->rowCount() == 0){
        echo "pas de clients";
      }else{
        $clients = $ps->fetchAll();
        $echo='';
        foreach ($clients as $client) {
            $echo.= '<option value="'.$client['idClient'].'">'.$client['nomClient'].' '.$client['prenomClient'].'</option>'; 
        
        }
      }
      
      return $echo;
      
    } catch (Exception $e) {
      echo $e->getMessage();
    }
}

/**
 * Liste des chambres
 */
function readChambres(){
  $con =  CoToBase();
    static $ps = null;
    $sql = 'SELECT * FROM chambre;';
    if ($ps == null) {
      $ps = $con->prepare($sql);
    }
    try {
      $ps->execute();
      if($ps->rowCount() == 0){
        echo "pas de clients";
      }else{
        $chambres = $ps->fetchAll();
        $echo='';
        foreach ($chambres as $chambre) {
            $echo.= '<option value="'.$chambre['roomNumber'].'">'.$chambre['roomNumber'].'</option>'; 
        
        }
      }
      
      return $echo;
      
    } catch (Exception $e) {
      echo $e->getMessage();
    }
}
/**
 * Ajoute une réservation
 */
function Insert(){

}

?>