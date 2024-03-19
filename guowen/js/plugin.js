jQuery(document).ready(($) => {
  //夜间模式切换
  $('.switch_mode').on('click', switchNightMode);
  
    function switchNightMode(e) {
      e.preventDefault();
      if ($('body').hasClass('night')) {
        $('body').removeClass('night');
        $('.jznight span').removeClass('wordicon-moon-fill');
        $(".jznight a").attr("title", "关灯");
      } else {
        $('body').addClass('night');
        $('.jznight span').addClass('wordicon-moon-fill');
        $(".jznight a").attr("title", "开灯");
      }
    };
  

  var _topnews = document.getElementById("topnews");
  var _topnews_li = _topnews.getElementsByTagName("li");
  var m = 0;
  var timer = setInterval(movenews, 3000);
  function movenews() {
    for (var i = 0; i < _topnews_li.length; i++) {
      _topnews_li[i].classList.remove('cur');
    }
    _topnews_li[m].classList.add('cur');
    m++;
    if (m > _topnews_li.length - 1) {
      m = 0;
    }
  }
  _topnews.onmouseover = function () {
    window.clearInterval(timer);
  }
  _topnews.onmouseout = function () {
    timer = setInterval(movenews, 3000);
  }
});