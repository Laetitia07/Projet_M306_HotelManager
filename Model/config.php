<?php
require('connexionBD.php');

function login($ident, $mdp){

static $ps = null;
$stm = 'SELECT idAdmin FROM admin WHERE login=:USER AND mdp=:MDP';
//$stm .= 'FROM admin';
//$stm .= 'WHERE login= :USER AND mdp= :MDP';

if ($ps == null) {
    $ps = CoToBase()->prepare($stm);
}
$answer = "";

try {
    $ps->bindParam(':USER', $ident, PDO::PARAM_STR);
    $ps->bindParam('MDP', $mdp, PDO::PARAM_STR);

    $answer = $ps->execute();
    
    if ($ps->rowCount() == 0) {
        $answer = "No result";
    }
    else{
        $answer = $ps->fetch()['idAdmin'];
    }
} catch (Exception $th) {
    echo $th->getMessage();
}
return $answer;
}
?>