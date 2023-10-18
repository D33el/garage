<?php

if ($_SESSION['admin'] == true || $_SESSION['employe'] == true) {


  if (isset($_POST['logout'])) {
    $logout = new UserController();
    $logout->Logout();
  }

  if (isset($_POST['submit'])) {
    $send = new voituresController();
    $send->addVoiture();
    header('Location: ' . APP_PROTOCOL . '://' . $_SERVER['HTTP_HOST'] . "/dashboard-showroom");
  }

  if(isset($_POST['delete'])){
    $delete = new voituresController();
    $delete->deleteVoiture();
    header('Location: ' . APP_PROTOCOL . '://' . $_SERVER['HTTP_HOST'] . "/dashboard-showroom");
  }

  $id = null;

  $data = new voituresController();
  $voitures = $data->getVoiture(null,null);

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
    <link rel="stylesheet" href="css/dashboard.css" />
  </head>

  <body>
    <main id="app">
      <div id="overlay"></div>
      <div id="tooltip">Quitter</div>
      <!-- popup -->
      <div class="popup">
        <div class="text">Êtes-vous sur de vouloir supprimer ?</div>
        <div class="buttons">
          <form action="" method="post">
            <input type="hidden" name="id_voiture">
            <button class="delete button" type="submit" name="delete">Supprimer</button>
          </form>
          <div class="abort button">Annuler</div>
        </div>
      </div>
      <!-- drawer -->
      <div class="drawer" data-id="add">
        <div class="drawer-header">
          <div class="title">Ajouter un véhicule</div>
          <div class="message">Veuillez remplir tout les champs</div>
        </div>
        <div class="drawer-body">
          <form class="form-container" method="POST" enctype="multipart/form-data">
            <div class="input-container">
              <label for="">Image principale du vehicule</label>
              <input type="file" class="input-file" name="imageprincipale" placeholder="Le modéle du vehicule">
              <img src="img/campbell-3ZUsNJhi_Ik-unsplash.jpg" class="input-file-preview">
            </div>
            <div class="input-container">
              <label for="">Marque</label>
              <input type="text" name="marque" placeholder="Le modéle du vehicule">
            </div>
            <div class="input-container">
              <label for="">Année</label>
              <select name="annee" class="year-select">
                <option disabled selected>Séléctionnez l'année</option>
              </select>
            </div>
            <div class="input-container">
              <label for="">Couleur</label>
              <input type="text" name="couleur" placeholder="La couleur">
            </div>
            <div class="input-container">
              <label for="">Kilométrage</label>
              <input type="text" name="kilometrage" placeholder="Nb de KM au compteur">
            </div>
            <div class="input-container">
              <label for="">Moteur</label>
              <input type="text" name="moteur" placeholder="Le nom du moteur">
            </div>
            <div class="input-container">
              <label for="">Carburant</label>
              <select name="carburant" id="">
                <option disabled selected>Selectionnez le type de carburant</option>
                <option>Essence</option>
                <option>Diesel</option>
              </select>
            </div>
            <div class="input-container">
              <label for="">Boite de vitesse</label>
              <select name="boite" id="">
                <option disabled selected>Selectionnez le type de boite de vitesse</option>
                <option>Manuelle</option>
                <option>Automatique</option>
              </select>
            </div>
            <div class="input-container">
              <label for="">Prix</label>
              <input type="text" name="prix">
            </div>
            <div class="input-container">
              <label for="">État</label>
              <select name="etat" id="">
                <option disabled selected>Selectionnez l'etat du vehicule</option>
                <option>Neuf</option>
                <option>Occasion</option>
                <option>Occasion comme neuf</option>
              </select>
            </div>
            <div class="input-container">
              <label for="">Observation</label>
              <textarea name="observation" id=""></textarea>
            </div>
            <button type="submit" name="submit" class="submit primary">Envoyer</button>
          </form>
        </div>
      </div>
      
      <div class="drawer" data-id="update">
        <div class="drawer-header">
          <div class="title">Ajouter un véhicule</div>
          <div class="message">Veuillez remplir tout les champs</div>
        </div>
        <div class="drawer-body">
          <form class="form-container" method="POST" enctype="multipart/form-data">
            <div class="input-container">
              <label for="">Image principale du vehicule</label>
              <input type="file" class="input-file" name="imageprincipale" placeholder="Le modéle du vehicule">
              <img src="img/campbell-3ZUsNJhi_Ik-unsplash.jpg" class="input-file-preview">
            </div>
            <div class="input-container">
              <label for="">Marque</label>
              <input type="text" name="marque" placeholder="Le modéle du vehicule">
            </div>
            <div class="input-container">
              <label for="">Année</label>
              <select name="annee" class="year-select">
                <option disabled selected>Séléctionnez l'année</option>
              </select>
            </div>
            <div class="input-container">
              <label for="">Couleur</label>
              <input type="text" name="couleur" placeholder="La couleur">
            </div>
            <div class="input-container">
              <label for="">Kilométrage</label>
              <input type="text" name="kilometrage" placeholder="Nb de KM au compteur">
            </div>
            <div class="input-container">
              <label for="">Moteur</label>
              <input type="text" name="moteur" placeholder="Le nom du moteur">
            </div>
            <div class="input-container">
              <label for="">Carburant</label>
              <select name="carburant" id="">
                <option disabled selected>Selectionnez le type de carburant</option>
                <option>Essence</option>
                <option>Diesel</option>
              </select>
            </div>
            <div class="input-container">
              <label for="">Boite de vitesse</label>
              <select name="boite" id="">
                <option disabled selected>Selectionnez le type de boite de vitesse</option>
                <option>Manuelle</option>
                <option>Automatique</option>
              </select>
            </div>
            <div class="input-container">
              <label for="">Prix</label>
              <input type="text" name="prix">
            </div>
            <div class="input-container">
              <label for="">État</label>
              <select name="etat" id="">
                <option disabled selected>Selectionnez l'etat du vehicule</option>
                <option>Neuf</option>
                <option>Occasion</option>
                <option>Occasion comme neuf</option>
              </select>
            </div>
            <div class="input-container">
              <label for="">Observation</label>
              <textarea name="observation" id=""></textarea>
            </div>
            <button type="submit" name="submit" class="submit primary">Envoyer</button>
          </form>
        </div>
      </div>
      <header class="dashboard" data-name="<?php echo $_SESSION['nomPrenom'] ?>" data-type="<?php echo $_SESSION['type'] ?>"><!-- Display general.js--></header>
      <div class="sidebar"><!-- Display general.js--></div>
      <div class="content">
        <div class="page" id="showroom">
          <div class="page-wrapper">
            <div class="page-header">
              <div class="wrap">
                <div class="title">Gestion du showroom</div>
              </div>
              <button class="primary has-icon add-car" id=""><i class="fa-solid fa-plus"></i>Nouvelle voiture</button>
            </div>
            <div class="cars-list">
              <?php foreach ($voitures as $voiture) { ?>
                <div class="card" data-id="<?php echo $voiture['id_voiture'] ?>">
                  <div class="buttons">
                    <div class="update-car rounded-btn"><i class="fa-solid fa-pen-to-square"></i></div>
                    <div class="delete-btn rounded-btn" data-id="<?php echo $voiture['id_voiture'] ?>"><i class="fa-solid fa-trash-can"></i></div>
                  </div>
                  <img src="<?php echo "../" . $voiture['imageprincipale'] ?>" alt="" />
                  <div class="wrapper">
                    <div class="car-name title"><?php echo $voiture['marque'] ?></div>
                    <div class="price"><?php echo number_format($voiture['prix'], 2, ".", " ") ?> €</div>
                    <div class="details">
                      <div><?php echo $voiture['annee'] ?></div>
                      <div class="spacer">•</div>
                      <div><?php echo $voiture['kilometrage'] ?> Km</div>
                      <div class="spacer">•</div>
                      <div><?php echo $voiture['moteur'] ?></div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>

        </div>
      </div>
    </main>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/general.js"></script>
  <script src="js/dashboard.js"></script>

  </html>

<?php
} else {
  header('Location: ' . APP_PROTOCOL . '://' . $_SERVER['HTTP_HOST'] . "/login");
}
?>