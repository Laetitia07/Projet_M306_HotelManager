<?php
require("connexionBD.php");

/**
 * Lis les réservations
 */
function readreservations(){
    $con =  CoToBase();
    static $ps = null;
    $sql = 'SELECT reservations.idReservation, clients.nom, clients.prenom, reservations.numeroChambre, reservations.dateEntree, reservations.dateSortie FROM `reservations` JOIN client ON reservations.idReservation = client.client_idClient ;';
    if ($ps == null) {
      $ps = $con->prepare($sql);
    }
    try {
      $ps->execute();
      if($ps->rowCount() == 0){
        echo "pas de reservations";
      }else{
        $reservationss = $ps->fetchAll();
        $echo='';
        foreach ($reservationss as $reservations) {
            $echo.= '<input type="button" class="list-group-item list-group-item-action" onclick="tableauClick('.$reservations['id'].')" id="'.$reservations['idReservation'].'" name="reservations" value="'.$reservations['nom'] .' '. $reservations['prenom'] .', '.$reservations['numeroChambre'].', '.$reservations['dateEntree'] .', '. $reservations['dateSortie'] .'">'; 
            
        }
      }
      
      return $echo;
      
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  
}

/**
 * trouve une réservation
 */
function findreservations($id){
  $con =  CoToBase();
  static $ps = null;
  $sql = 'SELECT clients.nom, clients.prenom, reservations.numeroChambre, reservations.dateEntree, reservations.dateSortie FROM `reservations` JOIN client ON reservations.id = client.idClient WHERE reservations.idReservation = :ID;';
  if ($ps == null) {
    $ps = $con->prepare($sql);
  }
  try {
    $ps->execute();
    if($ps->rowCount() == 0){
      echo "pas de reservations";
    }else{
      $ps->execute(
        array(
            ':ID' => $id,
        )
    );
      $reservationss = $ps->fetchAll();
      $echo='';
      foreach ($reservationss as $reservations) {
          $echo.= '<input type="button" class="list-group-item list-group-item-action" onclick="tableauClick('.$reservations['id'].')" id="'.$reservations['id'].'" name="reservations" value="'.$reservations['nom'] .' '. $reservations['prenom'] .', '.$reservations['numeroChambre'].', '.$reservations['dateEntree'] .', '. $reservations['dateSortie'] .'">'; 
          
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
            $echo.= '<option value="'.$client['idClient'].'">'.$client['nom'].' '.$client['prenom'].'</option>'; 
        
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
        echo "pas de chambres";
      }else{
        $chambres = $ps->fetchAll();
        $echo='';
        foreach ($chambres as $chambre) {
            $echo.= '<option value="'.$chambre['numeroChambre'].'">'.$chambre['numeroChambre'].'</option>'; 
        
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
function InsertResa($dateEntree, $dateSortie, $idClient, $numeroChambre){
  try {
    $bd = CoToBase();
    $requete = $bd->prepare("INSERT INTO `reservations`(`idreservations`, `dateEntree`, `dateSortie`, `id`, `numeroChambre`) VALUES( NULL, :Entry, :Realease, :Idclient, :numeroChambre)");

    $requete->execute(
        array(
            ':Entry' => $dateEntree,
            ':Realease' => $dateSortie,
            ':Idclient' => $idClient,
            ':numeroChambre' => $numeroChambre,
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
function controlInputInsert($dateEntree, $dateSortie, $idClient, $numeroChambre){
    
    $error = "";
    if (isset($dateEntree) && !empty($dateEntree) && isset($idClient) && !empty($idClient) && isset($numeroChambre) && !empty($numeroChambre)) {
        $nom = filter_var($dateEntree,);
        $prenom = filter_var($dateSortie, );
        $Telephone = filter_var($idClient, FILTER_SANITIZE_NUMBER_INT);
        $Adresse = filter_var($numeroChambre, FILTER_SANITIZE_STRING);
       
        if (checkDoubleResa($dateEntree, $dateSortie, $idClient, $numeroChambre)) {     

            InsertResa($dateEntree,$dateSortie,$idClient,$numeroChambre);
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
function checkDoubleResa($dateEntree, $dateSortie, $idClient, $numeroChambre){

  $estOk = true;
  try {
      $bd = CoToBase();
      $requete = $bd->query('SELECT reservations.id, reservations.numeroChambre, reservations.dateEntree, reservations.dateSortie FROM `reservations`;');

      while ($donnee = $requete->fetch()) {
          if ($dateEntree == $donnee['dateEntree'] || $dateSortie == $donnee['dateSortie'] || $idClient == $donnee['id'] || $numeroChambre == $donnee['numeroChambre']) {
            $estOk = false;
          }
      }
      return $estOk;
  } catch (Exception $e) {
      echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
}

/**
 * Supprime la réservation sélectionner
 */
function deleteResa($idreservations){
  try {
    $bd = CoToBase();
    $requete = $bd->prepare("DELETE FROM `reservations` WHERE idreservations = :ID");

    $requete->execute(
        array(
            ':ID' => $idreservations,
        )
    );
    
    echo"alert('Réservation supprimé');";
    
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
}

?>
