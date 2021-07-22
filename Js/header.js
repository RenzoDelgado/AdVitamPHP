window.sr = ScrollReveal();
$(document).ready(function () {

  $(window).scroll(function () {
    if ($(this).scrollTop() > 0) {
      $("#HeaderUp").addClass("DisableHeaderUp"); 
    } else {
       $("#HeaderUp").removeClass("DisableHeaderUp");
    }
  });
});

