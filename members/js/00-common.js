/* 
JavaScript Document
00-common
 */

// jQuery.noConflict();
jQuery(document).ready(function () {

  /* 하이퍼링크 */
  $("a[href='#']").click(function (e) {
    e.preventDefault();
  });

  /* AOS 작동 */
  // AOS.init({
  //   // disable on internet explorer
  //   disable:  function msieversion() {
  //     return !!(window.navigator.userAgent.indexOf("MSIE ") > 0 || navigator.userAgent.match(
  //     /Trident.*rv\:11\./))
  //     }
  // });


  // function AOS_MOBILE() {
  //   if (matchMedia("screen and (min-width: 768px)").matches) {
  //     $('.aos').attr('data-aos', 'fade-down');
  //   }
  // };
  // AOS_MOBILE();


  /* 반응형 메뉴 토글 */
  $(".gnb").before("<a href=\"#\" class=\"menu-toggle-btn\"></a>");

  $(".gnb > li").hover(
    function (e) {
      if ($(window).width() >= 768) {
        $(this).children(".submenu").slideDown(150);
        e.preventDefault();
      }
    },
    function (e) {
      if ($(window).width() >= 768) {
        $(this).children(".submenu").slideUp(150);
        e.preventDefault();
      }
    }
  );

  $(".menu_toggle_btn").on('click', function (e) {
    if ($(e.target).parents('.nav').length === 0)
      $(".gnb").slideUp('show-on-mobile');
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

  $(".menu-toggle-btn").click(function (e) {
    $(".gnb").slideToggle('show-on-mobile');
    e.preventDefault();
  });




  // 상단바 고정
  // $(window).scroll(function () {
  //   if ($(document).scrollTop() > 50) {
  //     $('nav').addClass('shrink');
  //   } else {
  //     $('nav').removeClass('shrink');
  //   }
  // });

  // var jbOffset = $( '.header' ).offset();
  $( window ).scroll( function() {
    if ( $( document ).scrollTop() > 100 ) {
      $( '.header' ).addClass( 'shrink' );
    }
    else {
      $( '.header' ).removeClass( 'shrink' );
    }
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
