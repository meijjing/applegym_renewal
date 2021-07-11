<!-- brand_history.php -->
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
  <link rel="stylesheet" href="../css/brand_css/brand_history.css">

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
        <h2 class="blind">HISTORY</h2>
        <p class="blind">애플짐 피트니스 센터를 소개합니다.</p>
        <img src="../images/06-brand/history_main.png" alt="">


        <!-- aside -->
        <aside class="aside">
          <ul>
            <li><a class="aside_menu" href="brand_aboutus.php">ABOUT US</a></li>
            <li><a class="on_menu" href="brand_history.php">HISTORY</a></li>
            <li><a class="aside_menu" href="brand_business.php">BUSINESS
              </a></li>
          </ul>
        </aside>
      </div>
    </section><!-- main_section -->


    <section class="contents">

      <section class="timeline_section">

        <div data-aos="fade-up" data-aos-duration="800" class="con con1 left">
          <div class="con_text text_left">
            <h2>2019</h2>
            <p>국민닭컴 오픈</p>
          </div>
        </div>
    
        <div data-aos="fade-up" data-aos-duration="800" class="con con2 right">
          <div class="con_text text_right">
            <h2>2016</h2>
            <p>강남나무 병원,<br>대한스포츠의학재단 설립</p>
          </div>
        </div>
    
        <div data-aos="fade-up" data-aos-duration="800" class="con con3 left">
          <div class="con_text text_left">
            <h2>2014</h2>
            <p>청담점 오픈, 아울소프트 설림</p>
          </div>
        </div>
    
        <div data-aos="fade-up" data-aos-duration="800" class="con con4 right">
          <div class="con_text text_right">
            <h2>2012</h2>
            <p>송도점 오픈, 조이피트 설립</p>
          </div>
        </div>
    
        <div data-aos="fade-up" data-aos-duration="800" class="con con5 left">
          <div class="con_text text_left">
            <h2>2011</h2>
            <p>대치점, 마곡점PLUS<br>세컨드 브랜드 런칭</p>
          </div>
        </div>
    
        <div data-aos="fade-up" data-aos-duration="800" class="con con6 right">
          <div class="con_text text_right">
            <h2>2010</h2>
            <p>반포점, 과천점, 역삼점, 강남점 오픈</p>
          </div>
        </div>
    
    
        <div data-aos="fade-up" data-aos-duration="800" class="con con7 left">
          <div class="con_text text_left">
            <h2>2009</h2>
            <p>강서점, 우장산점, 동대문점,<br>여의도점, 수서저 오픈</p>
          </div>
        </div>
    
        <div data-aos="fade-up" data-aos-duration="800" class="con con8 right">
          <div class="con_text text_right">
            <h2>2008</h2>
            <p>당산점 오픈</p>
          </div>
        </div>
    
    
        <div data-aos="fade-up" data-aos-duration="800" class="con con9 left">
          <div class="con_text text_left">
            <h2>2007</h2>
            <p>부천점 오픈</p>
          </div>
        </div>
    
        <div data-aos="fade-up" data-aos-duration="800" class="con con10 right">
          <div class="con_text text_right">
            <h2>2006</h2>
            <p>목동점 오픈</p>
          </div>
        </div>
    
    
        <div data-aos="fade-up" data-aos-duration="800" class="con con11 left">
          <div class="con_text text_left">
            <h2>2004</h2>
            <p>어린이 애플짐 오픈</p>
          </div>
        </div>
    
        <div data-aos="fade-up" data-aos-duration="800" class="con con12 right">
          <div class="con_text text_right">
            <h2>2002</h2>
            <p>중동점 오픈</p>
          </div>
        </div>
    
      </section>



    </section>

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