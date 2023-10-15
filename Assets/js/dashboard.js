$(document).ready(async function () {
  console.log("dashboard.js Loaded");
  $("#overlay").hide();
  if (checkMobile()) {
    $(".app").html(`
      <div class="mobile-warning">Accés impossible sur mobile</div>
    `);
  }
  displayOpenDaysSelectOptions();
  displayCars(20);
  displayMessages(20);
});

function onClick(selector, callback) {
  $(document).on("click", selector, callback);
}
$(document)
  .find("#overlay")
  .mousemove(function (e) {
    $("#tooltip").css({
      left: e.pageX + 10,
      top: e.pageY - 30,
    });
  });
$(document)
  .on("mouseenter", "#overlay", function (e) {
    $("#tooltip").show();
  })
  .on("mouseleave", "#overlay", function () {
    $("#tooltip").hide();
  });
onClick("#overlay", function () {
  $("#drawer,#overlay").hide();
});
onClick(".nav-item", function () {
  $(this).addClass("active");
});

function displayCars(number) {
  let i = 0;
  while (i <= number) {
    i++;
    $("#showroom .cars-list").append(`
    <div class="card" data-id="${i}">
      <div class="buttons">
        <div class="update-car rounded-btn"><i class="fa-solid fa-pen-to-square"></i></div>
        <div class="delete-car rounded-btn"><i class="fa-solid fa-trash-can"></i></div>
      </div>
      <img src="img/campbell-3ZUsNJhi_Ik-unsplash.jpg" alt="" />
      <div class="wrapper">
        <div class="car-name title">Porsche 911</div>
        <div class="price">20 000 €</div>
        <div class="details">
          <div>2020</div>
          <div class="spacer">•</div>
          <div>289439 Km</div>
          <div class="spacer">•</div>
          <div>V6 biturbo</div>
        </div>
      </div>
    </div>
    `);
  }
}

function displayMessages(number) {
  let i = 0;
  while (i <= number) {
    i++;
    $("#messages .messages-list").append(`
    <div class="message">
      <div class="name">User Test</div>
      <div class="date">01/01/2000</div>
      <div class="subject"><span>Sujet : </span>Lorem ipsum dolor sit amet consectetur adipisicing.</div>
    </div>
    `);
  }
}

function displayOpenDaysSelectOptions() {
  let i = 0;
  let page = $("#website .open-days");
  let morningSelect = page.find('select[data-type="morning"]');
  let eveningSelect = page.find('select[data-type="evening"]');
  morningSelect.html("<option>Heure</option>");
  eveningSelect.html("<option>Heure</option>");
  while (i <= 12) {
    i++;
    morningSelect.append(`
  <option value="${i}">${i} h</option>
  `);
  }
  while (i <= 24) {
    i++;
    eveningSelect.append(`
  <option value="${i}">${i == 24 ? "00" : i} h</option>
  `);
  }
}

function displayDrawer() {
  $("#overlay").show();
  $("#drawer").fadeIn(200, function () {
    $(this).css("display", "grid");
  });
}
onClick(".add-car,.update-car", displayDrawer);
onClick(".add-employee,.update-employee", displayDrawer);
onClick(".add-comment,.update-comment", displayDrawer);
onClick(".add-service,.update-service", displayDrawer);

$(document)
  .find(".input-file")
  .change(function () {
    showImage(this);
  });
  
  function showImage(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
      $(".input-file-preview").show()
      $(".input-file-preview").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
