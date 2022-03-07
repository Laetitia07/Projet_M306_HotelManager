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
function InsertResa($entryDate, $realeaseDate, $idClient, $roomNumber){
  try {
    $bd = CoToBase();
    $requete = $bd->prepare("INSERT INTO `reservation`(`idReservation`, `entryDate`, `realeaseDate`, `id`, `roomNumber`) VALUES( NULL, :Entry, :Realease, :Idclient, :Roomnumber)");

    $requete->execute(
        array(
            ':Entry' => $entryDate,
            ':Realease' => $realeaseDate,
            ':Idclient' => $idClient,
            ':Roomnumber' => $roomNumber,
        )
    );
    
    echo"alert('Nouvelle réservation réussi');";
    
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
}

/**
 * Controlle les input post avant d'insérer
 */
function controlInputInsert($entryDate, $realeaseDate, $idClient, $roomNumber){
    
    $error = "";
    if (isset($entryDate) && !empty($entryDate) && isset($idClient) && !empty($idClient) && isset($roomNumber) && !empty($roomNumber)) {
        $nom = filter_var($entryDate,);
        $prenom = filter_var($realeaseDate, );
        $Telephone = filter_var($idClient, FILTER_SANITIZE_NUMBER_INT);
        $Adresse = filter_var($roomNumber, FILTER_SANITIZE_STRING);
       
        if (checkDoubleResa($entryDate, $realeaseDate, $idClient, $roomNumber)) {     

            InsertResa($entryDate,$realeaseDate,$idClient,$roomNumber);
        } else {
            $error = "Une réservation indentique existe déja au nom de ce client";
        }
    } else {
        $error = "Veuillez remplir tous les champs correctement !";
    }
    return $error;
}

/**
 * Vérifie qu'une réservation identique n'existe pas déja
 */
function checkDoubleResa($entryDate, $realeaseDate, $idClient, $roomNumber){

  $estOk = true;
  try {
      $bd = CoToBase();
      $requete = $bd->query('SELECT reservation.id, reservation.roomNumber, reservation.entryDate, reservation.realeaseDate FROM `reservation`;');

      while ($donnee = $requete->fetch()) {
          if ($entryDate == $donnee['entryDate'] || $realeaseDate == $donnee['realeaseDate'] || $idClient == $donnee['id'] || $roomNumber == $donnee['roomNumber']) {
            $estOk = false;
          }
      }
      return $estOk;
  } catch (Exception $e) {
      echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
}

?>