jQuery(document).ready(($) => {
  //菜单
    var surl = location.href;
  var surl2 = $(".sitemap a:eq(1)").attr("href");
  $("#starlist li a").each(function() {
    if ($(this).attr("href")==surl || $(this).attr("href")==surl2) $(this).parent().addClass("selected")
  });
    $('#starlist .sub-nav').before('<em class="dot"><i class="wordicon-arrow-down"></i></em>');
  $('.dot').click(function () {  
  if($('#starlist').hasClass('active')){  
      $(this).next().slideToggle();
     }
  });
  $('.mobile-menu').click(function () {
    $("#starlist").toggleClass("active");
  $(".fademask").toggleClass("active");
  });
    $('#starlist li').hover(function(){
       $(this).addClass('on');  
     },
   function(){
       $(this).removeClass('on'); 
    });
  $(document).bind("click", function (e) {
    if ($('.mobile-menu').is(":visible") && !$(e.target).closest(".mobile-menu").length && !$(e.target).closest("#starlist").length) {
      $("#starlist").removeClass("active");
      $(".fademask").removeClass("active");
    }
  });
//搜索
  $('.search-btn').click(function () {
    $(".b-nav-search_wrap").toggleClass("active");
  });
  $(document).bind("click", function (e) {
    if ($('.search-btn').is(":visible") && !$(e.target).closest(".search-btn").length && !$(e.target).closest(".b-nav-search_wrap").length) {
      $(".b-nav-search_wrap").removeClass("active");
    }
  });
//导航隐藏
    var new_scroll_position = 0;
  var last_scroll_position;
  var header = document.getElementById("header");
  window.addEventListener('scroll', function(e) {
    last_scroll_position = window.scrollY;
    // Scrolling down
    if (new_scroll_position < last_scroll_position && last_scroll_position > 80) {
    header.classList.add("slideUp");
    // Scrolling up
    } else if (new_scroll_position > last_scroll_position) {
    header.classList.remove("slideUp");
    }
    new_scroll_position = last_scroll_position;
  });
//返回顶部
  $("#go-to-top").click(function () {
    $("html, body").animate({
      scrollTop: 0
    }, 300);
    return false;
  });
  var Sctop = $(window).scrollTop(),
    Snum = 500;
  if (Sctop > Snum) {
    $("#go-to-top").addClass("active");
  }
  $(window).scroll(function () {
    Sctop = $(window).scrollTop();
    if (Sctop > Snum) {
      $("#go-to-top").addClass("active");
    } else {
      $("#go-to-top").removeClass("active");
    }
  });

});

