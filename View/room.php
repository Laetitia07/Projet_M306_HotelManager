<!--
nom: Gaille
prénom:Sébastien
date:
classe: I.FDA.P3A
nom du projet: Hotel manager

-->


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
        <form action="">
            <section id="section1">
                <div class="mb-3 row">
                    <label for="RoomName" class="col-sm-2 col-form-label">Room name</label>
                    <div class="col-sm-10">
                    <input name="RoomName" type="text" class="form-control" id="RoomName">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="TypeRoom" class="col-sm-2 col-form-label">Type Room</label>
                    <div class="col-sm-10">
                    <input name="TypeRoom" type="text" class="form-control" id="TypeRoom">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="RoomPhone" class="col-sm-2 col-form-label">Room phone</label>
                    <div class="col-sm-10">
                    <input name="RoomPhone" type="tel" class="form-control" id="RoomPhone">
                    </div>
                </div>
        
            </section>
            <section id="section2">
                <div id="checkbox">
                    <div class="form-check" >
                        <input class="form-check-input" type="radio" name="radioAvailable" id="radioAvailableyes">
                        <label class="form-check-label" for="radioAvailableyes">
                        available
                        </label>
                    </div>
                    <div class="form-check" id="chb">
                        <input class="form-check-input" type="radio" name="radioAvailable" id="radioAvailablenot" checked>
                        <label class="form-check-label" for="radioAvailablenot">
                        not available
                        </label>
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
            <section id="section3">
            <button type="button" class="btn btn-outline-light">Add</button>
            <button type="button" class="btn btn-outline-light">Delete</button>
            <button type="button" class="btn btn-outline-light">Update</button>
            </section>
        </form>


    </main>

    <footer>
        made by the Dream Team
    </footer>
    
</body>
</html>