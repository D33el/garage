<?php

if($_SESSION['admin'] == true || $_SESSION['employe'] == true){


if(isset($_POST['logout'])){
  $logout = new UserController();
  $logout->Logout();
}


$data = new contactController();
$messages = $data->getAllMessages();


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
    
    <header class="dashboard" data-name="<?php echo $_SESSION['nomPrenom'] ?>" data-type="<?php echo $_SESSION['type'] ?>"><!-- Display general.js--></header>
    <div class="sidebar"><!-- Display general.js--></div>
    <div class="content">
      <div class="page" id="messages">
        <div class="page-wrapper">
          <div class="page-header">
            <div class="wrap">
              <div class="title">Messagerie</div>
              <!-- <div class="count">99 Messages non lus</div> -->
            </div>
          </div>
          <div class="wrap">
            <div class="messages-list">
              <?php foreach($messages as $message){ ?>
              <div class="message" data-id="<?php echo $message['id_contact'] ?>">
                <div class="name"><?php echo $message['nomPrenom'] ?></div>
                <div class="date"><?php echo $message['createdat'] ?></div>
                <div class="subject"><span>Sujet : </span><?php echo $message['sujet'] ?></div>
              </div>
              <?php } ?>
            </div>
            <div class="message-preview" >
              <div class="empty">Selectionnez <br> un message</div>
              <?php foreach($messages as $message){ ?>
              <div class="message-container" data-id="<?php echo $message['id_contact'] ?>">
                <div class="preview-wrapper">
                  <div class="wrap">
                    <div class="name"><?php echo $message['nomPrenom'] ?></div>
                    <div class="email"><?php echo $message['email'] ?></div>
                    <div class="phone"><?php echo $message['telephone'] ?></div>
                  </div>
                  <div class="subject"><span>Sujet : </span><?php echo $message['sujet'] ?></div>
                  <div class="message"><?php echo $message['message'] ?></div>
                </div>
              </div>
              <?php } ?>
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
}else{
  header('Location: ' . APP_PROTOCOL.'://'.$_SERVER['HTTP_HOST']."/login");
}
?>

