$(document).ready(async function () {
  console.log("home.js Loaded");
  displayCommentStars()
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

$(document).on('click', '#comments .form-container .stars i', function () {
  $('#comments .form-container .stars i').removeClass('yellow');
  $(this).addClass('yellow');
  $(this).prevAll('i').addClass('yellow');
  let rate = $('#comments .form-container .stars i.yellow').length
  $('#comments .form-container .stars-input').val(rate)
});

function displayCommentStars() {
  let starContainer = $('#comments .card .stars')
  $.each(starContainer, () => { 
    $(this).empty()
    for (let i = 0; i < $(this).data('id'); i++) $(this).append('<i class="fa-solid fa-star"></i>')
  });
}
