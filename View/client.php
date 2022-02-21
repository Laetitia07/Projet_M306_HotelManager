<?php 
require_once "../Controller/controller.php";
require_once "../Model/model.php";
$mess = "";
if(filter_has_var(INPUT_POST, 'Add')){
   $mess = controlInputClient($_POST['Nom'],$_POST['Prenom'],$_POST['Telephone'],$_POST['Adresse'],$_POST['Pays']);
}
if(filter_has_var(INPUT_POST, 'Delete')){
    
}
if(filter_has_var(INPUT_POST, 'Update')){
    updateClient($_POST['Nom'],$_POST['Prenom'],$_POST['Telephone'],$_POST['Adresse'],$_POST['Pays'],1);
}
$clients = selectClient();
foreach($clients as $client){
    echo $client['nom']." ".$client['prenom']." ".$client['telephone']." ".$client['adresse']." ".$client['pays']."<br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sticky-footer-navbar/">
    <link rel="stylesheet" href="style.css">
    <!-- lien ou on va pouvoir obtenir les styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php if($mess != ""): ?>
    <div class="alert alert-danger">
        <strong>Erreur </strong> <?=$mess?>
    </div>
<?php endif ?>
<form action="#" method="POST">
        <div class="form-group my-3">
            <label for="inputNom">First Name : </label>
            <input type="text" class="form-control" name="Prenom" placeholder="Honn">
        </div>

        <div class="form-group my-3">
            <label for="inputPassword">Last Name : </label>
            <input type="text" class="form-control" name="Nom" placeholder="Password">
        </div>
        <div class="form-group my-3">
            <label for="inputPassword">Phone : </label>
            <input type="tel" class="form-control" name="Telephone" placeholder="Password">
        </div>
        <div class="form-group my-3">
            <label for="inputPassword">Adress : </label>
            <input type="text" class="form-control" name="Adresse" placeholder="Password">
        </div>
        <div class="form-group my-3">
            <label for="inputPassword">Country: </label>
            <input type="text" class="form-control" name="Pays" placeholder="Password">
        </div>


        <div class="form-group my-3">
            <div class="col-md d-inline">
                <input type="submit" class="btn btn-light text-dark" value="Add" name="Add">
            </div>
            <div class="col-md d-inline">
                <input type="submit" class="btn btn-light text-dark" value="Delete" name="Delete">
            </div>
            <div class="col-md d-inline">
                <input type="submit" class="btn btn-light text-dark" value="Update" name="Update">
            </div>
        </div>
    </form>
    
</body>
</html>