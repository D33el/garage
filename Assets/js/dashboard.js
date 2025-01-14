$(document).ready(async function () {
  console.log("dashboard.js Loaded");
  $("#overlay").hide();
  if (checkMobile()) {
    $(".app").html(`<div class="mobile-warning">Accés impossible sur mobile</div>`);
  }
  displayOpenDaysSelectOptions();
  displayCarsYearsSelect();
  displaySelectedNavItem();
  displayCommentStars();
  checkRoles()
});
function checkRoles() {
  let role = $('.profile .role').html()
  if(role == 'employe') $('.nav-item[data-id="employees"],.nav-item[data-id="website"]').hide()
}
function displayCommentStars() {
  $(".comments-list .comment-card .stars").each(function () {
    let rating = $(this).data("id");
    $(this).empty();
    for (let i = 0; i < rating; i++) {
      $(this).append('<i class="fas fa-star"></i>');
    }
  });
}
function displaySelectedNavItem() {
  let pathname = window.location.pathname;
  $(".nav-item");
  switch (pathname) {
    case "/dashboard-comments":
      $('.nav-item[data-id="comments"]').addClass("active");
      break;
    case "/dashboard-employees":
      $('.nav-item[data-id="employees"]').addClass("active");
      break;
    case "/dashboard-messages":
      $('.nav-item[data-id="messages"]').addClass("active");
      break;
    case "/dashboard-website":
      $('.nav-item[data-id="website"]').addClass("active");
      break;
    case "/dashboard-showroom":
      $('.nav-item[data-id="showroom"]').addClass("active");
      break;
    default:
      break;
  }
}
function onClick(selector, callback) {
  $(document).on("click", selector, callback);
}
$(document)
  .find("#overlay")
  .mousemove(function (e) {
    $("#tooltip").css({
      left: e.pageX,
      top: e.pageY - 10,
      transform: "translate(-50%,100%)",
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
  $(".drawer,#overlay,.popup").hide();
});
onClick(".nav-item", function () {
  $(this).addClass("active");
});

function displayCarsYearsSelect() {
  const currentYear = new Date().getFullYear();
  const yearsArray = Array.from({ length: currentYear - 1999 }, (_, index) => currentYear - index);
  for (const year of yearsArray) {
    $(".drawer .year-select").append(`
    <option value='${year}'>${year}</option>
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

function displayDrawer(type) {
  $("#overlay").show();
  switch (type) {
    case "add":
      $(".drawer[data-id='add']").fadeIn(200, function () {
        $(this).css("display", "grid");
      });
      break;
    case "update":
      $(".drawer[data-id='update']").fadeIn(200, function () {
        $(this).css("display", "grid");
      });
      break;

    default:
      break;
  }
}
onClick(".add-car", () => {
  displayDrawer("add");
});
onClick(".add-employee", () => {
  displayDrawer("add");
});
onClick(".add-comment", () => {
  displayDrawer("add");
});
onClick(".add-service", () => {
  displayDrawer("add");
});

function displayUpdateDrawer(obj) {
  console.log(obj);
  let container = $('.drawer[data-id="update"]');
  container.find("input").each(function () {
    const name = $(this).attr('name');
    if (name == "imageprincipale" || name == "imageService") $(".input-file-preview").attr("src", "../" + obj[name]);
    if (name != "password") $(this).attr("value", obj[name]);
  });
  container.find('textarea').each(function() {
    const name = $(this).attr('name');
    $(this).html(obj[name]);
  });
  container.find('select').each(function() {
    const name = $(this).attr('name');
    $(this).find(`option[value="${obj[name].toLowerCase()}"]`).prop('selected', true);
  });
}

onClick(".update-car", async function (e) {
  e.stopPropagation();
  displayDrawer("update");
  let id = $(this).data("id");
  await $.ajax({
    type: "post",
    url: "../controllers/voituresController.php",
    data: { action: "getVoiture", id: id },
    success: function (response) {
      console.log("success");
      let data = JSON.parse(response);
      displayUpdateDrawer(data[0]);
    },
    error: function (error) {
      console.log(error);
    },
  });
});

onClick(".update-employee", async function () {
  displayDrawer("update");
  let id = $(this).data("id");
  await $.ajax({
    type: "post",
    url: "../Controllers/UserController.php",
    data: { action: "getAll", id: id },
    success: function (response) {
      console.log("success");
      let data = JSON.parse(response);
      displayUpdateDrawer(data[0]);
    },
    error: function (error) {
      console.log(error);
    },
  });
});

onClick(".update-service", async function () {
  displayDrawer("update");
  let id = $(this).data("id");
  await $.ajax({
    type: "post",
    url: "../Controllers/servicesController.php",
    data: {action:"getService", id:id},
    success: function (response) {
      console.log("success");
      let data = JSON.parse(response);
      displayUpdateDrawer(data[0]);
    },
    error: function (error) {
      console.log(error);
    },
  });
});

$(document)
  .find(".input-file")
  .change(function () {
    showImage(this);
  });

function showImage(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $(".input-file-preview").show();
      $(".input-file-preview").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

onClick(".message", function () {
  let id = $(this).data("id");
  $(".message-preview .empty,.message-container").hide();
  $(`.message-container[data-id='${id}']`).show();
});

onClick(".delete-btn", function (e) {
  e.stopPropagation();
  let id = $(this).data("id");
  $(".popup,#overlay").show();
  $(".popup").find("input").val(id);
});
onClick(".abort", function () {
  $(".popup,#overlay").hide();
});

$(document).on("click", "#save", function () {
  $(".open-days-submit").click();
});

$(document).on("click", ".cars-list .card", function (e) {
  e.preventDefault();
  let id = $(this).data("id");
  window.location.href = `../car?id=${id}`;
});
