<?php 
require_once "../Controller/controller.php";
require_once "../Model/model.php";
$mess = "";
if(filter_has_var(INPUT_POST, 'Add')){
   $mess = controlInputClient($_POST['Nom'],$_POST['Prenom'],$_POST['Telephone'],$_POST['Adresse'],$_POST['Pays']);
}
if(filter_has_var(INPUT_POST, 'Delete')){
    header('location: ./client.php');
    deleteClient($_GET['id']);
}
if(filter_has_var(INPUT_POST, 'Update')){
    updateClient($_POST['Nom'],$_POST['Prenom'],$_POST['Telephone'],$_POST['Adresse'],$_POST['Pays'],$_GET['id']);
}

$clients = selectClient();
if (isset($_GET['id'])) {
    $infoClients = selectInfoClient($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sticky-footer-navbar/">
    <link rel="stylesheet" href="../CSS/css.css">
    <!-- lien ou on va pouvoir obtenir les styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <header>
        <div id="titre">
            <h1>
                Hotel Manager
            </h1>
            <!-- le h2 est sensé être modifié par un require qui va servir à determiner sur quelle page on se trouve  -->
            <h2>
                Clients
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

<form action="#" method="POST">
<?php 
if(isset($_GET['id'])){
    $infoClients = selectInfoClient($_GET['id']);
    foreach($infoClients as $infoClient): ?>
    
     <section id="section1">
        <div class="form-group my-3">
            <label for="inputPrenom">First Name : </label>
            <input type="text" class="form-control" name="Prenom" placeholder="prenom" value="<?=$infoClient['prenom']?>">
        </div>
        <div class="form-group my-3">
            <label for="inputNom">Last Name : </label>
            <input type="text" class="form-control" name="Nom" placeholder="nom" value="<?=$infoClient['nom']?>">
        </div>
        <div class="form-group my-3">
            <label for="inputTel">Phone : </label>
            <input type="tel" class="form-control" name="Telephone" placeholder="telephone" value="<?=$infoClient['telephone']?>">
        </div>
        <div class="form-group my-3">
            <label for="inputAdresse">Adress : </label>
            <input type="text" class="form-control" name="Adresse" placeholder="adresse" value="<?=$infoClient['adresse']?>">
        </div>
        <div class="form-group my-3">
            <label for="inputPays">Country: </label>
            <input type="text" class="form-control" name="Pays" placeholder="pays" value="<?=$infoClient['pays']?>">
        </div>
    </section>
<?php endforeach; 
}else{?>
    <section id="section1">
        <div class="form-group my-3">
            <label for="inputNom">First Name : </label>
            <input type="text" class="form-control" name="Prenom" placeholder="prenom">
        </div>
        <div class="form-group my-3">
            <label for="inputPassword">Last Name : </label>
            <input type="text" class="form-control" name="Nom" placeholder="nom">
        </div>
        <div class="form-group my-3">
            <label for="inputPassword">Phone : </label>
            <input type="tel" class="form-control" name="Telephone" placeholder="telephone">
        </div>
        <div class="form-group my-3">
            <label for="inputPassword">Adress : </label>
            <input type="text" class="form-control" name="Adresse" placeholder="adresse">
        </div>
        <div class="form-group my-3">
            <label for="inputPassword">Country: </label>
            <input type="text" class="form-control" name="Pays" placeholder="pays">
        </div>
    </section>

<?php } ?> 

    <section id="section2">
        <article>
            <div class="list-group">
            <?php foreach($clients as $client): ?>
                <a href="client.php?id=<?=$client['idClients']?>" class="list-group-item list-group-item-action"><?=$client['nom']." ".$client['prenom']." ".$client['telephone']." ".$client['adresse']." ".$client['pays']?></a>
                <br>
            <?php endforeach;?>  
            </div>
        </article>
    </section> 

    <section id="section3">
        <div class="col-md d-inline">
            <input type="submit" class="btn btn-light text-dark" value="Add" name="Add">
        </div>
        <div class="col-md d-inline">
            <input type="submit" class="btn btn-light text-dark" value="Delete" name="Delete">
        </div>
        <div class="col-md d-inline">
            <input type="submit" class="btn btn-light text-dark" value="Update" name="Update">
        </div>
    </section>
    </form>
    </main>

    <footer>
        made by the Dream Team
    </footer> 
</body>
</html>