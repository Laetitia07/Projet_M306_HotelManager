<?php
/*
*Nom Prénom : Leveque Elise, Gaille Sebastien
*Date : 28.03
*Description : Relie le client à la chambre à travers une réservation 
*/
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
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
                Réservation
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
        <form action="">
            <section id="section1">
                <div class="mb-3 row">
                    <label for="EntryDate" class="col-sm-2 col-form-label">Entry Date</label>
                    <div class="col-sm-10">
                    <input name="EntryDate" type="date" class="form-control" id="EntryDate">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="ReleaseDate" class="col-sm-2 col-form-label">Release Date</label>
                    <div class="col-sm-10">
                    <input name="ReleaseDate" type="date" class="form-control" id="ReleaseDate">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="client" class="col-sm-2 col-form-label">Client</label>
                    <div class="col-sm-10">
                    <input name="client" type="tel" class="form-control" id="client">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="RoomNumber" class="col-sm-2 col-form-label">Room Number</label>
                    <div class="col-sm-10">
                    <input name="RoomNumber" type="tel" class="form-control" id="RoomNumber">
                    </div>
                </div>
        
            </section>
            <section id="section3">
            <button type="button" class="btn btn-outline-light">Add</button>
            <button type="button" class="btn btn-outline-light">Delete</button>
            <button type="button" class="btn btn-outline-light">Update</button>
            </section>
            </form>
            <form action="" method="post">
            <section id="section2">
                <div id="checkbox">
                    <div class="form-check" >
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <article>
                <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">Room name, Type Room, Room phone</a>
                <a href="#" class="list-group-item list-group-item-action">Room name, Type Room, Room phone</a>
                <a href="#" class="list-group-item list-group-item-action">Room name, Type Room, Room phone</a>
                <a href="#" class="list-group-item list-group-item-action">Room name, Type Room, Room phone</a>
                <a class="list-group-item list-group-item-action disabled">Room name, Type Room, Room phone</a>
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