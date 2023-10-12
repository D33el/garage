$(document).ready(async function () {
  console.log("showroom.js Loaded");
});

$('.card').click(function (e) { 
  e.preventDefault();
  let id = $(this).data("id")
  window.location.href = '../car-details?id=' +id
});