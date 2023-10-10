$(document).ready(async function () {
  console.log("General.js Loaded");
  displayHeaderFooter();
});

function displayHeaderFooter() {
  $("header").html(`
    <img src="img/garage-logo.png" alt="logo garage v.parrot" class="brand" />
    <nav>
      <a href="index.html" class="nav-item">Accueil</a>
      <a href="showroom.html" class="nav-item">Showroom</a>
      <a href="comments.html" class="nav-item">Temoignages</a>
      <div class="nav-item scrollTo" data-id="#contact">Contact</div>
    </nav>
  `);
  $("footer").html(`
    <img src="img/garage-logo.png" class="brand" />
    <div class="copyright">Copyright 2023 - Garage V. Parrot</div>
    <div class="contacts">
      <div><span>Telephone : </span>1234567890</div>
      <div><span>Email : </span>email@email.com</div>
      <div><span>Addresse : </span>12 rue paris, paris, france</div>
    </div>
  `);
}
