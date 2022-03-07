<?php
require("connexionBD.php");

/**
 * Lis les réservations
 */
function readReservation(){
    $con =  CoToBase();
    static $ps = null;
    $sql = 'SELECT client.nomClient, client.prenomClient, reservation.roomNumber, reservation.entryDate, reservation.realeaseDate FROM `reservation` JOIN client ON reservation.id = client.idClient ;';
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
            $echo.= '<a href="#" class="list-group-item list-group-item-action">.'.$reservation['nomClient'] .' '. $reservation['prenomClient'] .', '.$reservation['roomNumber'].', '.$reservation['entryDate'] .', '. $reservation['realeaseDate'] .'</a>'; 
        
        }
      }
      
      return $echo;
      
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  
}

?>