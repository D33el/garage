let GV = { filters: {} };
$(document).ready(async function () {
  console.log("showroom.js Loaded");
  displayYearsSelect();
});

$(document).on("click", ".card", function (e) {
  e.preventDefault();
  let id = $(this).data("id");
  window.location.href = `../car?id=${id}`; // /${id}
});

function getParsed(currentFrom, currentTo) {
  const from = parseInt(currentFrom.val(), 10);
  const to = parseInt(currentTo.val(), 10);
  $(".from-value").html(from);
  to == 100000 ?$(".to-value").html(to +'+ '):$(".to-value").html(to);
  return [from, to];
}

function fillSlider(from, to, sliderColor, rangeColor, controlSlider) {
  const rangeDistance = to.attr("max") - to.attr("min");
  const fromPosition = from.val() - to.attr("min");
  const toPosition = to.val() - to.attr("min");
  controlSlider.css(
    "background",
    `linear-gradient(
      to right,
      ${sliderColor} 0%,
      ${sliderColor} ${(fromPosition / rangeDistance) * 100}%,
      ${rangeColor} ${(fromPosition / rangeDistance) * 100}%,
      ${rangeColor} ${(toPosition / rangeDistance) * 100}%,
      ${sliderColor} ${(toPosition / rangeDistance) * 100}%,
      ${sliderColor} 100%)`
  );
}

function setToggleAccessible(currentTarget) {
  const toSlider = $("#toSlider");
  if (Number(currentTarget.val()) <= 0) {
    toSlider.css("z-index", 2);
  } else {
    toSlider.css("z-index", 0);
  }
}

function controlFromInput(fromSlider, fromInput, toInput, controlSlider) {
  const [from, to] = getParsed(fromInput, toInput);
  fillSlider(fromInput, toInput, "#C6C6C6", "var(--clr-primary)", controlSlider);
  if (from > to) {
    fromSlider.val(to);
    fromInput.val(to);
  } else {
    fromSlider.val(from);
  }
}

function controlToInput(toSlider, fromInput, toInput, controlSlider) {
  const [from, to] = getParsed(fromInput, toInput);
  fillSlider(fromInput, toInput, "#C6C6C6", "var(--clr-primary)", controlSlider);
  setToggleAccessible(toInput);
  if (from <= to) {
    toSlider.val(to);
    toInput.val(to);
  } else {
    toInput.val(from);
  }
}

function controlFromSlider(fromSlider, toSlider, fromInput) {
  const [from, to] = getParsed(fromSlider, toSlider);
  fillSlider(fromSlider, toSlider, "#C6C6C6", "var(--clr-primary)", toSlider);
  if (from > to) {
    fromSlider.val(to);
    fromInput.val(to);
  } else {
    fromInput.val(from);
  }
}

function controlToSlider(fromSlider, toSlider, toInput) {
  const [from, to] = getParsed(fromSlider, toSlider);
  fillSlider(fromSlider, toSlider, "#C6C6C6", "var(--clr-primary)", toSlider);
  setToggleAccessible(toSlider);
  if (from <= to) {
    toSlider.val(to);
    toInput.val(to);
  } else {
    toInput.val(from);
    toSlider.val(from);
  }
}

const fromSlider = $("#fromSlider");
const toSlider = $("#toSlider");
const fromInput = $("#fromInput");
const toInput = $("#toInput");
fillSlider(fromSlider, toSlider, "#C6C6C6", "var(--clr-primary)", toSlider);
setToggleAccessible(toSlider);
getParsed(fromSlider, toSlider);
fromSlider.on("input", function () {
  controlFromSlider(fromSlider, toSlider, fromInput);
});

toSlider.on("input", function () {
  controlToSlider(fromSlider, toSlider, toInput);
});

fromInput.on("input", function () {
  controlFromInput(fromSlider, fromInput, toInput, toSlider);
});

toInput.on("input", function () {
  controlToInput(toSlider, fromInput, toInput, toSlider);
});

function displayYearsSelect() {
  const currentYear = new Date().getFullYear();
  const yearsArray = Array.from({ length: currentYear - 1999 }, (_, index) => currentYear - index);
  for (const year of yearsArray) {
    $("#year-filter-select").append(`
    <option value='${year}'>${year}</option>
    `);
  }
}
$(document).on(
  "input",
  ".price-filter input, #year-filter-select, #boite-filter-select, #carburant-filter-select",
  debounce(async function () {
    let key = $(this).data("id");
    let value = $(this).val();
    GV.filters[key] = value;
    await getFilteredCars();
  }, 500)
);

async function getFilteredCars() {
  let filters = GV.filters;
  filters.fromPrice = filters.fromPrice ?? 1000
  filters.toPrice = filters.toPrice ?? 100000
  console.log(filters);
  await $.ajax({
    type: "post",
    url: "../Models/voiture.php",
    data: { 
      action: "filterShowroom", 
      fromPrice: filters.fromPrice, 
      toPrice: filters.toPrice, 
      annee: filters.annee, boite: 
      filters.boite, carburant: 
      filters.carburant 
    },
    success: function (response) {
      console.log("success");
      console.log(response);
      //let data = JSON.parse(response);
      //GV.filteredCars = data;
    },
    error: function (error) {
      console.log(error);
    },
  });
}

function debounce(func, delay) {
  let timeoutId;
  return function () {
    const context = this;
    const args = arguments;
    clearTimeout(timeoutId);
    timeoutId = setTimeout(function () {
      func.apply(context, args);
    }, delay);
  };
}
