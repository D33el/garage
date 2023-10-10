$(document).ready(async function () {
  console.log("showroom.js Loaded");
});

$('.card').click(function (e) { 
  e.preventDefault();
  window.location.href = 'car-details.html'
});