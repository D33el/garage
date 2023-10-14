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
    <header class="dashboard"><!-- Display general.js--></header>
    <div class="sidebar"><!-- Display general.js--></div>
    <div class="content">
      <div class="page" id="website">
        <div class="page-wrapper">
          <div class="page-header">
            <div class="wrap">
              <div class="title">Gestion du site web</div>
            </div>
            <button class="primary has-icon" id=""><i class="fa-solid fa-save"></i>Sauvegarder </button>
          </div>
          <div class="wrap">
            <div class="open-days">
              <div class="subtitle">Horaires d'ouverture</div>
              <form class="table">
                <div class="table-head">
                  <div></div>
                  <div>Matinée</div>
                  <div>Aprés-midi</div>
                </div>
                <div class="table-row">
                  <div>Dimanche</div>
                  <div>
                    <span>De</span>
                    <input type="time" max="12:00" min="6:00">
                    <span>à</span>
                    <input type="time" max="12:00" min="6:00">
                  </div>
                  <div>
                    <span>De</span>
                    <input type="time" max="00:00" min="13:00">
                    <span>à</span>
                    <input type="time" max="00:00" min="13:00">
                  </div>
                </div>
                <div class="table-row">
                  <div>Lundi</div>
                  <div>
                    <span>De</span>
                    <input type="time" max="12:00" min="6:00">
                    <span>à</span>
                    <input type="time" max="12:00" min="6:00">
                  </div>
                  <div>
                    <span>De</span>
                    <input type="time" max="00:00" min="13:00">
                    <span>à</span>
                    <input type="time" max="00:00" min="13:00">
                  </div>
                </div>
                <div class="table-row">
                  <div>Mardi</div>
                  <div>
                    <span>De</span>
                    <input type="time" max="12:00" min="6:00">
                    <span>à</span>
                    <input type="time" max="12:00" min="6:00">
                  </div>
                  <div>
                    <span>De</span>
                    <input type="time" max="00:00" min="13:00">
                    <span>à</span>
                    <input type="time" max="00:00" min="13:00">
                  </div>
                </div>
                <div class="table-row">
                  <div>Mercredi</div>
                  <div>
                    <span>De</span>
                    <input type="time" max="12:00" min="6:00">
                    <span>à</span>
                    <input type="time" max="12:00" min="6:00">
                  </div>
                  <div>
                    <span>De</span>
                    <input type="time" max="00:00" min="13:00">
                    <span>à</span>
                    <input type="time" max="00:00" min="13:00">
                  </div>
                </div>
                <div class="table-row">
                  <div>Jeudi</div>
                  <div>
                    <span>De</span>
                    <input type="time" max="12:00" min="6:00">
                    <span>à</span>
                    <input type="time" max="12:00" min="6:00">
                  </div>
                  <div>
                    <span>De</span>
                    <input type="time" max="00:00" min="13:00">
                    <span>à</span>
                    <input type="time" max="00:00" min="13:00">
                  </div>
                </div>
                <div class="table-row">
                  <div>Vendredi</div>
                  <div>
                    <span>De</span>
                    <input type="time" max="12:00" min="6:00">
                    <span>à</span>
                    <input type="time" max="12:00" min="6:00">
                  </div>
                  <div>
                    <span>De</span>
                    <input type="time" max="00:00" min="13:00">
                    <span>à</span>
                    <input type="time" max="00:00" min="13:00">
                  </div>
                </div>
                <div class="table-row">
                  <div>Samedi</div>
                  <div>
                    <span>De</span>
                    <input type="time" max="12:00" min="6:00">
                    <span>à</span>
                    <input type="time" max="12:00" min="6:00">
                  </div>
                  <div>
                    <span>De</span>
                    <input type="time" max="00:00" min="13:00">
                    <span>à</span>
                    <input type="time" max="00:00" min="13:00">
                  </div>
                </div>
              </form>
            </div>
            <div class="services">
              <div class="subtitle">Section Services</div>
              <button class="primary has-icon" id=""><i class="fa-solid fa-plus"></i>Nouveau</button>
              <div class="services-list">
                <div class="service-card">
                  <div class="edit">
                    <div class="update-service"><i class="fa-solid fa-pen-to-square"></i></div>
                    <div class="delete-service"><i class="fa-solid fa-trash-can"></i></div>
                  </div>
                  <img src="img/entretien.png" alt="" />
                  <div class="title">Entretient</div>
                  <div class="details">
                    <div>Vidange et filtre a huile</div>
                    <div>Révision génerale</div>
                    <div>Changement de plaquettes de freins</div>
                  </div>
                </div>
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