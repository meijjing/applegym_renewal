<!-- index.php -->
<?php

// 세션 실행
session_start();

$s_id = isset($_SESSION["s_id"]) ? $_SESSION["s_id"] : "";
$s_name = isset($_SESSION["s_name"]) ? $_SESSION["s_name"] : "";

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
  <link rel="shortcut icon" href="images/favicon.ico">
  <link rel="icon" href="images/favicon.ico">
  <link rel="apple-touch-icon" href="images/favicon.ico">


  <!-- CSS -->
  <link rel="stylesheet" href="css/reset.css">
  <!-- <link rel="stylesheet" href="css/00-header.css"> -->
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/index.css">


  <!-- jQuery -->
  <script src="js/jquery-3.6.0.min.js"></script>
  <!-- <script src="js/00-common.js" defer></script> -->
  <script src="js/index.js" defer></script>


  <!-- sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <!-- slick -->
  <link rel="stylesheet" href="css/slick.css">
  <script src="js/slick.min.js" defer></script>

  <!-- aos -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


  <!-- counter -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js" defer></script>
  <script src="js/jquery.counterup.min.js" defer></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>



  <?php
  // if(로그인 되었다면){
  if ($s_id) {
  ?>

  <script type="text/javascript">
  function log_out() {
    var ck = confirm("로그아웃 하시겠습니까?");
    if (ck == true) {
      location.href = "members/logout.php";
    };
  }
  </script>

  <?php
  };
  ?>

</head>

