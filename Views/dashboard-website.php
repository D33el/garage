<?php

if ($_SESSION['admin'] == true) {


if (isset($_POST['logout'])) {
  $logout = new UserController();
  $logout->Logout();
}

if(isset($_POST['set'])){
  $set = new horairesController();
  $set->SetHoraire();
  header('Location: ' . APP_PROTOCOL . '://' . $_SERVER['HTTP_HOST'] . "/dashboard-website");
}

if(isset($_POST['submit'])){
  $service = new servicesController();
  $service->addService();
  header('Location: ' . APP_PROTOCOL . '://' . $_SERVER['HTTP_HOST'] . "/dashboard-website");
}


if(isset($_POST['delete'])){
  $delete = new servicesController();
  $delete->deleteService();
  header('Location: ' . APP_PROTOCOL . '://' . $_SERVER['HTTP_HOST'] . "/dashboard-website");
}

if(isset($_POST['modifier'])){
  $modif = new servicesController();
  $modif->updateService();
}

  $dataHoraires = new horairesController();
  $horaires = $dataHoraires->getHoraire();

  $dataServices = new servicesController();
  $services = $dataServices->getAllServices();

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
            <input type="hidden" name="id_">
            <button class="delete button" type="submit" name="delete">Supprimer</button>
          </form>
          <div class="abort button">Annuler</div>
        </div>
      </div>
      <!-- drawer -->
      <div class="drawer" data-id="add">
        <div class="drawer-header">
          <div class="title">Ajouter un service</div>
          <div class="message">Veuillez remplir tout les champs</div>
        </div>
        <div class="drawer-body">
          <form class="form-container" method="POST" enctype="multipart/form-data">
            <div class="input-container">
              <label for="">Nom</label>
              <input type="text" name="service" placeholder="Nom du service">
            </div>
            <div class="input-container">
              <label for="">Image</label>
              <input type="file" class='input-file' name="imageService">
              <img src="img/campbell-3ZUsNJhi_Ik-unsplash.jpg" class="input-file-preview">
            </div>
            <div class="input-container">
              <label for="">Description</label>
              <textarea name="description" placeholder="Description du service"></textarea>
            </div>
            <button type="submit" name="submit" class="submit primary">Envoyer</button>
          </form>
        </div>
      </div>
      
      <div class="drawer" data-id="update">
        <div class="drawer-header">
          <div class="title">Modifier un service</div>
          <div class="message">Veuillez remplir tout les champs</div>
        </div>
        <div class="drawer-body">
          <form class="form-container" method="POST" enctype="multipart/form-data">
            <div class="input-container">
              <label for="">Nom</label>
              <input type="text" name="service" placeholder="Nom du service">
            </div>
            <div class="input-container">
              <label for="">Image</label>
              <input type="file" name="imageService">
              <img src="img/campbell-3ZUsNJhi_Ik-unsplash.jpg" class="input-file-preview">
            </div>
            <div class="input-container">
              <label for="">Description</label>
              <textarea name="description" placeholder="Description du service"></textarea>
            </div>
            <input type="hidden" name="id_service">
            <button type="submit" name="submit" name="modifier" class="submit primary">Envoyer</button>
          </form>
        </div>
      </div>
      <header class="dashboard" data-name="<?php echo $_SESSION['nomPrenom'] ?>" data-type="<?php echo $_SESSION['type'] ?>"><!-- Display general.js--></header>
      <div class="sidebar"><!-- Display general.js--></div>
      <div class="content">
        <div class="page" id="website">
          <div class="page-wrapper">
            <div class="page-header">
              <div class="wrap">
                <div class="title">Gestion du site web</div>
              </div>
              <button class="primary has-icon" id="save"><i class="fa-solid fa-save"></i>Sauvegarder </button>
            </div>
            <div class="wrap">
              <div class="open-days">
                <div class="subtitle">Horaires d'ouverture</div>
                <form class="table" method="post">
                  <div class="table-head">
                    <div></div>
                    <div>Matinée</div>
                    <div>Aprés-midi</div>
                  </div>
                  <?php $i = 1; foreach($horaires as $horaire){ 
                  ?>
                  <div class="table-row">
                    <div><?php echo $horaire['jour'] ?></div>
                    <div>
                      <span>De</span>
                      <input type="time" max="12:00" min="6:00" value="<?php echo $horaire['ouvertureMatin'] ?>" name="ouvertureMatin<?php echo $i ?>">
                      <span>à</span>
                      <input type="time" max="12:00" min="6:00" value="<?php echo $horaire['fermetureMatin']?>"name="fermetureMatin<?php echo $i ?>">
                    </div>
                    <div>
                      <span>De</span>
                      <input type="time" max="00:00" min="13:00" value="<?php echo $horaire['ouvertureAprem'] ?>" name="ouvertureAprem<?php echo $i ?>">
                      <span>à</span>
                      <input type="time" max="00:00" min="13:00" value="<?php echo $horaire['fermetureAprem'] ?>" name="fermetureAprem<?php echo $i ?>">
                    </div>
                  </div>
                      <input type="hidden" name="id_horaire<?php echo $i?>" value="<?php echo $horaire['id_horaire'] ?>">
                  <?php $i++; } 
                  ?>
                  <input type="hidden" name="inputs" value="<?php echo $i ?>">
                  <button type="submit" name="set" class="open-days-submit" style="display:none;"></button>
                </form>
              </div>
              <div class="services">
                <div class="subtitle">Section Services</div>
                <button class="primary outline has-icon add-service" id=""><i class="fa-solid fa-plus"></i>Nouveau service</button>
                <div class="services-list">
                  <?php foreach($services as $service){ ?>
                  <div class="service-card">
                    <div class="edit">
                      <div class="update-service" data-id="<?php echo $service['id_service'] ?>"><i class="fa-solid fa-pen-to-square"></i></div>
                      <div class="delete-btn" data-id="<?php echo $service['id_service'] ?>"><i class="fa-solid fa-trash-can"></i></div>
                    </div>
                    <img src="<?php echo "../".$service['imageService'] ?>" alt="" />
                    <div class="title"><?php echo $service['service'] ?></div>
                    <div class="details">
                      <div><?php echo $service['description'] ?></div>
                    </div>
                  </div>
                    <?php } ?>
                </div>
              </div>
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
} else if(isset($_SESSION['employe'])){
  header('Location: ' . APP_PROTOCOL . '://' . $_SERVER['HTTP_HOST'] . "/403");
}else{
  header('Location: ' . APP_PROTOCOL . '://' . $_SERVER['HTTP_HOST'] . "/login");
}
?>