$(document).ready(async function () {
  console.log("dashboard.js Loaded");
  $("#overlay").hide();
  if (checkMobile()) {
    $(".app").html(`<div class="mobile-warning">Accés impossible sur mobile</div>`);
  }
  displayOpenDaysSelectOptions();
  displayCarsYearsSelect()
  displaySelectedNavItem();
});
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
  $("#drawer,#overlay,.popup").hide();
});
onClick(".nav-item", function () {
  $(this).addClass("active");
});

function displayCarsYearsSelect() {
  const currentYear = new Date().getFullYear();
const yearsArray = Array.from({ length: currentYear - 1999 }, (_, index) => currentYear - index);
  for (const year of yearsArray) {
    $('#drawer .year-select').append(`
    <option value='${year}'>${year}</option>
    `)
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
      $(".input-file-preview").show();
      $(".input-file-preview").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

onClick(".message", function () {
  let id = $(this).data('id')
  $('.message-preview .empty,.message-container').hide()
  $(`.message-container[data-id='${id}']`).show()
});

onClick('.delete-btn',function () {
  let id = $(this).data('id')
  $('.popup,#overlay').show()
  $('.popup').find('input').val(id)
})
onClick('.abort',function () {
  $('.popup,#overlay').hide()
})



$(document).on('click','#save',function(){
  $('.open-days-submit').click()
})