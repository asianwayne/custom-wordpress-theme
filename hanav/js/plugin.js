
var swiper = new Swiper('.swiper-container', {
  pagination: '.swiper-pagination',
  nextButton: '.swiper-button-next',
  prevButton: '.swiper-button-prev',
  centeredSlides: true,
  autoplay: 3500,
  slidesPerView: 1,
  paginationClickable: true,
  autoplayDisableOnInteraction: false,
  spaceBetween: 0,
  loop: true
});

/* tooltip.js初始化 */
$('.autoleft').tooltip({
  align: 'autoLeft',
  fade: {
    duration: 200,
    opacity: 0.8
  }
});

jQuery('.sticky').positionSticky({ offsetTop: 78 });