<body>
  <div id="wrap">

    <section class="info-section">
      <h2 class="blind">사용자 퀵 메뉴</h2>
      <ul class="info-list">
        <li class="info-home"><a href="index.php">HOME</a></li>
        <li class="info-calendar"><a href="branch/branch_yeoksam.php#timetable">CALENDAR</a></li>
        <li class="info-user"><a href="my/mypage.php">USER</a></li>

        <?php
        if (!$s_id) { // 로그인인 되지 않았다면
        ?>
        <li class="info-join"><a href="members/join.php">JOIN</a></li>

        <?php
        } else { // 로그인이 되었다면
        ?>

        <li class="info-logout"><a href="#" onclick="log_out()">LOGOUT</a></li>

        <?php
        };
        ?>
      </ul>
    </section><!-- info-section -->

    <!-- header -->
    <header class="header">
      <h1 class="logo"><a href="index.php">애플짐 피트니스</a></h1>

      <!-- menu -->
      <h2 class="blind">메인 메뉴</h2>
      <!-- <a href="#" class="menu-toggle-btn"></a> -->

      <nav class="nav">

        <ul class="gnb">
          <li><a href="#">브랜드</a>
            <ul class="submenu">
              <li><a href="brand/brand_aboutus.php">ABOUT US</a></li>
              <li><a href="brand/brand_history.php">HISTORY</a></li>
              <li><a href="brand/brand_business.php">BUSINESS</a></li>
            </ul>
          </li>
          <li><a href="#">지점소개</a>
            <ul class="submenu">
              <li><a href="branch/branch_yeoksam.php">역삼점</a></li>
              <li><a href="#">대치점</a></li>
              <li><a href="#">목동점</a></li>
            </ul>
          </li>
          <li><a href="#">프로그램</a>
            <ul class="submenu">
              <li><a href="program/program.php#section1">FITNESS</a></li>
              <li><a href="program/program.php#section2">PT</a></li>
              <li><a href="program/program.php#section3">G.X</a></li>
              <li><a href="program/program.php#section4">SPINNING</a></li>
              <li><a href="program/program.php#section5">PILATES</a></li>
              <li><a href="program/program.php#section6">반신욕,사우나</a></li>
            </ul>
          </li>
          <li><a href="#">소식</a>
            <ul class="submenu">
              <li><a href="board/notice.php">NOTICE</a></li>
              <li><a href="board/event.php">EVENT</a></li>
              <li><a href="board/community.php">COMMUNITY</a></li>
            </ul>
          </li>
          <li><a href="#">마이페이지</a>
            <ul class="submenu">
              <li><a href="my/mypage.php">회원권 조회</a></li>
              <li><a href="my/membership.php">회원권 구매</a></li>
            </ul>
          </li>
        </ul>

      </nav>

      <!-- user menu -->
      <div class="user-menu">
        <h2 class="blind">사용자 메뉴</h2>

        <?php
        if (!$s_id) { // 로그인인 되지 않았다면
        ?>
        <ul class="no_login">
          <li class="login"><a href="members/login.php">로그인</a></li>
          <li class="blind"><a href="members/join.php">회원가입</a></li>
        </ul>

        <?php
        } else { // 로그인이 되었다면
        ?>
        <ul>
          <li class="welcome_mem">
            <span><?php echo $s_name; ?></span> 님, 안녕하세요.
          </li>

          <?php if ($s_id == "admin") { ?>
          <li class="admin_pg"><a href="admin/admin.php">관리자 페이지</a></li>
          <?php }; ?>


          <li class="edit"><a href="members/edit.php">회원정보수정</a></li>
          <li class="user_menu_rb logout"><a href="#" onclick="log_out()">로그아웃</a></li>
        </ul>

        <?php
        };
        ?>

      </div><!-- user_menu -->
    </header>


    <!-- 슬라이드 영역 -->
    <!-- <article class="slider">
      <h2 class="blind">메인 이미지</h2>
      <div>
        <img src="images/main/main_img.jpg" alt="">
      </div>
    </article> -->

    <div class="main">
      <video autoplay muted loop>
        <source src="images/main/gym.mp4" type="video/mp4" />
      </video>
      <div class="mainText">
        <p>Applegym</p>
        <p>Fitness</p>
      </div>
      <!-- <div class="dot"></div> -->
    </div>


    <!-- 상단 공지사항 -->
    <div id="top-notice">
      <p><a href="#">전 지점 2월 15일 연장관련 운영안내</a></p>
      <button>오늘 하루 보지 않기<span>닫기</span></button>
    </div>

    <!-- content -->
    <section class="content">
      <h2 class="blind">콘텐츠</h2>

      <section class="welcome-section">
        <h2 class="blind">애플짐 방문 환영</h2>
        <img class="aos" data-aos="fade-up" data-aos-duration="800" src="images/main/welcome-shadow.png" alt="">
        <p class="aos" data-aos="fade-up" data-aos-duration="800">피트니스도 브랜드 시대!</p>
        <p class="aos" data-aos="fade-up" data-aos-duration="800"><b>애플짐 방문을 환영합니다.</b></p>
        <p class="aos" data-aos="fade-up" data-aos-duration="800">회원님과 소통하고 공감하는 애플짐입니다.</p>
        <div class="scroll">
          <img src="images/main/slide_arrow.png" alt="slide_arrow">
          <p>SCROLL</p>
        </div>
      </section><!-- welcome-section -->


      <section class="program-section cfixed">
        <h2 data-aos="fade-up" data-aos-duration="800" class="sec-tit aos">
          <a href="#">PROGRAM</a>
        </h2>
        <p data-aos="fade-up" data-aos-duration="800" class="sec-desc">애플짐의 다양한 프로그램, 반신욕, 사우나까지</p>
        <div data-aos="fade-up" data-aos-duration="800" class="tit-line"></div>



        <ul class="program-list">
          <li class="aos" data-aos="fade-up" data-aos-duration="800"><a href="program/program.php#section1">
              <div class="info">
                <h3>FITNESS</h3>
                <p>애플짐은<br>
                  전문적인 측정장비가<br>
                  갖추어져 있으며,<br>
                  넓고 쾌적한 실내의<br>
                  최신식 시설로<br>
                  운동의 즐거움과 삶의 질을<br>
                  높여 드립니다.</p>
              </div>
              <img src="images/main/program-img-fitness.jpg" alt="">
            </a></li>

          <li class="aos" data-aos="fade-down" data-aos-duration="900"><a href="program/program.php#section2">
              <div class="info">
                <h3>G.X</h3>
                <p>애플짐은<br>
                  전문적인 측정장비가<br>
                  갖추어져 있으며,<br>
                  넓고 쾌적한 실내의<br>
                  최신식 시설로<br>
                  운동의 즐거움과 삶의 질을<br>
                  높여 드립니다.</p>
              </div>
              <img src="images/main/program-img-gx.jpg" alt="">
            </a></li>

          <li class="aos" data-aos="fade-up" data-aos-duration="1000"><a href="program/program.php#section3">
              <div class="info">
                <h3>SPINNING</h3>
                <p>애플짐은<br>
                  전문적인 측정장비가<br>
                  갖추어져 있으며,<br>
                  넓고 쾌적한 실내의<br>
                  최신식 시설로<br>
                  운동의 즐거움과 삶의 질을<br>
                  높여 드립니다.</p>
              </div>
              <img src="images/main/program-img-spinning.jpg" alt="">
            </a></li>

          <li class="aos" data-aos="fade-down" data-aos-duration="1100"><a href="program/program.php#section4">
              <div class="info">
                <h3>PT</h3>
                <p>애플짐은<br>
                  전문적인 측정장비가<br>
                  갖추어져 있으며,<br>
                  넓고 쾌적한 실내의<br>
                  최신식 시설로<br>
                  운동의 즐거움과 삶의 질을<br>
                  높여 드립니다.</p>
              </div>
              <img src="images/main/program-img-pt.jpg" alt="">
            </a></li>

          <li class="aos" data-aos="fade-up" data-aos-duration="1200"><a href="program/program.php#section5">
              <div class="info">
                <h3>PILATES</h3>
                <p>애플짐은<br>
                  전문적인 측정장비가<br>
                  갖추어져 있으며,<br>
                  넓고 쾌적한 실내의<br>
                  최신식 시설로<br>
                  운동의 즐거움과 삶의 질을<br>
                  높여 드립니다.</p>
              </div>
              <img src="images/main/program-img-pilates.jpg" alt="">
            </a></li>

          <li class="aos" data-aos="fade-down" data-aos-duration="1300"><a href="program/program.php#section6">
              <div class="info">
                <h3>SAUNA</h3>
                <p>애플짐은<br>
                  전문적인 측정장비가<br>
                  갖추어져 있으며,<br>
                  넓고 쾌적한 실내의<br>
                  최신식 시설로<br>
                  운동의 즐거움과 삶의 질을<br>
                  높여 드립니다.</p>
              </div>
              <img src="images/main/program-img-suana.jpg" alt="">
            </a></li>
        </ul>
      </section><!-- program-section -->

      <div class="m-divider"></div>


      <section class="event-section">
        <h2 data-aos="fade-up" data-aos-duration="800" class="sec-tit aos">
          <a href="event.php">EVENT</a>
        </h2>
        <p data-aos="fade-up" data-aos-duration="800" class="sec-desc">애플짐 전 지점 새로운 이벤트</p>
        <div data-aos="fade-up" data-aos-duration="800" class="tit-line"></div>


        <div data-aos="fade-up" data-aos-duration="800" class="eventimgs aos">
          <div class="eventimg"><a href="#"><img src="images/main/event-img1.jpg" alt="#"></a></div>
          <div class="eventimg"><a href="#"><img src="images/main/event-img2.jpg" alt="#"></a></div>
          <div class="eventimg"><a href="#"><img src="images/main/event-img3.jpg" alt="#"></a></div>
          <div class="eventimg"><a href="#"><img src="images/main/event-img4.jpg" alt="#"></a></div>
        </div><!-- slick -->
      </section><!-- event-section -->


      <section class="notice-section cfixed">
        <h2 data-aos="fade-up" data-aos-duration="800" class="sec-tit aos">
          <a href="notice.php">NOTICE</a>
        </h2>
        <p data-aos="fade-up" data-aos-duration="800" class="sec-desc">공지사항</p>
        <div data-aos="fade-up" data-aos-duration="800" class="tit-line"></div>

        <ul class="notice-list">
          <li class="aos" data-aos="fade-up" data-aos-duration="800"><a href="#">
              <span>2021-02-16</span>
              <p>전 지점 2월 15일 거리두기 연장관련 운영 안내</p>
              <p class="more">더보기</p>
            </a></li>
          <li class="aos" data-aos="fade-up" data-aos-duration="800"><a href="#">
              <span>2021-01-18</span>
              <p>전 지점 2월 15일 거리두기 연장관련 운영 안내</p>
              <p class="more">더보기</p>
            </a></li>
          <li class="aos" data-aos="fade-up" data-aos-duration="800"><a href="#">
              <span>2021-01-06</span>
              <p>1월 코로나 2.5단계로 인하여 임시휴점안내</p>
              <p class="more">더보기</p>
            </a></li>
        </ul>
      </section><!-- notice-section -->


      <section class="channel-section">
        <h2 data-aos="fade-up" data-aos-duration="800" class="sec-tit aos">
          <a href="#">APPLEGYM CHANNEL</a>
        </h2>
        <!-- <span class="tit-line"></span> -->

        <ul class="channel-body">
          <li class="counter_wrap">
            <span class="counter">3</span>
            <P>총 지점 수</P>
          </li>
          <li class="counter_wrap">
            <span class="counter">73,561</span>
            <p>누적 회원 수</p>
          </li>
          <li class="counter_wrap">
            <span class="counter">15</span>
            <p>당일운동 예약현황</p>
          </li>
          <li class="counter_wrap">
            <span class="counter">28,112</span>
            <p>총 소모 칼로리</p>
          </li>
        </ul><!-- counter_body-->
      </section><!-- channel-section -->


      <section class="search-section">
        <h2 data-aos="fade-up" data-aos-duration="800" class="sec-tit aos">
          <a href="#">SEARCH</a>
        </h2>
        <p data-aos="fade-up" data-aos-duration="800" class="sec-desc">가까운 지점 찾기</p>
        <div data-aos="fade-up" data-aos-duration="800" class="tit-line"></div>

        <form data-aos="fade-up" data-aos-duration="800" class="search-form aos">
          <fieldset>
            <legend>지점 찾기</legend>
            <label for="searchbox">search</label>
            <input id="searchbox" type="search" name="search" size='80' title="" placeholder="지점명, 지역명을 입력해주세요."
              autocomplete="off" autocapitalize="off">
            <button type="button">검색</button>
          </fieldset>
        </form>

      </section><!-- search-section -->
    </section><!-- content -->


    <div class="divider-img">
      <img src="images/main/fooder-divider.png" alt="">
    </div>


    <footer class="footer">
      <h2 class="blind"><a href="#">사이트 이용안내</a></h2>

      <div class="applegym-info">
        <h3 class="bot-logo"><a href="#">애플짐 정보</a></h3>

        <div class="applegym-desc">
          <p class="desc-tit">
            <span><b>애플짐 피트니스</b></span>
            <span><b>대표이사</b> : 이성찬</span>
          </p>
          <p>
            <span>서울특별시 강남구 영동대로 225</span>
            <span><b>고객센터</b> : 02-563-0808</span>
            <span><b>이메일</b> : APPLEGYM@NATE.COM</span>
          </p>
          <div class="f_divider"></div>
          <p>
            <span><b>역삼점 사업자번호</b> : 169-85-23099</span>
            <span><b>대치점 사업자번호</b> : 112-85-18585</span>
            <span><b>목동점 사업자번호</b> : 620-85-23099</span>
          </p>
          <p><b>개인정보관리책임자</b> : 이성찬</p>
        </div><!-- applegym desc -->

        <div class="sns">
          <h3 class="blind">SNS</h3>
          <ul>
            <li class="kakao"><a href="#">카카오톡</a></li>
            <li class="insta"><a href="#">인스타그램</a></li>
            <li class="youtube"><a href="#">유튜브</a></li>
          </ul>
        </div>
      </div><!-- applegym-info -->

      <div class="family-site">
        <h3 class="blind">패밀리 사이트</h3>
        <ul>
          <li class="family_site1"><a href="#"><img src="images/main/familysite1.jpg" alt=""><span>대한스포츠의학재단</span></a>
          </li>
          <li class="family_site2"><a href="#"><img src="images/main/familysite2.jpg" alt=""><span>강남나무병원</span></a>
          </li>
          <li class="family_site3"><a href="#"><img src="images/main/familysite3.jpg" alt=""><span>JOYFIT</span></a>
          </li>
          <li class="family_site4"><a href="#"><img src="images/main/familysite4.jpg" alt=""><span>OWLSOFT</span></a>
          </li>
          <li class="family_site5"><a href="#"><img src="images/main/familysite5.jpg" alt=""><span>국민닭컴</span></a>
          </li>
        </ul>
      </div><!-- family-site -->

      <div class="use-info">
        <h3 class="blind">이용 및 약관</h3>
        <ul>
          <li><a href="#">개인정보취급방침</a></li>
          <li><a href="#">이용약관</a></li>
          <li><a href="#">이메일무단수집거부</a></li>
        </ul>
      </div>

      <div class="copy">
        <p>
          COPYRIGHT © 2020 Applegym All Rights Reserved
        </p>
        <p>
          본 사이트는 개인 포트폴리오 사이트로 제작되어 상업적 목적이 아닙니다.
          사용된 일부 이미지 및 폰트 등은 별도의 출처가 있음을 밝혀 드립니다.
        </p>
      </div>

      <!-- 퀵메뉴 -->
      <div class="quick-menu">
        <div class="chat-wrap">
          <a href="http://pf.kakao.com/_/chat" target="_blank">
            <img src="images/main/call.png" alt="문의"><span>문의하기</span>
          </a>
        </div>

        <div class="progress-section">
          <p class="pct"></p>
          <svg class="progress-circle svg-content" width="60" height="60" viewBox="0 0 60 60"
            xmlns="http://www.w3.org/2000/svg">
            <defs>
              <linearGradient id="grad">
                <stop offset="0%" stop-color="#f4a2dd"></stop>
                <stop offset="100%" stop-color="#8ab3f7"></stop>
              </linearGradient>
            </defs>
            <circle class="progress-wrap" cx="30" cy="30" r="25"></circle>
            <circle class="progress-bar" cx="30" cy="30" r="25"></circle>
          </svg>
        </div><!-- progress -->
      </div><!-- quick-menu -->

    </footer>
  </div>


  <script>
  //aos
  AOS.init({
    disable: 'mobile'
  });


  // 공지사항 팝업 창
  function setCookie(name, value, expiredays) {
    var today = new Date();
    today.setDate(today.getDate() + expiredays);
    document.cookie = name + '=' + escape(value) + '; expires=' + today.toGMTString();
  }

  function getCookie(name) {
    var cookie = document.cookie;
    if (document.cookie != "") {

      var cookie_array = cookie.split("; ");

      for (var index in cookie_array) {

        var cookie_name = cookie_array[index].split("=");

        if (cookie_name[0] == "mycookie") {
          return cookie_name[1];
        }
      }
    }
    return;
  }

  $("#top-notice button").click(function() {
    $("#top-notice").slideUp();
    setCookie("mycookie", 'popupEnd', 1);
  })

  var checkCookie = getCookie("mycookie");

  if (checkCookie == 'popupEnd') {
    $("#top-notice").hide();
  } else {
    $("#top-notice").show();
  }
  </script>

</body>

</html>