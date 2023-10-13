$(document).ready(async function () {
  console.log("General.js Loaded");
  displayHeaderFooter();
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
    // $("header").html(`
    
    // `);
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
