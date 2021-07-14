<!-- branch_yeoksam.php -->
<?php
session_start();

$s_id = isset($_SESSION["s_id"])? $_SESSION["s_id"]:"";
$s_name = isset($_SESSION["s_name"])? $_SESSION["s_name"]:"";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no, 
  maximum-scale=1.0, minimum-scale=1.0">
  <title>애플짐 피트니스</title>

  <!-- favicon -->
  <link rel="shortcut icon" href="../images/favicon.ico">
  <link rel="icon" href="../images/favicon.ico">
  <link rel="apple-touch-icon" href="../images/favicon.ico">

  <!-- CSS -->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/slogan.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/branch_css/branch_yeoksam.css">

  <!-- jQuery -->
  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/common.js" defer></script>
  <script src="../js/branch.js" defer></script>

  <!-- naver map API -->
  <script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=jb08slflob"></script>

  <!-- aos -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- slick -->
  <link rel="stylesheet" href="../css/slick.css">
  <script src="../js/slick.min.js" defer></script>
</head>
<body>
  <div id="wrap">

  <?php include "../header.php"; ?>

    <section class="main_section">
      <div class="main_img">
        <h2 class="blind">역삼점</h2>
        <p class="blind">역삼동 1500평 대형 피트니스 센터</p>
        <img src="../images/07-branch/yeoksam_main.jpg" alt="">

        <!-- aside -->
        <aside class="aside">
          <ul>
            <li><a class="on_menu" href="branch_yeoksam.php">역삼점</a></li>
            <li><a class="aside_menu" href="#">대치점</a></li>
            <li><a class="aside_menu" href="#">목동점
              </a></li>
          </ul>
        </aside>
      </div>
    </section>

    <!-- contents -->
    <section class="contents">

      <section class="intro_section">
        <div class="container">
          <h3 class="blind">애플짐 피트니스 역삼점</h3>
          <img data-aos="fade-right" data-aos-duration="800" class="info_title"
            src="../images/07-branch/yeoksam_info_title.png" alt="">
          <p class="blind">역삼동 1500평 대형 피트니스 센터</p>
          <img data-aos="fade-right" data-aos-duration="800" class="info_img" src="../images/07-branch/yeoksam_info.png"
            alt="">

          <div class="intro_wrap cfixed">

            <div data-aos="fade-right" data-aos-duration="800" class="intro_list cfixed">
              <ul>
                <li>1500평 최대 규모</li>
                <li>최신기종 유산소 기구</li>
                <li>스페셜 프리웨이트존</li>
                <li>G.X프로그램 / 스피닝</li>
                <li>온냉탕 / 사우나</li>
              </ul>
            </div>

            <div class="divider"></div>

            <div class="info_wrap cfixed">
              <div data-aos="fade-left" data-aos-duration="800" class="time_info">
                <h4>운영시간 안내</h4>
                <p><b>평일</b> 6:00-24:00</p>
                <p><b>주말</b> 8:00-22:00(공휴일 포함)</p>
                <p>둘째주, 넷째주 일요일 정기휴관일</p>
              </div>

              <div class="divider info_divider"></div>

              <div data-aos="fade-left" data-aos-duration="800" class="parking_info">
                <h4>무료주차 안내</h4>
                <p>이마트주차장 2시간 무료</p>
                <p>(주차여유공간 많음)</p>
              </div>
            </div>

            <div class="divider pc_divider"></div>
          </div><!-- intro_wrap -->
        </div><!-- container-->
      </section><!-- intro-section -->


      <section class="program_section">
        <div class="container">
          <h3 class="blind">프로그램</h3>

          <ul>
            <li data-aos="fade-right" data-aos-duration="800" class="program_fitness">
              <p class="blind">FITNESS</p>
              <img src="../images/07-branch/fitness_icon.png" alt="">
              <p class="program_desc">최신기종 유산소기구<br>스페셜 프리웨이트존</p>
            </li>

            <li data-aos="fade-right" data-aos-duration="800" class="program_pt">
              <p class="blind">PT</p>
              <img src="../images/07-branch/pt_icon.png" alt="">
              <p class="program_desc">대한스포츠의학재단 소속<br>트레이너의 전문적인<br>퍼스널트레이닝</p>
            </li>

            <li data-aos="fade-right" data-aos-duration="800" class="program_gx">
              <p class="blind">G.X</p>
              <img src="../images/07-branch/gx_icon.png" alt="">
              <p class="program_desc">최상의 전문강사와<br>함께 하는<br>30여가지의 GX프로그램</p>
            </li>

            <li data-aos="fade-right" data-aos-duration="800" class="program_pilates">
              <p class="blind">PILATES</p>
              <img src="../images/07-branch/pilates_icon.png" alt="">
              <p class="program_desc">대한스포츠의학재단 소속<br>전문 필라테스강사<br>100% 기구필라테스</p>
            </li>

            <li data-aos="fade-right" data-aos-duration="800" class="program_sauna">
              <p class="blind">SAUNA</p>
              <img src="../images/07-branch/sauna_icon.png" alt="">
              <p class="program_desc">운동도하고 땀도 빼고<br>하루에 쌓였던 피로도<br>날려보내요!</p>
            </li>

          </ul>
        </div><!-- container-->
      </section><!-- program_section -->
      <div class="m_divider"></div>


      <!-- 갤러리 -->
      <section data-aos="fade-up" data-aos-duration="800" class="gallery_section">
        <h3 class="blind">갤러리</h3>
        <img class="gallery_section_tit" src="../images/07-branch/gallery_title.png" alt="">


        <div class="gallery_list">

          <ul class="gallery_slider">
            <li><img src="../images/07-branch/yeoksam_img1.jpg" alt=""></li>
            <li><img src="../images/07-branch/yeoksam_img2.jpg" alt=""></li>
            <li><img src="../images/07-branch/yeoksam_img3.jpg" alt=""></li>
            <li><img src="../images/07-branch/yeoksam_img4.jpg" alt=""></li>
            <li><img src="../images/07-branch/yeoksam_img5.jpg" alt=""></li>
            <li><img src="../images/07-branch/yeoksam_img6.jpg" alt=""></li>
            <li><img src="../images/07-branch/yeoksam_img7.jpg" alt=""></li>
          </ul>

          <ul class="thumb_slider">
            <li><img src="../images/07-branch/yeoksam_img1.jpg" alt=""></li>
            <li><img src="../images/07-branch/yeoksam_img2.jpg" alt=""></li>
            <li><img src="../images/07-branch/yeoksam_img3.jpg" alt=""></li>
            <li><img src="../images/07-branch/yeoksam_img4.jpg" alt=""></li>
            <li><img src="../images/07-branch/yeoksam_img5.jpg" alt=""></li>
            <li><img src="../images/07-branch/yeoksam_img6.jpg" alt=""></li>
            <li><img src="../images/07-branch/yeoksam_img7.jpg" alt=""></li>
          </ul>
        </div>
      </section><!-- gallery -->


      <!-- 스케쥴 -->
      <section class="schedule_section" id="timetable">
        <h3 class="blind">스케쥴</h3>
        <img class="schedule_section_tit" src="../images/07-branch/schedule_title.png" alt="스케쥴">

        <div class="schedule_menu">

          <!-- <ul class="tab_tit">
            <li class="on"><a href="#">G.X PROGRAM</a></li>
            <li><a href="#">SPINNING</a></li>
          </ul> -->

          <div class="tab_tit">
            <ul>
              <li class="on">G.X PROGRAM</li>
              <li>SPINNING</li>
            </ul>
          </div>

          <div class="tab_con">
            <div class="on"><img src="../images/07-branch/yeoksam_schedule_gx.png" alt="gx"></div>
            <div><img src="../images/07-branch/yeoksam_schedule_spinning.png" alt="spinning"></div>
          </div>

        </div><!-- schedule_menu -->
      </section>


      <!-- address -->
      <section class="address_section">
        <h3 class="blind">ADDRESS</h3>
        <img class="address_section_tit" src="../images/07-branch/address_title.png" alt="">
        <!-- <img class="address_section_map" src="../images/07-branch/yeoksam_map.png" alt="no"> -->

        <div id="map" class="map"></div>



        <div class="location cfixed">
          <h4>주소</h4>
          <p>서울 강남구 역삼로 310 한솔필리아<br>
            (지번 : 서울 강남구 역삼동 755 한솔필리아 지하 1층 이마트 B1)</p>
        </div>

        <div class="dotline"></div>

        <div class="contact cfixed">
          <h4>연락처</h4>

          <p><b>TEL</b> 02-563-0808</p>
          <p class="kakao"><b>카카오톡</b> 애플짐휘트니스</p>
          <p class="insta"><b>인스타</b> applegym.best</p>
          <p><b>유튜브</b> 대한스포츠의학재단&애플짐휘트니스</p>

        </div>
      </section><!-- address -->


    </section><!-- contents -->



    <!-- slogan -->
    <div class="slogan">
      <h2 class="blind">슬로건</h2>
      <p><img src="../images/slogan.png" alt=""><span class="blind">DREAMS COME TRUE</span></p>
    </div>

    <?php include "../footer.php"; ?>

  </div><!-- wrap -->

  <script type="text/javascript">
    AOS.init({disable: 'mobile'});  
  </script>

