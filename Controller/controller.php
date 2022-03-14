<?php
















































require_once "../Model/model.php";//testPull
function controlInputRoom($NumChambre, $TypeChambre, $TelChambre){
    
    $error = "";
    if (isset($NumChambre) && !empty($NumChambre) && isset($TypeChambre) && !empty($TypeChambre) && isset($TelChambre) && !empty($TelChambre)) {
        $num = filter_var($NumChambre, FILTER_SANITIZE_STRING);
        $type = filter_var($TypeChambre, FILTER_SANITIZE_STRING);
        $telephone = filter_var($TelChambre, FILTER_SANITIZE_STRING);
       
        if (checkRoom($num)) {     

            addRoom($num, $type, $telephone);          
            //$_SESSION['tel'] = $Telephone;
            //$_SESSION['nom'] = $nom;    
        } else {
            $error = "Cette chambre existe déjà";
        }
    } else {
        $error = "Veuillez remplir tous les champs correctement !";
    }
    return $error;
}
?>
