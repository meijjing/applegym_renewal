<!-- brand_aboutus.php -->
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
  <link rel="stylesheet" href="../css/brand_css/brand_aboutus.css">


  <!-- jQuery -->
  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/common.js" defer></script>

  <!-- aos -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body>
  <div class="wrap">

  <?php include "../header.php"; ?>

    <section class="main_section">
      <div class="main_img">
        <h2 class="blind">ABOUT US</h2>
        <p class="blind">애플짐 피트니스 센터를 소개합니다.</p>
        <img src="../images/06-brand/aboutus_main.png" alt="">


        <!-- aside -->
        <aside class="aside">
          <ul>
            <li><a class="on_menu" href="brand_aboutus.php">ABOUT US</a></li>
            <li><a class="aside_menu" href="brand_history.php">HISTORY</a></li>
            <li><a class="aside_menu" href="brand_business.php">BUSINESS
              </a></li>
          </ul>
        </aside>
      </div>
    </section><!-- main_section -->

    <section class="contents">

      <section class="aboutus_section">

          <h2 class="blind">브랜드 소개</h2>
          <h3 data-aos="fade-up" data-aos-duration="800">2002년 중동센터 창립 후 꾸준히 성장한 <b>애플짐</b>은</h3>

          <p data-aos="fade-up" data-aos-duration="800">
            1인 대표 직영 피트니스센터라는 새로운 운영방식으로, 안정적인 운영과 만족도 높은 서비스를 통해 국내 피트니스 업계의선두를 유지하며 수도권을 중심으로 인지도와 브랜드 가치 쌓아왔습니다.
          </p>
          <p class="aboutus_logo" data-aos="fade-up" data-aos-duration="800">
          </p>


          <h3 data-aos="fade-up" data-aos-duration="800">
            현재 애플짐은 <b>대치점 역삼점 목동점</b> 이하,
            <span>4개의 직영 휘트니스 센터를 운영중에 있으며,</span>
          </h3>

          <p data-aos="fade-up" data-aos-duration="800">
            <span>
              스마트짐, 조이피트, 강남나무병원, 국민닭컴, 스포츠의학재단 등 사업영역을 확대하여 성장하고 있습니다.<br>
              ㈜애플짐휘트니스는 누적회원 7만여 명의 고객이 선택한 국내 피트니스업계의 선두를 유지하는 브랜드로서, 그 브랜드 가치를 유지하기 위해 쾌적한 운동환경과 최고의 시설, 다양한 프로그램 및 질 높은 서비스를 제공하기 위해 최선을 다하고 있습니다.
            </span>
          </p>

          <div class="m_divider"></div>
      </section><!-- aboutus_section -->
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

</body>

</html>