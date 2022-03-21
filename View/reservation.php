<?php
/*
*Nom Prénom : Leveque Elise, Gaille Sebastien
*Date : 28.03
*Description : Relie le client à la chambre à travers une réservation 
*/

require('../Model/modelReservation.php');

if(filter_has_var(INPUT_POST,"add")){
    controlInputInsert($_POST['EntryDate'],$_POST['ReleaseDate'],$_POST['client'],$_POST['chambre']);
}
if(filter_has_var(INPUT_POST,"delete")){
    deleteResa($_POST['idResa']);
}
if(filter_has_var(INPUT_POST,"reservation")){
    echo "coucou";
    $con =  CoToBase();
    static $ps = null;
    $sql = 'SELECT clients.nom, clients.prenom, reservations.numeroChambre, reservations.dateEntree, reservations.dateSortie FROM `reservations` JOIN clients ON reservations.idReservation = clients.idClients WHERE reservations.idReservation = :ID;';
    if ($ps == null) {
      $ps = $con->prepare($sql);
    }
    try {
      $ps->execute();
      if($ps->rowCount() == 0){
        echo "pas de reservation";
      }else{
        $ps->execute(
          array(
              ':ID' => $_POST['idResa'],
          )
      );
        $reservation = $ps->fetchAll();
        foreach ($reservation as $reservation) {
            
            $nomPrenom = $reservation['prenom'] + " " + $reservation['nom'] ;
            $entryDate = $reservation['dateEntree'];
            $realeaseDate = $reservation['dateSortie'];
            $room = $reservation['numeroChambre'];
        }
        
    }
      
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <link rel="stylesheet" href="../CSS/css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div id="titre">
            <h1>
                Hotel Manager
            </h1>
            <!-- le h2 est sensé être modifié par un require qui va servir à determiner sur quelle page on se trouve  -->
            <h2>
                Réservation
            </h2>

            <a href="#" class="link-light" id="deconnexion">se déconnecter</a>

        </div>
        <nav>
            <a href="./client.php" class="link-light">Client Manager</a>
            <a href="./reservation.php" class="link-light">Reservation</a>
            <a href="./room.php" class="link-light">Room</a>
            <a href="./deconnexion.php" class="link-light">Se deconnecter</a>
        </nav>
    </header>
    <main>
        <?php
    
        ?>

       
        <form action="#" method="POST" id="form">
            <section id="section1">
                <div class="mb-3 row">
                    <label for="EntryDate" class="col-sm-2 col-form-label">Entry Date</label>
                    <div class="col-sm-10">
                    <input name="EntryDate" type="date" class="form-control" id="EntryDate" value="<?php 
                    if(filter_has_var(INPUT_POST,"reservation")){
                        echo $realeaseDate;
                    }
                    ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="ReleaseDate" class="col-sm-2 col-form-label">Release Date</label>
                    <div class="col-sm-10">
                    <input name="ReleaseDate" type="date" class="form-control" id="ReleaseDate" value="<?php 
                    if(filter_has_var(INPUT_POST,"reservation")){
                        echo $entryDate;
                    }
                    ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="client" class="col-sm-2 col-form-label">Client</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="client" id="client">
                            <?php 
                            
                            if(filter_has_var(INPUT_POST,"reservation")){
                                echo $nomPrenom;
                            }else{
                                echo readClients();
                            }?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="RoomNumber" class="col-sm-2 col-form-label">Room Number</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="chambre" id="chambre">
                            <?php 
                            if(filter_has_var(INPUT_POST,"reservation")){
                                echo $room;
                            }else{
                                echo readChambres();
                            }
                            ?>
                    </select>
                    </div>
                </div>
        
            </section>
            <?php
      
        ?>
            <section id="section3">
            <input type="submit" id="add" name="add" class="btn btn-outline-light" value="Add">
            <input type="submit" id="delete" name="delete" class="btn btn-outline-light" value="Delete">
            <input type="submit" id="update" name="update" class="btn btn-outline-light" value="Update">
            </section>
            <!-- </form>
            <form action="#" method="POST">-->
            <section id="section2">
                <div id="checkbox">
                    <div class="form-check" >
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <article>
                <div class="list-group">
                <!-- <a href="#" class="list-group-item list-group-item-action active" aria-current="true">Room name, Type Room, Room phone</a>-->
                <?php echo readreservations() ;
                ?>
                <input type="hidden" id="idResa" name="idResa" value="">
                <script type="text/javascript">
                    function tableauClick(id){
                    document.getElementById(id).setAttribute("aria-current","true");
                    document.getElementById('idResa').setAttribute("value",id);
                    document.getElementById('form').submit();
                    }
                </script>
                </div>
                </article>
            </section>
            
            </form>
        


    </main>

    <footer>
        made by the Dream Team
    </footer>
    
</body>
</html>
