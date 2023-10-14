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
      <div class="page" id="showroom">
        <div class="page-wrapper">
          <div class="page-header">
            <div class="wrap">
              <div class="title">Gestion du showroom</div>
              <div class="count">99 voitures exposés</div>
            </div>
            <button class="primary has-icon" id=""><i class="fa-solid fa-plus"></i>Nouvelle voiture</button>
          </div>
          <div class="cars-list">
            <div class="card" data-id="1">
              <div class="buttons">
                <div class="update-car-btn rounded-btn"><i class="fa-solid fa-pen-to-square"></i></div>
                <div class="delete-car-btn rounded-btn"><i class="fa-solid fa-trash-can"></i></div>
              </div>
              <img src="img/campbell-3ZUsNJhi_Ik-unsplash.jpg" alt="" />
              <div class="wrapper">
                <div class="car-name title">Porsche 911</div>
                <div class="price">20 000 €</div>
                <div class="details">
                  <div>2020</div>
                  <div class="spacer">•</div>
                  <div>289439 Km</div>
                  <div class="spacer">•</div>
                  <div>1.9L TDI</div>
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