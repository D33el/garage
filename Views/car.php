<?php

if(isset($_POST['contact'])){
  $send = new contactController();
  $send->addContact();
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Garage V. Parrot</title>
  <base href="/assets/" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/general.css" />
  <link rel="stylesheet" href="css/car.css" />
</head>

<body>
  <header></header>
  <main>
    <a href="../showroom" class="back title"><i class="fa-solid fa-chevron-left"></i> Retourner au showroom</a>
    <section id="car-details">
      <div class="wrapper">
        <div class="car-name title">Porsche 911</div>
        <div class="wrap">
          <div class="group">
            <span>Année</span>
            2020
          </div>
          <div class="group">
            <span>Kilométrage</span>
            365732 Km
          </div>
          <div class="group">
            <span>Boite</span>
            Manuelle
          </div>
          <div class="group">
            <span>Couleur</span>
            Gris Nardo
          </div>
          <div class="group">
            <span>Carburant</span>
            Essence
          </div>
          <div class="group">
            <span>Moteur</span>
            1.6L TDI
          </div>
        </div>
      </div>
      <div class="prix">20 000 €</div>
      <img src="img/campbell-3ZUsNJhi_Ik-unsplash.jpg" alt="" />
    </section>
    <section id="additionnal-pictures">
      <div class="title">Images supplémentaires</div>
      <div class="wrapper">
        <img src="img/campbell-3ZUsNJhi_Ik-unsplash.jpg" alt="" />
        <img src="img/campbell-3ZUsNJhi_Ik-unsplash.jpg" alt="" />
        <img src="img/campbell-3ZUsNJhi_Ik-unsplash.jpg" alt="" />
        <img src="img/campbell-3ZUsNJhi_Ik-unsplash.jpg" alt="" />
        <img src="img/campbell-3ZUsNJhi_Ik-unsplash.jpg" alt="" />
        <img src="img/campbell-3ZUsNJhi_Ik-unsplash.jpg" alt="" />
      </div>
    </section>
    <section id="contact">
      <div class="title">Contactez nous a propos de ce vehicule</div>
      <form method="POST">
        <div class="form-container">
          <div class="input-container">
            <label>Nom</label>
            <input type="text" name="nom" placeholder="Votre nom"/>
          </div>
          <div class="input-container">
            <label>Prénom</label>
            <input type="text" name="prenom" placeholder="Votre prénom" />
          </div>
          <div class="input-container">
            <label>N˚ de tel</label>
            <input type="text" name="telephone" placeholder="Votre numéro de téléphone"/>
          </div>
          <div class="input-container">
            <label>Email</label>
            <input type="email" name="email" placeholder="Votre adresse email" />
          </div>
          <div class="input-container">
            <label>Sujet</label>
            <input type="text" name="sujet" value="Annonce Porsche 911 2020" disabled/>
          </div>
          <div class="input-container">
            <label>Message</label>
            <textarea type="text" name="message" placeholder="Rédigez votre message"></textarea>
          </div>
        </div>
        <button class="submit button" type="submit" name="contact">Envoyer</button>
      </form>
    </section>
  </main>
  <footer></footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/general.js"></script>
<script src="js/car.js"></script>

</html>