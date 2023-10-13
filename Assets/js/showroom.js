$(document).ready(async function () {
  console.log("showroom.js Loaded");
  displayCars(50)
});

$('.card').click(function (e) { 
  e.preventDefault();
  let id = $(this).data("id")
  window.location.href = `../car` //?id=${id}
});

function displayCars(number) {
  let i = 0
  while (i<=number){
    i++
    $('#cars-list').append(`
    <div class="card" data-id="${number}">
      <img src="img/campbell-3ZUsNJhi_Ik-unsplash.jpg" alt="" />
      <div class="wrapper">
        <div class="car-name title">Porsche 911</div>
        <div class="price">20 000 €</div>
        <div class="details">
          <div>2020</div>
          <div class="spacer">•</div>
          <div>289439 Km</div>
        </div>
      </div>
    </div>
    `);
  }
}