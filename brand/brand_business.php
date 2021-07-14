<!-- brand_business.php -->
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
  <link rel="stylesheet" href="../css/brand_css/brand_business.css">

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
        <h2 class="blind">BUSINESS</h2>
        <p class="blind">애플짐 피트니스 센터를 소개합니다.</p>
        <img src="../images/06-brand/business_main.png" alt="">

        <!-- aside -->
        <aside class="aside">
          <ul>
            <li><a class="aside_menu" href="brand_aboutus.php">ABOUT US</a></li>
            <li><a class="aside_menu" href="brand_history.php">HISTORY</a></li>
            <li><a class="on_menu" href="brand_business.php">BUSINESS
              </a></li>
          </ul>
        </aside>
      </div>
    </section><!-- main_section -->

    <section class="contents">
      <section class="business_section">
        <h2 class="blind">애플짐 사업영역</h2>

        <h3>
          애플짐 휘트니스는 <b>고객 서비스와 다양한 휘트니스 프로그램을<br>
            중심으로 사업영역을 확대</b>하고 있습니다.
        </h3>
        <p><img src="../images/main/logo.png" alt=""></p>
        <p>
          현재 당산점 대치점 역삼점 목동점 이하<br>
          4개의 직영 휘트니스 센터를 운영중에 있으며,<br>
          아울소프트, 조이피트, 강남나무병원, 국민닭컴, 스포츠의학재단<br>
          이하 사업과 연계하여 성장하고 있습니다.
        </p>
        
      </section><!-- business_section -->

      <section class="partner_section">
        <h2 class="blind">애플짐 사업 파트너</h2>


        <ul>
          <li class="partner1"><a href="#">
            <img src="../images/06-brand/familysite1.jpg" alt="">
            <b>대한스포츠의학재단<span>이동하기</span></b>
          </a></li>

          <li class="partner2"><a href="#">
              <img src="../images/06-brand/familysite2.jpg" alt="">
              <b>강남나무병원<span>이동하기</span></b></a>
          </li>

          <li class="partner3"><a href="#">
            <img src="../images/06-brand/familysite3.jpg" alt="">
            <b>조이피트<span>이동하기</span></b></a>
          </li>
        </ul>

        <ul class="second_line">
          <li class="partner4"><a href="#">
            <img src="../images/06-brand/familysite4.jpg" alt="">
            <b>아울소프트<span>이동하기</span></b></a>
          </li>
          <li class="partner5"><a href="#">
            <img src="../images/06-brand/familysite5.jpg" alt="">
            <b>국민닭컴<span>이동하기</span></b></a>
          </li>
        </ul>



      </section><!-- patrner_section -->

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