<script type="text/javascript"> 

  //지도를 삽입할 HTML 요소 또는 HTML 요소의 id를 지정합니다.
  var mapDiv = document.getElementById('map'); // 'map'으로 선언해도 동일

  //옵션 없이 지도 객체를 생성하면 서울 시청을 중심으로 하는 16 레벨의 지도가 생성됩니다.
  var map = new naver.maps.Map(mapDiv);

  //지도 생성 시에 옵션을 지정할 수 있습니다.
  var map = new naver.maps.Map('map', {
          center: new naver.maps.LatLng(37.499575, 127.048529), //지도의 초기 중심 좌표
          zoom: 13, //지도의 초기 줌 레벨
          minZoom: 7, //지도의 최소 줌 레벨
          zoomControl: true, //줌 컨트롤의 표시 여부
          zoomControlOptions: { //줌 컨트롤의 옵션
              position: naver.maps.Position.TOP_RIGHT
          }
      });

  var marker = new naver.maps.Marker({
      position: new naver.maps.LatLng(37.499575, 127.048529),
      map: map
  });

  naver.maps.Event.addListener(marker, 'click', function(e) {
    var overlay = e.overlay, // marker
          position = overlay.getPosition(),
          url = 'https://map.naver.com/v5/search/%EC%95%A0%ED%94%8C%EC%A7%90%20%EC%97%AD%EC%82%BC/place/37521187?c=14142455.4992984,4508938.5048609,15,0,0,0,dh';

      window.open(url);
  });


  //setOptions 메서드를 이용해 옵션을 조정할 수도 있습니다.
  map.setOptions("mapTypeControl", true); //지도 유형 컨트롤의 표시 여부

  naver.maps.Event.addListener(map, 'zoom_changed', function (zoom) {
      console.log('zoom:' + zoom);
  });

  // 지도 인터랙션 옵션
  $("#interaction").on("click", function(e) {
      e.preventDefault();

      if (map.getOptions("draggable")) {
          map.setOptions({ //지도 인터랙션 끄기
              draggable: false,
              pinchZoom: false,
              scrollWheel: false,
              keyboardShortcuts: false,
              disableDoubleTapZoom: true,
              disableDoubleClickZoom: true,
              disableTwoFingerTapZoom: true
          });

          $(this).removeClass("control-on");
      } else {
          map.setOptions({ //지도 인터랙션 켜기
              draggable: true,
              pinchZoom: true,
              scrollWheel: true,
              keyboardShortcuts: true,
              disableDoubleTapZoom: false,
              disableDoubleClickZoom: false,
              disableTwoFingerTapZoom: false
          });

          $(this).addClass("control-on");
      }
  });

  // 관성 드래깅 옵션
  $("#kinetic").on("click", function(e) {
      e.preventDefault();

      if (map.getOptions("disableKineticPan")) {
          map.setOptions("disableKineticPan", false); //관성 드래깅 켜기
          $(this).addClass("control-on");
      } else {
          map.setOptions("disableKineticPan", true); //관성 드래깅 끄기
          $(this).removeClass("control-on");
      }
  });

  // 타일 fadeIn 효과
  $("#tile-transition").on("click", function(e) {
      e.preventDefault();

      if (map.getOptions("tileTransition")) {
          map.setOptions("tileTransition", false); //타일 fadeIn 효과 끄기

          $(this).removeClass("control-on");
      } else {
          map.setOptions("tileTransition", true); //타일 fadeIn 효과 켜기
          $(this).addClass("control-on");
      }
  });

  // min/max 줌 레벨
  $("#min-max-zoom").on("click", function(e) {
      e.preventDefault();

      if (map.getOptions("minZoom") === 10) {
          map.setOptions({
              minZoom: 7,
              maxZoom: 21
          });
          $(this).val(this.name + ': 7 ~ 21');
      } else {
          map.setOptions({
              minZoom: 10,
              maxZoom: 21
          });
          $(this).val(this.name + ': 10 ~ 21');
      }
  });

  //지도 컨트롤
  $("#controls").on("click", function(e) {
      e.preventDefault();

      if (map.getOptions("scaleControl")) {
          map.setOptions({ //모든 지도 컨트롤 숨기기
              scaleControl: false,
              logoControl: false,
              mapDataControl: false,
              zoomControl: false,
              mapTypeControl: false
          });
          $(this).removeClass('control-on');
      } else {
          map.setOptions({ //모든 지도 컨트롤 보이기
              scaleControl: true,
              logoControl: true,
              mapDataControl: true,
              zoomControl: true,
              mapTypeControl: true
          });
          $(this).addClass('control-on');
      }
  });

  $("#interaction, #tile-transition, #controls").addClass("control-on");

</script>




</body>

</html>