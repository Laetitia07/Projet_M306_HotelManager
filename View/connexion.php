<?php
include('../Model/config.php');

if (isset($_POST['floatingInput']) && isset($_POST['floatingPassword'])) {
  $username = filter_input(INPUT_POST, 'floatingInput');
  $mdp = filter_input(INPUT_POST, 'floatingPassword');

  if (login($username, $mdp) != "No result" && login($username, $mdp) != "") {
    header(`location:room.php`);
  } else {
    echo 'User or password invalid';
  }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Login</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="../CSS/css.css">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

</head>

<body>
  <header>

  </header>
  <main>
    <form action="#">
      <h1 class="h3 mb-3 fw-normal">Please login</h1>

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" placeholder="username">
        <label for="floatingInput">username</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
    </form>
  </main>
</body>

</html>