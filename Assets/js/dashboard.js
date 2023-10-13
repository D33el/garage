$(document).ready(async function () {
  console.log("dashboard.js Loaded");
  if (checkMobile()) {
    $(".app").html(`
      <div class="mobile-warning">Accés impossible sur mobile</div>
    `);
  }
});

$(document).on('click','.nav-item',function () {
  $(this).addClass('active');
})