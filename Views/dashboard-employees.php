<?php
if ($_SESSION['admin'] == true || $_SESSION['employe'] == true) {

  if (isset($_POST['logout'])) {
    $logout = new UserController();
    $logout->Logout();
  }

  $data = new UserController();
  $users = $data->getAll();

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
            <button class="delete button" type="submit">Supprimer</button>
          </form>
          <div class="abort button">Annuler</div>
        </div>
      </div>
      <!-- drawer -->
      <div id="drawer">
        <div class="drawer-header">
          <div class="title">Ajouter un employé</div>
          <div class="message">Veuillez remplir tout les champs</div>
        </div>
        <div class="drawer-body">
          <form class="form-container" method="POST">
            <div class="input-container">
              <label for="">Nom</label>
              <input type="text" name="nom" placeholder="Nom">
            </div>
            <div class="input-container">
              <label for="">Prénom</label>
              <input type="text" name="prenom" placeholder="Prénom">
            </div>
            <div class="input-container">
              <label for="">Téléphone</label>
              <input type="text" name="tel" placeholder="Numéro de téléphone">
            </div>
            <div class="input-container">
              <label for="">E-mail</label>
              <input type="text" name="email" placeholder="E-mail">
            </div>
            <div class="input-container">
              <label for="">Mot de passe</label>
              <input type="text" name="password" placeholder="Mot de passe">
            </div>
            <div class="input-container">
              <label for="">Type d'utilisateur</label>
              <select name="type">
                <option value="" disabled selected>Sélectionnez le type de l'utilisateur</option>
                <option value="Employe">Employé</option>
                <option value="Admin">Admin</option>
              </select>
            </div>
            <button type="submit" name="submit" class="submit primary">Envoyer</button>
          </form>
        </div>
      </div>
      <header class="dashboard" data-name="<?php echo $_SESSION['nomPrenom'] ?>" data-type="<?php echo $_SESSION['type'] ?>"><!-- Display general.js--></header>
      <div class="sidebar"><!-- Display general.js--></div>
      <div class="content">
        <div class="page" id="employees">
          <div class="page-wrapper">
            <div class="page-header">
              <div class="wrap">
                <div class="title">Gestion des employés</div>
                <div class="count">99 employés</div>
              </div>
              <button class="primary has-icon add-employee"><i class="fa-solid fa-plus"></i>Nouvel employé</button>
            </div>
            <div class="employees-table">
              <table>
                <thead>
                  <tr class="table100-head">
                    <th class="column1">Nom & Prénom</th>
                    <th class="column2">Nom d'utilsiateur</th>
                    <th class="column3">E-mail</th>
                    <th class="column4">N˚ de tel</th>
                    <th class="column6"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $user) { ?>
                    <tr>
                      <td class="column1"><?php echo $user['nomPrenom'] ?></td>
                      <td class="column2"><?php echo $user['username'] ?></td>
                      <td class="column3"><?php echo $user['email'] ?></td>
                      <td class="column4"><?php echo $user['tel'] ?></td>
                      <td class="column6">
                        <div class="update-employee"><i class="fa-solid fa-pen-to-square"></i></div>
                        <div class="delete-btn" data-id="<?php echo $user['id_user'] ?>"><i class="fa-solid fa-trash-can"></i></div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
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