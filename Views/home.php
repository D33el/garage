<?php

if(isset($_POST['rate'])){
  $rate = new contactController();
  $rate->rate();
}

if(isset($_POST['contact'])){
  $send = new contactController();
  $send->addContact();
  header('Location: ' . APP_PROTOCOL.'://'.$_SERVER['HTTP_HOST']."/home");
}

$data = new contactController();
$avisAccepte = $data->getRatings(1);

$data = new servicesController();
$services = $data->getAllServices();

$data = new horairesController();
$horaires = $data->getHoraire();

$data = new voituresController();
$voitures = $data->getVoiture(null,3);


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
    <link rel="stylesheet" href="css/home.css" />
  </head>
  <body>
    <header>
      <img src="img/garage-logo.png" alt="logo garage v.parrot" class="brand" />
      <nav>
        <a href="index.html" class="nav-item">Accueil</a>
        <a href="../showroom" class="nav-item">Showroom</a>
        <a href="#contact" data-id="#contact" class="scrollto nav-item">Contact</a>
      </nav>
    </header>
    <main>
      <div id="hero">
        <div class="title">
          Bienvenue sur le site web du <br />
          Garage V. Parrot
        </div>
        <div class="button">Acceder au Showroom</div>
      </div>
      <section id="featured-cars">
        <div class="title">Voitures a la une</div>
        <div class="card-list">
          <?php foreach($voitures as $voiture){ ?>
          <div class="card">
            <img src="<?php echo "../".$voiture['imageprincipale'] ?>" alt="" />
            <div class="wrapper">
              <div class="car-name"><?php echo $voiture['marque'] ?></div>
              <div class="info"><?php echo $voiture['kilometrage']." Km - Année ".$voiture['annee'] ?></div>
              <div class="price"><?php echo number_format($voiture['prix'],2,"."," ") ?> €</div>
              <div class="button" data-id="<?php echo $voiture['id_voiture'] ?>">Voir plus</div>
            </div>
          </div>
            <?php } ?>
        </div>
      </section>
      <section id="services">
        <div class="title">Services proposées par le Garage V. Parrot</div>
        <div class="card-list">
          <?php foreach($services as $service){ ?>
          <div class="card">
            <img src="<?php echo "../".$service['imageService'] ?>" alt="" />
            <div class="title"><?php echo $service['service'] ?></div>
            <div class="details">
              <p><?php echo $service['description'] ?></p>
            </div>
          </div>
          <?php } ?>
          <!-- <div class="card">
            <img src="img/distribution.png" alt="" />
            <div class="title">Distribution</div>
            <div class="details">
              <div>Changement de la courroie de distribution</div>
              <div>Changement de la courroie d’accessoires</div>
              <div>Changement du liquide de refroidissement</div>
            </div>
          </div>
          <div class="card">
            <img src="img/hubs_and_bearings.png" alt="" />
            <div class="title">Pneus</div>
            <div class="details">
              <div>Changement de pneus</div>
              <div>Reparation de pneus</div>
              <div>Changement des roulements de roue</div>
            </div>
          </div>
          <div class="card">
            <img src="img/trust.png" alt="" />
            <div class="title">Vente de vehicule d'occasion</div>
            <div class="details">
              <div>Simonisage de la carrosserie</div>
              <div>Lifting intégral</div>
              <div>Révision intégrale du vehicule</div>
            </div>
          </div> -->
        </div>
      </section>
      <section id="comments">
        <div class="title">Témoignages des clients</div>
        <div class="wrapper">
          <div class="comments-list">
            <?php foreach($avisAccepte as $avis){ ?>
            <div class="card">
              <div class="name"><?php echo $avis['nom'] ?></div>
              <div class="stars" data-id="<?php echo $avis['note'] ?>"></div>
              <div class="comment"><?php echo $avis['commentaire'] ?></div>
            </div>
            <?php } ?>
          </div>
          <div class="comments-form">
            <div class="subtitle">Laissez votre temoignage !</div>
            <form method="post">
              <div class="form-container">
                <div class="input-container">
                  <label>Nom</label>
                  <input type="text" placeholder="Votre nom" name="nom" />
                </div>
                <div class="input-container">
                  <label>Prénom</label>
                  <input type="text" placeholder="Votre prénom" name="prenom" />
                </div>
                <div class="input-container">
                  <label>Note</label>
                  <input type="hidden" name="note" class="stars-input">
                  <div class="stars">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                  </div>
                </div>
                <div class="input-container">
                  <label>Message</label>
                  <textarea name="commentaire" id="" cols="30" rows="10"></textarea>
                </div>
              </div>
              <button type="submit" name="rate" class="submit button">Envoyer</button>
            </form>
          </div>
        </div>
      </section>
      <section id="opening-hours">
        <div class="title">Horaires d'ouverture</div>
        <div class="card-list">
          <?php foreach($horaires as $horaire){ ?>
          <div class="card">
            <div class="subtitle"><?php echo $horaire['jour'] ?></div>
            <div class="wrapper">
              <div><span>Matin : </span><?php echo $horaire['ouvertureMatin'] ."h - ". $horaire['fermetureMatin']."h " ?></div>
              <div><span>Aprem : </span><?php echo $horaire['ouvertureAprem'] ."h - ". $horaire['fermetureAprem']."h " ?></div>
            </div>
          </div>
          <?php } ?>
        </div>
      </section>
      <section id="contact">
        <div class="title">Contactez nous</div>
        <form method="POST">
        <div class="form-container">
            <div class="input-container">
              <label>Nom</label>
              <input type="text" name="nom" placeholder="Votre nom" />
            </div>
            <div class="input-container">
              <label>Prénom</label>
              <input type="text" name="prenom" placeholder="Votre prénom"/>
            </div>
            <div class="input-container">
              <label>N˚ de tel</label>
              <input type="text" name="telephone" placeholder="Votre numéro de téléphone"/>
            </div>
            <div class="input-container">
              <label>Email</label>
              <input type="email" name="email" placeholder="Votre adresse email"/>
            </div>
            <div class="input-container">
              <label>Sujet</label>
              <input type="text" name="sujet" placeholder="Sujet" />
            </div>
            <div class="input-container">
              <label>Message</label>
              <textarea name="message" placeholder="Rédigez votre message" id="" cols="30" rows="10"></textarea>
            </div>
          </div>
          <button class="submit button" style="display:none;" type="submit" name="contact">Envoyer</button>
        </form>
        <button class="submit button" id='test'>Envoyer</button>
      </section>
    </main>
    <footer></footer>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/general.js"></script>
  <script src="js/home.js"></script>
</html>
