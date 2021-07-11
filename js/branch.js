/* 
JavaScript Document
07-branch
*/


// jQuery.noConflict();
jQuery(document).ready(function () {


    /* 스케쥴 탭 메뉴 */
    $(".tab_tit li").click(function () {
        var idx = $(this).index();
        $(".tab_tit li").removeClass("on");
        $(".tab_tit li").eq(idx).addClass("on");
        $(".tab_con > div").hide();
        $(".tab_con > div").eq(idx).show();
    });

});



/* 갤러리 이미지 슬라이드 */
jQuery(document).ready(function () {
    $(".gallery_slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: ".thumb_slider",

        autoplay: true,
        autoplaySpeed: 2000,

        cssEae: 'ease',
        easing: 'linear',

        infinite: true,
        pauseOnFocus: true,
        pauseOnHover: true,
        // draggable: true,
        // touchMove: true,
        focusOnselect: true,


    });


    $(".thumb_slider").slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: true,

        speed: 1000,
        asNavFor: ".gallery_slider",
        // draggable: true,
        // touchMove: true,
        focusOnSelect: true,

        // appendArrows: $(),
        // appedndDots: $(),

        // precArrow: "<button type='button' class='slick-prev'></button>",
        // nextArrow: "<button type='button' class='slick-next'></button>",

        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1
            }
        }]


    });
});



/*  */