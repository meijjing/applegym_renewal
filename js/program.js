  /*
  JavaScript Document
  program.js
  */

  jQuery(document).ready(function () {

    // 페이지 이동 후 프로그램 까지 위치 이동
    var page_url = document.location.href;
    var page_id = page_url.substring(page_url.lastIndexOf("#") + 1);
    // alter(page_id);

    if (page_id == 'section1') {
      $('html, body').animate({
        scrollTop: $('#scroll_' + page_id).offset().top
      }, 500);
    } else if (page_id == 'section2') {
      $('html, body').animate({
        scrollTop: $('#scroll_' + page_id).offset().top
      }, 500);
    } else if (page_id == 'section3') {
      $('html, body').animate({
        scrollTop: $('#scroll_' + page_id).offset().top
      }, 500);
    } else if (page_id == 'section4') {
      $('html, body').animate({
        scrollTop: $('#scroll_' + page_id).offset().top
      }, 500);
    } else if (page_id == 'section5') {
      $('html, body').animate({
        scrollTop: $('#scroll_' + page_id).offset().top
      }, 500);
    } else if (page_id == 'section6') {
      $('html, body').animate({
        scrollTop: $('#scroll_' + page_id).offset().top
      }, 500);
    };

  });