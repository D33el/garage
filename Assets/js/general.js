

$(document).ready(async function () {
  console.log("General.js Loaded");
  if (window.location.pathname.includes("dashboard")) displaySidebar()
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
    let header = $('header')
    let name =  header.data('name')
    let type = header.data('type')
    header.html(`
    <img src="img/garage-logo.png" alt="" class="brand">
    <form method="post">
    <button id="logout" type="submit" name="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></button>
    </form>
    <div class="profile">
      <div class="avatar">${getFirstLetters(name)}</div>
      <div class="wrap">
        <div class="name">${name}</div>
        <div class="role">${type}</div>
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

function displaySidebar() {
  $('.sidebar').html(`
  <nav>
    <a class="nav-item" href="../dashboard-showroom" data-id="showroom">
      <i class="fa-solid fa-car-side"></i>
      <div>Showroom</div>
    </a>
    <a class="nav-item" href="../dashboard-messages" data-id="messages">
      <i class="fa-solid fa-envelope"></i>
      <div>Messages</div>
    </a>
    <a class="nav-item" href="../dashboard-comments" data-id="comments">
      <i class="fa-solid fa-comments"></i>
      <div>Commentaires</div>
    </a>
    <a class="nav-item" href="../dashboard-employees" data-id="employees" ${$('header').data('type')== 'employe' ? 'display:none':""}>
      <i class="fa-solid fa-clipboard-user"></i>
      <div>Employées</div>
    </a>
    <a class="nav-item" href="../dashboard-website" data-id="website" ${$('header').data('type')== 'employe' ? 'display:none':""}>
      <i class="fa-solid fa-gears"></i>
      <div>Mon site</div>
    </a>
  </nav>
  `)
}

function getFirstLetters(str) {
  const words = str.split(" ");
  let letters = "";
  for (const word of words) {
    letters += word.charAt(0).toUpperCase();
  }
  return letters;
}