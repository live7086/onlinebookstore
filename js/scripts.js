/*!
* Start Bootstrap - Shop Homepage v5.0.5 (https://startbootstrap.com/template/shop-homepage)
* Copyright 2013-2022 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-shop-homepage/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project
$(".popup-btn").click(function() {
    var href = $(this).attr("href")
    $(href).fadeIn(250);
    $(href).children$("popup-box").removeClass("transform-out").addClass("transform-in");
    e.preventDefault();
  });
  
  $(".popup-close").click(function() {
    closeWindow();
  });
  // $(".popup-wrap").click(function(){
  //   closeWindow();
  // })
  function closeWindow(){
    $(".popup-wrap").fadeOut(200);
    $(".popup-box").removeClass("transform-in").addClass("transform-out");
    event.preventDefault();
  }
  const imageUpload = document.getElementById('imageUpload');
  const label = imageUpload.previousElementSibling;

  label.addEventListener('click', function() {
    imageUpload.click();
});
