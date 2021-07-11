<!-- membership.php -->
<?php

// 세션 실행
session_start();

$s_id = isset($_SESSION["s_id"])? $_SESSION["s_id"]:"";
$s_name = isset($_SESSION["s_name"])? $_SESSION["s_name"]:"";

?>

<?php
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
  <link rel="stylesheet" href="../css/my_css/membership.css">


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
        <h2 class="blind">MEMBERSHIP</h2>
        <p class="blind">회원권 구매</p>
        <img src="../images/membership_bg.jpg" alt="">
      </div>
    </section>


    <!-- contents -->
    <section class="contents">

      <section class="mem_section">
        <h2>MEMBERSHIP</h2>

        <p>
          <strong>원하는 회원권을 선택하세요</strong>
          지역별 이용 혜택 및 구성이 다를 수 있습니다.<br>
          세부내용은 지점소개 페이지에서 확인 할 수 있습니다.
        </p>

        <form class="mem_form" action="" method="POST">

          <fieldset>
            <legend class="blind">회원권 구매</legend>


            <p class="use_period">
              <label for="use_period">사용기간<span class="red">*</span></label>
              <select name="use_period" id="use_period" autocomplete="off" autocapitalize="off">
                <option value="" disabled selected hidden>사용기간을 선택해주세요. (필수)</option>
                <option value="3개월">3개월</option>
                <option value="6개월">6개월</option>
                <option value="12개월">12개월</option>
              </select>
              <span class="use_period_err"></span>
            </p>



            <p class="use_brach">
              <label for="use_brach">사용지점<span class="red">*</span></label>
              <select name="use_brach" id="use_brach" autocomplete="off" autocapitalize="off">
                <option value="" disabled selected hidden>사용지점을 선택해주세요. (필수)</option>
                <option value="통합권">통합권</option>
                <option value="역삼점">역삼점</option>
                <option value="대치점">대치점</option>
                <option value="목동점">목동점</option>
              </select>
              <span class="use_branch_err"></span>
            </p>


            <p class="use_start">
              <label for="use_start">운동시작 일자<span class="red">*</span></label>
              <select name="use_start" id="use_start" autocomplete="off" autocapitalize="off">
                <option value="" disabled selected hidden>사용시작 날짜를 선택해주세요. (필수)</option>
                <option value="신규">방문 시 결정 (신규회원)</option>
                <option value="재등록">남은 회원권 이어서</option>
              </select>
              <span class="use_start_err"></span>
            </p>



            <p class="locker_rental">
              <label for="locker_rental">개인락커 대여</label>
              <select name="locker_rental" id="locker_rental" autocomplete="off" autocapitalize="off">
                <option value="" disabled selected hidden>개인락커 대여 기간 (선택)</option>
                <option value="1개월">개인락커 1개월</option>
                <option value="3개월">개인락커 3개월</option>
                <option value="6개월">개인락커 6개월</option>
                <option value="12개월">개인락커 12개월</option>
              </select>
            </p>



            <p class="entry">
              <label for="entry">복수출입 (1일 2회이상 출입) 여부</label>
              <select name="entry" id="entry" autocomplete="off" autocapitalize="off">
                <option value="" disabled selected hidden>복수 출입 여부 (선택)</option>
                <option value="1개월">복수출입 1개월</option>
                <option value="3개월">복수출입 3개월</option>
                <option value="6개월">복수출입 6개월</option>
                <option value="12개월">복수출입 12개월</option>
              </select>
            </p>


            <div class="total">
              <strong>총 결제 금액</strong>
              <span>120,000원</span>
            </div>

            <div class="divider"></div>

            <div class="payment">
              <button type="button" onclick="form_check(this.form)">결제하기</button>
            </div>

            <div class="close_btn">
              <button type="button" class="btn_close">닫기</button>
            </div>



          </fieldset>
        </form>
      </section><!-- mem_section -->



      <section class="use_manual">

        <h2 class="blind">회원권 사용 안내</h2>
        <ul>
          <li>온라인 결제 후 7일 이내 주 이용 센터에 방문하여 약관 작성을 부탁드립니다. 약관을 작성하신 후 회원권 시작 일자를 지정하신 후에 최종적으로 등록이 완료됩니다. 기한 내 방문이 어려우신
            경우
            카카오톡 @애플짐 으로 연락주세요.</li>

          <li>애플짐는 1일 1회 입장이 원칙입니다. 1일 2회 이상 이용하실 회원님들의 경우 옵션 또는 인포데스크를 통해 결제 가능하십니다.</li>

          <li>'개인락커, 회원복 대여, 복수출입 여부'는 옵션에서 추가 후 결제가 가능합니다.</li>

          <li>제휴특가로 결제 원하시는 분은 현장결제 진행해주세요.</li>

          <li>구매 후 환불 요청은 주 이용 센터 인포 데스크를 방문하시거나 카카오톡 @애플짐 으로 문의해주세요.</li>

          <li>APPLEGYM FITNESS가 공식적으로 인정하는 계좌가 아닌 직원 개인의 계좌에 입금 한 경우 APPLEGYM FITNESS가 손해 배상, 환불, 보상에 대해 책임지지 않습니다.</li>

          <li>미시작 이용 환불 시 결제액의 10% 환불 위약금으로 공제되며, 회원권 시작 이후 환불 시 '할인 전 원가'를 기준으로 책정되어 환불됩니다. 그 외 자세한 환불 규정은 약관을 참조해주세요.
          </li>

          <li>이용자는 1회에 한하여 사업자의 동의 하에 이용 계약에 따른 권리, 의무를 양도할 수 있습니다. 이러한 권리는 최초 계약자에 제한합니다.</li>

          <li>이용자는 이용 계약 양도 시 사업자에게 양도에 따른 수수료를 지급하여야 합니다. 양수자가 애플짐의 기존 회원인 경우 33,000원, 비회원인 경우 55,000원을 사업자에게 지급하여야
            합니다.
          </li>

          <li>이용자는 이용계약의 연기 신청을 할 수 있습니다. 이러한 권리는 최초 계약자에 제한합니다. / 3개월 회원권 : (1회) 7-15일, 6개월 회원권 : (2회) 7-30일, 12개월 회원권
            :
            (3회) 7-30일</li>

          <li>지점별 이용 혜택 및 구성이 다를 수 있습니다. 세부 내용은 각 지점 인포데스크 및 공식블로그, 네이버 업체정보 등에서 확인하시기 바랍니다.</li>
        </ul>
      </section><!-- use_manual -->
    </section><!-- contents -->


    <!-- slogan -->
    <div class="slogan">
      <h2 class="blind">슬로건</h2>
      <p><img src="../images/slogan.png" alt=""><span class="blind">DREAMS COME TRUE</span></p>
    </div>



    <?php include "../footer.php"; ?>
    
  </div>


  <script type="text/javascript">
    AOS.init({disable: 'mobile'});
  </script>


</body>

</html>