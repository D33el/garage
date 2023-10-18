$(document).ready(async function () {
    console.log('login.js loaded');
    if (checkMobile()) {
        $(".app").html(`<div class="mobile-warning">Accés impossible sur mobile</div>`);
      }
});