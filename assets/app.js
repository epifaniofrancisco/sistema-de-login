// Efeito de loading com JQuery
$(function () {
  $(".loader").fadeOut(3000, function () {
    $(".content").fadeIn(900);
  });
});