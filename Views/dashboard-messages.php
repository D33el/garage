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
    <div id="drawer">
      <div class="drawer-header">
        <div class="title">Ajouter un véhicule</div>
        <div class="message">Veuillez remplir tout les champs</div>
      </div>
      <div class="drawer-body">
        <form class="form-container" method="POST">
          <div class="input-container">
            <label for=""></label>
            <input type="text" name="">
          </div>
          <div class="input-container">
            <label for=""></label>
            <input type="text" name="">
          </div>
          <div class="input-container">
            <label for=""></label>
            <input type="text" name="">
          </div>
          <div class="input-container">
            <label for=""></label>
            <input type="text" name="">
          </div>
        </form>
      </div>
    </div>
    <header class="dashboard"><!-- Display general.js--></header>
    <div class="sidebar"><!-- Display general.js--></div>
    <div class="content">
      <div class="page" id="messages">
        <div class="page-wrapper">
          <div class="page-header">
            <div class="wrap">
              <div class="title">Messagerie</div>
              <div class="count">99 Messages non lus</div>
            </div>
          </div>
          <div class="wrap">
            <div class="messages-list">
              <div class="message">
                <div class="name">user test</div>
                <div class="date">01/01/2000</div>
                <div class="subject"><span>Sujet : </span>Lorem ipsum dolor sit amet consectetur adipisicing.</div>
              </div>
            </div>
            <div class="message-preview">
              <!-- <div class="empty">Selectionnez <br> un message</div> -->
              <div class="preview-wrapper">
                <div class="wrap">
                  <div class="name">user test</div>
                  <div class="email">email@email.com</div>
                  <div class="phone">1234567890</div>
                </div>
                <div class="subject"><span>Sujet : </span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, ea.</div>
                <div class="message">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, qui, iusto ex nam non iste odio doloremque exercitationem ut praesentium nisi aliquam quae reiciendis dolorum deserunt. A necessitatibus odit illo veritatis id laborum provident fugiat expedita, numquam quas ipsa excepturi vel reprehenderit maiores voluptate cumque vitae amet deleniti dolorum! Provident.</div>
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