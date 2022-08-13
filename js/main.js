window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 500) {
    document.getElementById("navbar").classList.add("navscrolled");
  } else {
    document.getElementById("navbar").classList.remove("navscrolled");

  }
}