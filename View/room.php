<!--
nom: Gaille
prénom:Sébastien
date:
classe: I.FDA.P3A
nom du projet: Hotel manager
-->
<?php
require_once "../Controller/controller.php";
require_once "../Model/model.php";
$mess = "";
if(filter_has_var(INPUT_POST, 'Add')){
    $mess = controlInputRoom($_POST['RoomName'],$_POST['TypeRoom'],$_POST['RoomPhone']);
 }
 if(filter_has_var(INPUT_POST, 'Delete')){
    header('location: ./room.php');
    deleteRoom($_GET['id']);
}
if(filter_has_var(INPUT_POST, 'Update')){
    updateRoom($_POST['RoomName'],$_POST['TypeRoom'],$_POST['RoomPhone'], $_GET['id'], $_POST['radioAvailable']);
}
$rooms = selectRoom();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room</title>
    <link rel="stylesheet" href="../CSS/room.css">
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
                Room
            </h2>

            <a href="#" class="link-light" id="deconnexion">se déconnecter</a>

        </div>
        <nav>
            <a href="#" class="link-light">Home</a>
            <a href="#" class="link-light">Client Manager</a>
            <a href="#" class="link-light">Reservation</a>
        </nav>
    </header>
    <main>
    <?php if($mess != ""): ?>
    <div class="alert alert-danger">
        <strong>Erreur </strong> <?=$mess?>
    </div>
    <?php endif ?>
        <form action="#" Method="POST">

<?php 
if(isset($_GET['id'])){
    $infoRooms = selectInfoRoom($_GET['id']);
    foreach($infoRooms as $infoRoom): ?>   
     <section id="section1">
     <div class="mb-3 row">
                    <label for="RoomName" class="col-sm-2 col-form-label">Room name</label>
                    <div class="col-sm-10">
                    <input name="RoomName" type="text" class="form-control" name="RoomName" value="<?=$infoRoom['numeroChambre']?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="TypeRoom" class="col-sm-2 col-form-label">Type Room</label>
                    <div class="col-sm-10">
                    <input name="TypeRoom" type="text" class="form-control" name="TypeRoom" value="<?=$infoRoom['type']?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="RoomPhone" class="col-sm-2 col-form-label">Room phone</label>
                    <div class="col-sm-10">
                    <input name="RoomPhone" type="tel" class="form-control" name="RoomPhone" value="<?=$infoRoom['telephone']?>">
                    </div>
                </div>
            </section>
        <?php endforeach; 
        }else{?>
            <section id="section1">
            <div class="mb-3 row">
                    <label for="RoomName" class="col-sm-2 col-form-label">Room name</label>
                    <div class="col-sm-10">
                    <input name="RoomName" type="text" class="form-control" name="RoomName">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="TypeRoom" class="col-sm-2 col-form-label">Type Room</label>
                    <div class="col-sm-10">
                    <input name="TypeRoom" type="text" class="form-control" name="TypeRoom">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="RoomPhone" class="col-sm-2 col-form-label">Room phone</label>
                    <div class="col-sm-10">
                    <input name="RoomPhone" type="tel" class="form-control" name="RoomPhone">
                    </div>
                </div>
            </section>

        <?php } ?> 
        
            <section id="section2">
                <div id="checkbox">
                    <div class="form-check" >
                        <input class="form-check-input" type="radio" name="radioAvailable" value = "Disponible">
                        <label class="form-check-label" for="radioAvailableyes">
                        available
                        </label>
                    </div>
                    <div class="form-check" id="chb">
                        <input class="form-check-input" type="radio" name="radioAvailable" value = "Indisponible" checked>
                        <label class="form-check-label" for="radioAvailablenot" >
                        not available
                        </label>
                    </div>
                </div>
                <article>
                    <div class="list-group">
                    <?php foreach($rooms as $room): 
                    
                        if($room['disponibilite'] == "Disponible"){
                        ?>                     
                        <a href="room.php?id=<?=$room['numeroChambre']?>" class="list-group-item list-group-item-action"><?=$room['numeroChambre']." ".$room['type']." ".$room['telephone']." ".$room['disponibilite']?></a>                  
                    <?php }else{?>
                        <a href="room.php?id=<?=$room['numeroChambre']?>" id="indispo" class="list-group-item list-group-item-action"><?=$room['numeroChambre']." ".$room['type']." ".$room['telephone']." ".$room['disponibilite']?></a>                       
                    <?php } endforeach;?>  
                    </div>
                </article>
            </section>
            <section id="section3">
            <input type="submit" class="btn btn-light text-dark" value="Add" name="Add">
            <input type="submit" class="btn btn-light text-dark" value="Delete" name="Delete">
            <input type="submit" class="btn btn-light text-dark" value="Update" name="Update">
            </section>
        </form>


    </main>

    <footer>
        made by the Dream Team
    </footer>
    
</body>
</html>