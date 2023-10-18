<?php

if ($_SESSION['admin'] == true || $_SESSION['employe'] == true) {

if (isset($_POST['logout'])) {
  $logout = new UserController();
  $logout->Logout();
}

if(isset($_POST['valide'])){
  $validation = new contactController();
  $validation->valider();
  header('Location: ' . APP_PROTOCOL . '://' . $_SERVER['HTTP_HOST'] . "/dashboard-comments");
}

if(isset($_POST['submit'])){
  $Ajout = new contactController();
  $Ajout->rate();
  header('Location: ' . APP_PROTOCOL . '://' . $_SERVER['HTTP_HOST'] . "/dashboard-comments");
}

if(isset($_POST['delete'])){

}


$data = new contactController();
$ToutLesAvis = $data->getRatings(null)

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
      <div id="tooltip">Cliquer pour quitter</div>
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
      <div id="drawer">
        <div class="drawer-header">
          <div class="title">Ajouter un commentaire</div>
          <div class="message">Veuillez remplir tout les champs</div>
        </div>
        <div class="drawer-body">
          <form class="form-container" method="POST">
            <div class="input-container">
              <label for="">Nom complet</label>
              <input type="text" name="nom" placeholder="Nom et prénom du client">
            </div>
            <div class="input-container">
              <label for="">Note</label>
              <input type="number" name="note" placeholder="Note sur 5" max="5" min="1">
            </div>
            <div class="input-container">
              <label for="">Commentaire</label>
              <textarea name="commentaire" placeholder="Le commentaire du client"></textarea>
            </div>
            <button type="submit" name="submit" class="submit primary">Envoyer</button>
          </form>
        </div>
      </div>
      <header class="dashboard" data-name="<?php echo $_SESSION['nomPrenom'] ?>" data-type="<?php echo $_SESSION['type'] ?>"><!-- Display general.js--></header>
      <div class="sidebar"><!-- Display general.js--></div>
      <div class="content">
        <div class="page" id="comments">
          <div class="page-wrapper">
            <div class="page-header">
              <div class="wrap">
                <div class="title">Gestion des commentaires</div>
              </div>
              <button class="primary has-icon add-comment" id=""><i class="fa-solid fa-plus"></i>Nouveau commentaire</button>
            </div>
            <div class="comments-list">
              <?php foreach($ToutLesAvis as $avis){ ?>
              <div class="comment-card unchecked">
                <div class="wrap">
                  <div class="name"><?php echo $avis['nom'] ?></div>
                  <div class="stars" data-id="<?php echo $avis['note'] ?>"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                  <?php if(!$avis['etat']) {?><div class="state">Non vérifié</div><?php } ?>
                  <div class="comment"><?php echo $avis['commentaire'] ?></div>
                </div>
                <div class="actions">
                  <form method="post">
                    <input type="hidden" name="id_avis" value="<?php echo $avis['id_avis'] ?>">
                    <button class="validate-comment" type="submit" name="valide"><i class="fa-solid fa-circle-check"></i></button>
                  </form>
                  <button class="delete-btn delete-comment" data-id="<?php echo $avis['id_avis'] ?>"><i class="fa-solid fa-trash-can"></i></button>
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