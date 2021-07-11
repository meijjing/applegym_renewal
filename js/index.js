/* 01-main JavaScript */

jQuery(document).ready(function () {

  // 하이퍼링크
  $("a[href='#']").click(function (e) {
    e.preventDefault();
  });


  // 상단 공지사항
  // $(function () {
  //   $("#top-notice button").click(function () {
  //     $("#top-notice").slideUp();
  //     $(".content").animate({
  //       top: 0
  //     });
  //   });
  // });


  /* 반응형 메뉴 토글 */
  $(".gnb").before("<a href=\"\" class=\"menu_toggle_btn\"></a>");

  $(".nav > ul > li").hover(
    function (e) {
      if ($(window).width() >= 768) {
        $(this).children("ul").slideDown(150);
        e.preventDefault();
      }
    },
    function (e) {
      if ($(window).width() >= 768) {
        $(this).children("ul").slideUp(150);
        e.preventDefault();
      }
    }
  );

  $('menu_toggle_btn').on('click', function (e) {
    if ($(e.target).parents('.nav').length === 0)
      $(".gnb").removeClass('show-on-mobile');
  });

  $(".gnb > li").click(function () {

    var thisMenu = $(this).children("ul");
    var prevState = thisMenu.css('display');
    $(".submenu").slideUp();
    if ($(window).width() < 768) {
      if (prevState !== 'block')
        thisMenu.slideDown(150);
    }
  });

  $(".menu_toggle_btn").click(function (e) {
    $(".gnb").slideToggle('show-on-mobile');
    e.preventDefault();
  });




  // 상단바 고정
  // var jbOffset = $( '.header' ).offset();
  $( window ).scroll( function() {
    if ( $( document ).scrollTop() > 100 ) {
      $( '.header' ).addClass( 'shrink' );
    }
    else {
      $( '.header' ).removeClass( 'shrink' );
    }
  });


  /* 이벤트 메뉴 */
  $('.eventimgs').slick({
    slide: 'div',
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    draggable: true,
    dots: false,
    dotsClass: "slick-dots",
    arrows: true,
    prevArrow: "<button type='button' class='slick-prev'></button>",
    nextArrow: "<button type='button' class='slick-next'></button>",

    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: true,
          dots: false,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: true,
          dotsClass: "slick-dots",
        }
      }
    ]
  });

  // 카운터
  $('.counter').counterUp({
    delay: 10,
    time: 3000
  });


  /* 스크롤시 circle progress */
  //Scroll Progress Indicator
  var progressPath = document.querySelector('.progress-bar');
  var pathLength = progressPath.getTotalLength();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
  progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
  progressPath.style.strokeDashoffset = pathLength;
  progressPath.getBoundingClientRect();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
  var updateProgress = function () {
    var scroll = $(window).scrollTop();
    var height = $(document).height() - $(window).height();
    var progress = pathLength - (scroll * pathLength / height);
    progressPath.style.strokeDashoffset = progress;
  }
  updateProgress();
  $(window).scroll(updateProgress);
  var offset = 50;
  var duration = 550;
  jQuery(window).on('scroll', function () {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.progress-section').addClass('active-progress');
    } else {
      jQuery('.progress-section').removeClass('active-progress');
    }
  });
  jQuery('.progress-section').on('click', function (event) {
    event.preventDefault();
    jQuery('html, body').animate({
      scrollTop: 0
    }, duration);
    return false;
  });
  jQuery(window).on('scroll', function () {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.chat-wrap').addClass('active');
    } else {
      jQuery('.chat-wrap').removeClass('active');
    }
  });











});
