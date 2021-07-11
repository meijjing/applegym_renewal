<!-- join_ok.php -->
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
  <link rel="stylesheet" href="../css/members_css/join-ok.css">


  <!-- jQuery -->
  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/common.js"></script>


</head>

<body>
  <div id="wrap">

  <?php include "../header.php"; ?>


    <!-- contents -->
    <div class="join_ok_section">
      <h2><b>APPLE</b>GYM</h2>

      <div class="join_ok_pg">
        <h3>WELCOME</h3>

        <p>
          <!-- <strong>김미경 님,</strong> -->
          <span>회원가입을 축하드립니다.</span>
        </p>


        <ul>
          <li><a href="../index.php">홈으로 가기</a></li>
          <li><a href="login.php">로그인</a></li>
        </ul>



      </div><!-- join_ok_pg -->
    </div><!-- join_section -->


    <!-- slogan -->
    <div class="slogan">
      <h2 class="blind">슬로건</h2>
      <p><img src="images/slogan.png" alt=""><span class="blind">DREAMS COME TRUE</span></p>
    </div>


    <?php include "../footer.php"; ?>
  </div>


</body>

</html>