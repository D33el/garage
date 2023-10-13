GV = { pathname:window.location.pathname }
$(document).ready(async function () {
  console.log();
  console.log("General.js Loaded");
  if (GV.pathname.includes("dashboard")) dashboardHandler()
  displayHeaderFooter();
});

$(document).on("click", ".scrollto", function () {
  let section = $(this).data("id");
  let currentPage = window.location.pathname;
  console.log(currentPage);
  if (currentPage != "/home") {
    window.location.href = "/home" + section;
  }
  let offset = 30;
  $("html, body").animate({ scrollTop: $(section).offset().top - offset }, 300);
});

function checkMobile() {
  if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
    return true;
  } else {
    return false;
  }
}

function displayHeaderFooter() {
  let isMobile = checkMobile();
  if (isMobile) {
    $("header").html(`
      <img src="img/garage-logo.png" alt="logo garage v.parrot" class="brand" />
      <div class="wrapper">
      <i class="fa-solid fa-bars" id="nav-toggle"></i>
        <nav class="mobile">
          <a href="../home" class="nav-item">Accueil</a>
          <a href="../showroom" class="nav-item">Showroom</a>
          <div class="nav-item scrollto" data-id="#contact">Contact</div>
        </nav>
      </div>
    `);
  } else if($("header").hasClass("dashboard")){
    // header dashboard
    $("header").html(`
    <img src="img/garage-logo.png" alt="" class="brand">
    <div id="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></div>
    <div class="profile">
      <div class="avatar">un</div>
      <div class="wrap">
        <div class="name">user name</div>
        <div class="role">admin</div>
      </div>
    </div>
    `);
  } else  {
    // header site
    $("header").html(`
      <img src="img/garage-logo.png" alt="logo garage v.parrot" class="brand" />
      <nav>
        <a href="../home" class="nav-item">Accueil</a>
        <a href="../showroom" class="nav-item">Showroom</a>
        <div class="nav-item scrollto" data-id="#contact">Contact</div>
      </nav>
    `);
   }
  $("footer").html(`
    <img src="img/garage-logo.png" class="brand" />
    <div class="copyright">Copyright 2023 - Garage V. Parrot</div>
    <div class="contacts">
      <div>1234567890</div>
      <div>email@email.com</div>
      <div>12 rue paris, paris, france</div>
    </div>
  `);
}

function dashboardHandler() {
  displaySidebar()
}

function displaySidebar() {
  $('.sidebar').html(`
  <nav>
    <a class="nav-item" href="../dashboard-showroom">
      <i class="fa-solid fa-car-side"></i>
      <div>Showroom</div>
    </a>
    <a class="nav-item" href="../dashboard-messages">
      <i class="fa-solid fa-envelope"></i>
      <div>Messages</div>
    </a>
    <a class="nav-item" href="../dashboard-comments">
      <i class="fa-solid fa-comments"></i>
      <div>Commentaires</div>
    </a>
    <a class="nav-item" href="../dashboard-employees">
      <i class="fa-solid fa-clipboard-user"></i>
      <div>Employées</div>
    </a>
    <a class="nav-item" href="../dashboard-website">
      <i class="fa-solid fa-gears"></i>
      <div>Mon site</div>
    </a>
  </nav>
  `)
}
