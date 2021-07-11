/* 
JavaScript Document
admin_common.js
 */

jQuery(document).ready(function () {

  /* 하이퍼링크 */
  $("a[href='#']").click(function (e) {
    e.preventDefault();
  });
});

function openNav() {
  $('.nav').toggleClass('show_on_mobile');

};


// });
