/* Slicknav initialization */
jQuery(document).ready(function ($) {
  //Make the menu responsive
  $("#menu-main-navigation").slicknav({
    //customizing location to where this element menu will be in
    //appendTo: ".site-header",
  });

  // Run the bxSlider library on testimonials
  //pass object for bxslider options
  $(".testimonials-list").bxSlider({
    controls: false,
    mode: "fade",
  });

  //when the page is ready add the fixed menu if the position is greater than 300px
  const headerScroll = document.querySelector(".navigation-bar");
  const rect = headerScroll.getBoundingClientRect();
  const topDistance = Math.abs(rect.top);
  fixedMenu(topDistance);
});

window.onscroll = () => {
  const scroll = window.scrollY;

  fixedMenu(scroll);
};

// Adds a fixed menu on top
function fixedMenu(scroll) {
  const headerScroll = document.querySelector(".navigation-bar");

  // In the case that the scroll is greater than 300 add some classes
  if (scroll > 300) {
    headerScroll.classList.add("fixed-top");
  } else {
    headerScroll.classList.remove("fixed-top");
  }
}
