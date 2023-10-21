<?php


$data = new voituresController();
$voitures = $data->getVoiture(null, null);

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
  <link rel="stylesheet" href="css/showroom.css" />
</head>

<body>
  <header></header>
  <main>
    <div class="title">Showroom</div>
    <div class="subtitle count">99 Résultats</div>
    <section id="filters">
      <div class="price-filter filter">
        <div class="text">Prix</div>
        <div class="range_container">
          <div class="sliders_control">
            <input id="fromSlider" data-id="fromPrice" type="range" value="1000" min="0" max="100000" />
            <input id="toSlider" data-id="toPrice" type="range" value="100000" min="0" max="100000" />
          </div>
        </div>
        <div class="wrap">
          <span>Entre</span>
          <span class="from-value" ></span>
          <span>et</span>
          <span class="to-value" ></span>
        </div>
      </div>
      <div class="year-filter filter">
        <form action="" method="post">
          <div class="input-container">
            <select name="" id="year-filter-select" data-id="annee">
              <option selected disabled>Trier par année de fabrication</option>
            </select>
          </div>
        </form>
      </div>
      <div class="boite-filter filter">
        <form action="" method="post">
          <div class="input-container">
            <select name="" id="boite-filter-select" data-id="boite">
              <option disabled selected>Trier par boite de vitesse</option>
              <option value="auto">Automatique</option>
              <option value="manuelle">Manuelle</option>
            </select>
          </div>
        </form>
      </div>
      <div class="carburant-filter filter">
        <form action="" method="post">
          <div class="input-container">
            <select name="" id="carburant-filter-select" data-id="carburant">
              <option disabled selected>Trier par carburant</option>
              <option value="essence">Essence</option>
              <option value="diesel">Diesel</option>
            </select>
          </div>
        </form>
      </div>

    </section>
    <section id="cars-list">
      <!-- Display  -->
      <?php foreach ($voitures as $voiture) { ?>
        <div class="card" data-id="<?php echo $voiture['id_voiture'] ?>">
          <img src="<?php echo "../" . $voiture['imageprincipale'] ?>" alt="" />
          <div class="wrapper">
            <div class="car-name title"><?php echo $voiture['marque'] ?></div>
            <div class="price"><?php echo number_format($voiture['prix'], 2, ".", " ") ?> €</div>
            <div class="details">
              <div><?php echo $voiture['annee'] ?></div>
              <div class="spacer">•</div>
              <div><?php echo $voiture['kilometrage'] ?> Km</div>
              <div class="spacer">•</div>
              <div><?php echo $voiture['carburant'] ?></div>
              <div class="spacer">•</div>
              <div><?php echo $voiture['boite'] ?></div>
            </div>
          </div>
        </div>
      <?php } ?>
    </section>
  </main>
  <footer></footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/general.js"></script>
<script src="js/showroom.js"></script>

</html>