<!-- mypage.php -->
<?php

// 세션 실행
session_start();

$s_id = isset($_SESSION["s_id"])? $_SESSION["s_id"]:"";
$s_name = isset($_SESSION["s_name"])? $_SESSION["s_name"]:"";
$s_email = isset($_SESSION["s_email"])? $_SESSION["s_email"]:"";

if(!$s_id){ // 로그인인 되지 않았다면
  header("Location: ../members/login.php" );
}
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
  <link rel="stylesheet" href="../css/my_css/mypage.css">

  <!-- jQuery -->
  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/common.js"></script>

  <!-- aos -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


</head>


<body>
  <div id="wrap">

  <?php include "../header.php"; ?>

    <section class="main_section">
      <div class="main_img">
        <h2 class="blind">MY PAGE</h2>
        <p class="blind">마이페이지</p>
        <img src="../images/mypage_bg_t.png" alt="">
      </div>
    </section>


    <section class="contents">

      <section class="profile_section">
        <h2 class="blind">프로필</h2>
        <p>마이페이지를 통해 회원님의 정보수정 및 이용중인 서비스 현황을 보실수 있습니다.</p>


        <div class="profile_wrap">

          <div class="profile_img">
            <p><a href="../members/edit.php">
              <img src="../images/profile_user.png" alt=""></a>
            </p>
          </div>
          <div class="profile_info">

          <?php if ($s_id == 'admin') { ?>

            <div class="goadmin">
                <a href="../admin/admin.php">
                관리자 페이지로 가기
                </a>
            </div>
          <?php } else { ?>

            <div class="mem_name">
              <b><?php echo $s_name; ?></b> 
              <?php echo "("."$s_id".")"; ?> 회원님
            </div>

            <div class="mem_branch">
              <p>등록지점</p>
              <b>역삼점</b>
              <button id="app" onclick="location.href='../branch/branch_yeoksam.php';">상세보기</button>
            </div>

            <div class="mileage">
              <p>적립금</p>
              <b>0P</b>
            </div>
            <div class="mem_notice">
              <p>※ 적립금은 회원권 종료일로부터 1년 후 자동 소멸됩니다.</p>
            </div>


          </div><!-- profile_info -->

        </div><!-- profile_wrap-->
      </section><!-- profile-section -->



      <section class="situation_section">
        <h2 class="blind">회원권 현황</h2>

        <div class="use_info">
          <h3>사용현황</h3>
          <p><strong>사용중</strong> (잔여일 35일)</p>
          <button type="button" class="btn_buy" onclick="location.href='membership.php'">회원권 구매하기</button>
        </div>

        <div class="divider"></div>

        <div class="attendance">
          <h3>센터출석률</h3>
          <p>
            <strong class="per">60%</strong>
            ( 총 100일 경과 중
            <strong>60일</strong>
            출석 )
          </p>

          <div class="progress">
            <div class="progressbar">
              <div class="progress-value" style="width: 60%"><span>60%</span></div>
            </div>
          </div>
        </div><!-- attendance -->
      </section><!-- situation -->
      <?php }; ?> 
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
