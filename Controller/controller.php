<?php
//commentaire test
require_once "../Model/model.php";
function controlInputClient($monNom, $monPrenom, $monTelephone, $monAdresse, $monPays){
    
    $error = "";
    if (isset($monNom) && !empty($monNom) && isset($monPrenom) && !empty($monPrenom) && isset($monTelephone) && !empty($monTelephone) && isset($monAdresse) && !empty($monAdresse) && isset($monPays) && !empty($monPays)) {
        $nom = filter_var($monNom, FILTER_SANITIZE_STRING);
        $prenom = filter_var($monPrenom, FILTER_SANITIZE_STRING);
        $Telephone = filter_var($monTelephone, FILTER_SANITIZE_STRING);
        $Adresse = filter_var($monAdresse, FILTER_SANITIZE_STRING);
        $Pays = filter_var($monPays, FILTER_SANITIZE_STRING);
       
        if (checkNomPrenomTel($nom, $prenom, $Telephone)) {     

            addClient($nom, $prenom, $Telephone, $Adresse, $Pays);          
            $_SESSION['tel'] = $Telephone;
            $_SESSION['nom'] = $nom;    
        } else {
            $error = "Ce client existe déjà";
        }
    } else {
        $error = "Veuillez remplir tous les champs correctement !";
    }
    return $error;
}
?>