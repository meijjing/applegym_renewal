<!-- program.php -->
<?php

// 세션 실행
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
  <link rel="stylesheet" href="../css/program_css/program.css">

  <!-- jQuery -->
  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/common.js" defer></script>
  <script src="../js/program.js" defer></script>


  <!-- aos -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>


<body>
  <div id="wrap">

  <section class="info-section">
    <ul class="info-list">
      <li class="info-home"><a href="../index.php">HOME</a></li>
      <li class="info-calendar"><a href="../branch/branch_yeoksam.php#timetable">CALENDAR</a></li>
      <li class="info-user"><a href="../my/mypage.php">USER</a></li>

      <?php
          if(!$s_id){ // 로그인인 되지 않았다면
          ?>
      <li class="info-join"><a href="../members/join.php">JOIN</a></li>

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
    <h1 class="logo"><a href="../index.php">애플짐 피트니스</a></h1>

    <!-- menu -->
    <h2 class="blind">메인 메뉴</h2>
    <!-- <a href="#" class="menu-toggle-btn"></a> -->

    <nav class="nav">

      <ul class="gnb">
        <li><a href="#">브랜드</a>
          <ul class="submenu">
            <li><a href="../brand/brand_aboutus.php">ABOUT US</a></li>
            <li><a href="../brand/brand_history.php">HISTORY</a></li>
            <li><a href="../brand/brand_business.php">BUSINESS</a></li>
          </ul>
        </li>
        <li><a href="#">지점소개</a>
          <ul class="submenu">
            <li><a href="../branch/branch_yeoksam.php">역삼점</a></li>
            <li><a href="#">대치점</a></li>
            <li><a href="#">목동점</a></li>
          </ul>
        </li>
        <li><a href="#">프로그램</a>
          <ul class="submenu">
            <li><a href="#scroll_section1">FITNESS</a></li>
            <li><a href="#scroll_section2">PT</a></li>
            <li><a href="#scroll_section3">G.X</a></li>
            <li><a href="#scroll_section4">SPINNING</a></li>
            <li><a href="#scroll_section5">PILATES</a></li>
            <li><a href="#scroll_section6">반신욕,사우나</a></li>
          </ul>
        </li>
        <li><a href="#">소식</a>
          <ul class="submenu">
            <li><a href="../board/notice.php">NOTICE</a></li>
            <li><a href="../board/event.php">EVENT</a></li>
            <li><a href="../board/community.php">COMMUNITY</a></li>
          </ul>
        </li>
        <li><a href="#">마이페이지</a>
          <ul class="submenu">
            <li><a href="../my/mypage.php">회원권 조회</a></li>
            <li><a href="../my/membership.php">회원권 구매</a></li>
          </ul>
        </li>
      </ul>

    </nav>

    <!-- user menu -->
    <div class="user-menu">
      <h2 class="blind">사용자 메뉴</h2>

      <?php
        if(!$s_id){ // 로그인인 되지 않았다면
        ?>
      <ul class="no_login">
        <li class="login"><a href="../members/login.php">로그인</a></li>
        <li class="blind"><a href="../members/join.php">회원가입</a></li>
      </ul>

      <?php
        } else { // 로그인이 되었다면
      ?>
      <ul>
        <li class="welcome_mem">
          <span><?php echo $s_name; ?></span> 님, 안녕하세요.
        </li>

        <?php if($s_id == "admin") { ?>
        <li class="admin_pg"><a href="../admin/admin.php">관리자 페이지</a></li>
        <?php }; ?>


        <li class="edit"><a href="../members/edit.php">회원정보수정</a></li>
        <li class="user_menu_rb logout"><a href="#" onclick="log_out()">로그아웃</a></li>
      </ul>

      <?php  
          };
          ?>

    </div><!-- user_menu -->
  </header>



    <section class="main_section">
      <div class="main_img">
        <h2 class="blind">PROGRAM</h2>
        <p class="blind">애플짐의 다양한 프로그램을 만나보세요.</p>
        <img src="../images/08-program/program_bg.png" alt="">
      </div>
    </section>



    <!-- contents -->
    <section class="contents">


      <!-- gym -->
      <section class="gym-section">
        <h3 data-aos="fade-right" data-aos-duration="2000">애플짐 피트니스</h3>
        <p>
          <span data-aos="fade-up" data-aos-duration="800" class="gym_title"><img src="../images/08-program/gym_title.png" alt=""></span>
          <span data-aos="fade-up" data-aos-duration="800" class="gym_con">
            애플짐은 열정적이고 제대로 운동하고 싶은 헬스인들을 위한 <b>직관적인 헬스환경</b>을 구축해갑니다.<br>
            애플짐은 그저 단순한 동네 헬스장 서비스가 아닌<br> 각자 회원들에게 내재되어 있는 <b>운동에 대한 긍지와 자부심</b>을
            충족시키고자 합니다.
          </span>
        </p>
      </section>


      <section class="program-section">

        <!-- fitness -->
        <section class="fitness" id="scroll_section1">
          <h3 class="blind"><a name="fitness">FITNESS</a></h3>
          <p class="blind">
            애플짐은 전문적인 측정장비가 갖추어져 있으며, 넓고 쾌적한 실내의 최신식 시설로 운동의 즐거움과 삶의 질을 높여 드립니다.
          </p>
          <img data-aos="fade-up" data-aos-duration="800" src="../images/08-program/fitness.jpg" alt="">
        </section>


        <div data-aos="fade-up" data-aos-duration="800" class="divider"></div>


        <!-- PT -->
        <section class="pt" id="scroll_section2">
          <h3 class=" blind"><a name="pt">PT</a></h3>
          <p class="blind">
            애플짐의 전문적이고 체계적인
            <b>1:1 맞춤 트레이닝</b>
            애플짐의 트레이닝은 체계적인 측정과 분석으로 개인에 맞는 프로그램 및 운동진행방향을 계획해 드립니다.
          </p>
          <img data-aos="fade-up" data-aos-duration="800" src="../images/08-program/pt.jpg" alt="">

          <div data-aos="fade-up" data-aos-duration="800" class="pt_con1">
            <h4 class="blind">대한스포츠의학재단</h4>
            <img src="../images/08-program/pt_img1.png" alt="">
            <p><b>대한스포츠의학재단 소속 트레이너</b>의<br>
              전문적인 퍼스널트레이닝을 이용하세요.</p>
          </div>

          <div class="pt_con2">
            <h4 class="blind">펄스널 트레이닝</h4>
            <img data-aos="fade-up" data-aos-duration="800" src="../images/08-program/pt_icon.png" alt="">
            <p data-aos="fade-up" data-aos-duration="800">펄스널 트레이닝 이런분들에게 추천해요!</p>
            <ul data-aos="fade-up" data-aos-duration="800">
              <li>단기간에 많은 <b>체지방을 감량</b>하고 싶은 분</li>
              <li><b>효율적인 운동방법</b>에 알고 싶은 분</li>
              <li>운동수행능력을 보다 <b>업그레이드</b> 하고 싶은 분</li>
              <li><b>확실한 동기부여와 운동목표를</b> 단시간에 달성하고 싶은 분</li>
              <li><b>정확한 자세</b>로 부상없이 안전하게 운동하고 싶은 분</li>
              <li>의지박약, 작심삼일, 단기다이어트 실패로 <b>꾸준하게 운동</b>하고 싶은 분</li>
            </ul>
          </div>

          <div class="pt_process">
            <h4 class="blind">PT 프로세스</h4>
            <img data-aos="fade-up" data-aos-duration="800" src="../images/08-program/pt_process.png" alt="">
          </div>
        </section>

        <div data-aos="fade-up" data-aos-duration="800" class="divider"></div>


        <!-- gx -->
        <section class="gx" id="scroll_section3">
          <h3 class="blind"><a name="gx">G.X</a></h3>
          <h4 class="blind">최상의 전문강사와 함께하는<br>
            G.X프로그램</h4>
          <img data-aos="fade-up" data-aos-duration="800" src="../images/08-program/gx.jpg" alt="">

          <p class="blind">
            애플짐은 다양한 GX 프로그램으로<br>
            운동이 더욱 더 즐거운 환경을 제공하며,<br>
            운동효과 또한 극대화 시켜드립니다.<br>

            폭넓은 시간대로 업계 최다GX수업으로 폭넓은 시간대로 구성되어있고<br>
            프로그램별 전문성 있는 그룹수업을 제공합니다.<br>
          </p>

          <div class="gx_con">
            <h4 class=" blind">G.X그룹</h4>
            <img data-aos="fade-up" data-aos-duration="800" src="../images/08-program/gx_img.png" alt="">
            <p data-aos="fade-up" data-aos-duration="800">G.X 그룹수업은 이런분들에게 추천해요!</p>
            <ul data-aos="fade-up" data-aos-duration="800">
              <li>헬스장이 <b>처음이거나 운동을 하려고 할 때 막막</b>한 분</li>
              <li>운동이 지루하고 웨이트에 <b>흥미를 느끼지 못하는</b> 분</li>
              <li>헬스 말고도 <b>다양하고 폭넓은 운동</b>을 경험해 보고 싶은 분</li>
              <li>혼자 운동하는것보다 <b>사람들과 함께</b> 땀 흘리고 싶은 분</li>
              <li>전문강사의 지도하에 <b>효율적</b>으로 운동하고 싶은 분</li>
              <li>요가, 필라테스, 댄스 등 <b>매번 새로운 운동</b>을 하고 싶은 분</li>
            </ul>
          </div>
        </section>


        <div data-aos="fade-up" data-aos-duration="800" class="divider"></div>


        <!-- spinning -->
        <section class="spinning" id="scroll_section4">
          <h3 class="blind"><a name="spinning">SPINNING</a></h3>
          <h4 class="blind">비교불가! 더욱 더 신나는 음악과 함께,
            <b>애플짐 스피닝</b></h4>
          <img data-aos="fade-up" data-aos-duration="800" src="../images/08-program/spinning.jpg" alt="">
          <p class="blind">스피닝은 실내바이크로 페달링을 하며,<br>
            음악과함께 안무동작을 하는 고강도 유산소운동입니다.<br>
            <br>
            1시간에 600~1000칼로리 이상을 소비하며 런닝머신보다 3~4배 효과를 줍니다.<br>
            신나는 음악과 화려한 조명, 신나는 댄스가 어우러진 스피닝을 애플짐에서 즐기세요!</p>
        </section>

        <div data-aos="fade-up" data-aos-duration="800" class="divider"></div>


        <!-- pilates -->
        <section class="pilates" id="scroll_section5">
          <h3 class="blind"><a name="pilates">PILATES</a></h3>
          <h4 class="blind">아름다운 라인을 완성하는
            <b>기구 필라테스</b></h4>
          <img data-aos="fade-up" data-aos-duration="800" src="../images/08-program/pilates.jpg" alt="">
          <p class="blind">애플짐 기구필라테스는 몸의 균형과 조화 및 자세를 바로잡아
            균형있는 바디라인을 완성합니다.</p>


          <div class="pilates_con">
            <h4 class="blind">기구필라테스</h4>
            <img data-aos="fade-up" data-aos-duration="800" src="../images/08-program/pilates_img.jpg" alt="">
            <p data-aos="fade-up" data-aos-duration="800">기구필라테스는 이런분들에게 추천해요!</p>
            <ul data-aos="fade-up" data-aos-duration="800">
              <li>구부정한 자세로 인한 <b>자세교정</b>을 필요로 하시는 분</li>
              <li>건강한 다이어트로 <b>체형변화</b>를 원하시는 분</li>
              <li><b>소그룹수업</b>으로 조금더 꼼꼼한 티칭을 원하시는 분</li>
              <li>대기구 <b>수업비용이 부담</b>스러운신 분</li>
              <li><b>면역력&체력증진</b>을 원하시는 분</li>
            </ul>
          </div>
        </section>

        <div data-aos="fade-up" data-aos-duration="800" class="divider"></div>


        <!-- 반신욕&사우나 -->
        <section class="sauna" id="scroll_section6">
          <h3 class="blind"><a name="sauna">반신욕&사우나</a></h3>
          <img data-aos="fade-up" data-aos-duration="800" src="../images/08-program/sauna.jpg" alt="">

          <div class="blind">
            <h4><a href="#">반신욕</a></h4>
            <p>남녀노소 누구나 편안하게<br>
              뜨끈한 반신욕~<br>
              힐링 제대로 즐기고 가세요.</p>
          </div>
          <div class="blind">
            <h4><a href="#">사우나</a></h4>
            <p>운동도하고 땀도 빼고<br>
              하루에 쌓였던 피로<br>
              사우나로 날려보내요!</p>
          </div>
        </section>

      </section><!-- program-section -->

    </section><!-- contents -->



    <!-- slogan -->
    <div class="slogan">
      <h2 class="blind">슬로건</h2>
      <p><img src="../images/slogan.png" alt=""><span class="blind">DREAMS COME TRUE</span></p>
    </div>


    <?php include "../footer.php"; ?>



  </div><!-- wrap -->



  <script type="text/javascript">
    //aos
    // AOS.init({disable: 'phone', 'tablet', 'mobile'})

    AOS.init({disable: 'mobile'});
  </script>

</body>

</html>