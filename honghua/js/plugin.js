'use strict'
jQuery(document).ready(($) => {
  var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    paginationClickable: '.swiper-pagination',
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    spaceBetween: 30
  });

  function player1(id) {
    var id = document.getElementById(id)
    id.style.display = "block";
  }
  function clocer1(id) {
    var id = document.getElementById(id)
    id.style.display = "none";
  }

  //hy_top wx
  function player1(id) {
    var id = document.getElementById(id);
    id.style.display = "block";
  }
  function clocer1(id) {
    var id = document.getElementById(id);
    id.style.display = "none";
  }
  new iScroll('wrapper', { vScroll: true, hScrollbar: false, vScrollbar: false });
  new iScroll('wrapper2', { vScroll: true, hScrollbar: false, vScrollbar: false });
  new iScroll('wrapper3', { vScroll: true, hScrollbar: false, vScrollbar: false });
  
  $(".fullSlide").hover(function () {
    $(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.5)
  },
    function () {
      $(this).find(".prev,.next").fadeOut()
    });
  $(".fullSlide").slide({
    titCell: ".hd ul",
    mainCell: ".bd ul",
    effect: "fold",
    autoPlay: true,
    autoPage: true,
    trigger: "click",
    startFun: function (i) {
      var curLi = jQuery(".fullSlide .bd li").eq(i);
      if (!!curLi.attr("_src")) {
        curLi.css("background-image", curLi.attr("_src")).removeAttr("_src")
      }
    }
  });

  $('#click_mmeun').click(function () {
    $('.mobile-nav').toggle();
  });
})