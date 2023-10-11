$(document).ready(async function () {
  console.log("index.js Loaded");
  if (window.location.hash) {
    let section = window.location.hash;
    let offset = 30;
    $("html, body").animate(
      {
        scrollTop: $(section).offset().top - offset,
      },
      300
    );
  }
});
