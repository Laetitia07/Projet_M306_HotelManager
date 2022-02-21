<?php 
require_once "../Controller/controller.php";
require_once "../Model/model.php";

if(filter_has_var(INPUT_POST, 'add')){
    controlInputClient($_POST['Nom'],$_POST['Prenom'],$_POST['Telephone'],$_POST['Adresse'],$_POST['Pays']);
}
if(filter_has_var(INPUT_POST, 'delete')){
    
}
if(filter_has_var(INPUT_POST, 'update')){
    
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
<form action="#" method="POST">
        <div class="form-group my-3">
            <label for="inputNom">First Name : </label>
            <input type="text" class="form-control" name="Prenom" placeholder="Honnete">
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
                <input type="submit" class="btn btn-light text-dark" value="Add" name="add">
            </div>
            <div class="col-md d-inline">
                <input type="submit" class="btn btn-light text-dark" value="Delete" name="delete">
            </div>
            <div class="col-md d-inline">
                <input type="submit" class="btn btn-light text-dark" value="Update" name="update">
            </div>
        </div>
    </form>
    
</body>
</html>