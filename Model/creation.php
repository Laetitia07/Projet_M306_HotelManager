<?php 
require("connexionBD.php");

    
  
        // //Room name, Type Room, Room phone
        // function insert($bd){
        //   //filtre l'entrée de l'utilisateur
        //   try {
        //   $roomName = filter_var($_POST["RoomName"], FILTER_VALIDATE_INT);
        //   $roomType = filter_var($_POST["TypeRoom"], FILTER_SANITIZE_STRING);
        //   $roomPhone = filter_var($_POST["RoomPhone"], FILTER_SANITIZE_STRING);
        //   $enabled = filter_var($_POST["radioAvailableyes"], FILTER_VALIDATE_BOOLEAN);
        //   $disabled = filter_var($_POST["radioAvailablenot"], FILTER_VALIDATE_BOOLEAN);
        //   $disponibilite=false;
        //   if($enabled == true && $disabled ==false){
        //     $disponibilite =true;
           
        //   }
        //   else{
        //     $disponibilite=false;
        //     }
        //   //création de la requete sql
        //   $sql = $conn->prepare("INSERT INTO chambres (numeroChambre,type,telephone,disponibilite)
        //   VALUES (:numeroChambre, :type,:telephone,disponibilite)");
        //   $sql->bindValue(':numeroChambre',$roomName);
        //   $sql->bindValue(':type',$roomType);
        //   $sql->bindValue(':telephone',$roomType);
        //   $sql->bindValue(':disponibilite',$disponibilite);
        //   //Execution de la requete
        //   $sql->execute();
        //  } catch(PDOException $e) {
        //     echo $sql . "<br>" . $e->getMessage();
        //   }
    
        // }
     





        function add($roomName, $roomType, $roomPhone, $disponibilite){
            try {
                $bd = CoToBase();
                $requete = $bd->prepare("INSERT INTO chambres(numeroChambre, type, telephone, disponibilite) VALUES(:numeroChambre, :type, :Telephone,:disponibilite)");
        
                $requete->execute(
                    array(
                        ':numeroChambre' => $roomName,
                        ':type' => $roomType,
                        ':Telephone' => $roomPhone,
                        ':disponibilite' => $disponibilite,
                        
                    )
                );
        
            } catch (Exception $e) {
                echo 'Exception reçue : ',  $e->getMessage(), "\n";
            }
        }




  



?>