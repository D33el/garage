<?php 

if(isset($_POST['login'])){
  $login = new UserController();
  $login->Auth();
}

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Garage V. Parrot</title>
    <base href="/Assets/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/login.css" />
  </head>
  <body>
    <div class="login-wrapper">
      <div class="form-container">
        <div class="title">Bienvenue</div>
        <div class="subtitle">Veuillez vous connecter pour acceder a votre espace.</div>
        <div class="message">E-mail ou mot de passe incorrecte</div>
        <form method="POST" class="login-form">
            <div class="input-container">
                <label>E-mail / Nom d'utilisateur</label>
                <input type="text" name="username">
            </div>
            <div class="input-container">
                <label>Mot de passe</label>
                <input type="text" name="password">
            </div>
            <button type="submit" name="login">Se connecter</button>
        </form>
      </div>
      <img src="img/sten-rademaker-UZUzvJEvKnI-unsplash.jpg" alt="">
    </div>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/general.js"></script>
  <script src="js/login.js"></script>
</html>
