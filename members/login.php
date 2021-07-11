<!-- login.php -->
<?php

// 세션 실행
session_start();


// $s_id = isset(조건)? A:B;
$s_id = isset($_SESSION["s_id"])? $_SESSION["s_id"]:"";
$s_name = isset($_SESSION["s_name"])? $_SESSION["s_name"]:"";

?>

<?php
if($s_id){ // 로그인이 되었다면
  header("location: mypage.php" );
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
  <link rel="stylesheet" href="../css/members_css/login.css">

  <!-- jQuery -->
  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/common.js" defer></script>

  </head> 
  
  <body>

  <div id="wrap">

  <?php include "../header.php"; ?>



    <!-- contents -->
    <div class="contents">

      <div class="login_pg">
        <h2>
          <b>APPLE</b>GYM
        </h2>

        <div class="login_body">
          <h3 class="login_title">LOGIN</h3>
          <p class="login_text">회원전용 페이지 입니다. 로그인 후 이용해 주세요.</p>

          <form class="login_form" action="login_ok.php" method="post">
            <fieldset>
              <legend class="blind">로그인</legend>

              <p>
                <label for="mem_id" class="blind">ID</label>
                <input type="text" name="mem_id" id="mem_id" size="80" maxlength="12" placeholder="ID" autocomplete="off" autocapitalize="off">
                <span class="mem_id_err"></span>
              </p>


              <p>
                <label for="mem_pwd" class="blind">PASSWORD</label>
                <input type="password" name="mem_pwd" id="mem_pwd" size="80" maxlength="12" placeholder="PASSWORD" autocomplete="off" autocapitalize="off">
                <span class="mem_pwd_err"></span>
              </p>


              <button type="button" class="login_btn" onclick="form_check(this.form)">LOG IN</button>
            </fieldset>

            <ul>
              <li class="find_id_btn"><a href="#">아이디 찾기</a></li>
              <li class="find_pwd_btn"><a href="#">비밀번호 찾기</a></li>
              <li><a href="join.php">회원가입</a></li>
            </ul>
          </form>
        </div><!-- login_body -->
      </div><!-- login -->
    </div><!-- contents -->

    <!-- slogan -->
    <div class="slogan">
      <h2 class="blind">슬로건</h2>
      <p><img src="../images/slogan.png" alt=""><span class="blind">DREAMS COME TRUE</span></p>
    </div>

  <?php include "../footer.php"; ?>

  </div><!-- wrap -->


  <!--------------------------------
  아이디 찾기 모달창
  --------------------------------->
  <div id="modal_id">
    <div id="find_id_modal">
      <div class="modal_head">
        <h1 class="logo" onclick="location.href='../index.php'" )>애플짐 피트니스</h1>
        <button type="button">닫기</button>
      </div>

      <section class="find_id_section">
        <h2>아이디 찾기</h2>

        <form id="id_form" action="find_look.php" method="POST">
          <fieldset>
            <legend class="blind">아이디 찾기</legend>

            <p class="cfixed">
              <label for="name"" class="name">이름</label>
              <input type="text" name="name" id="name" size="10" placeholder="이름을 입력해 주세요" autocomplete="off"
                autocapitalize="off">
            </p>

            <p class="cfixed">
              <label for="mobile">전화번호</label>
              <input type="text" name="mobile" id="mobile" size="11" placeholder="숫자만 입력해 주세요 ex)01033330000"
                autocomplete="off" autocapitalize="off">
            </p>

            <input type="hidden" value="0" name="check">
            <button type="button" onclick="find_check(0)">아이디 찾기</button>
          </fieldset>
        </form>

      </section>
    </div><!-- find_id_modal -->
  </div><!-- modal -->


  <!-----------------------------------
  비밀번호 찾기 모달창
  ------------------------------------>
  <div id="modal_pwd">
    <div id="find_pwd_modal"> 
      <div class="modal_head">
        <h1 class="logo" onclick="location.href='../index.php'">애플짐 피트니스</h1>
        <button type="button">닫기</button>
      </div>

      <section class="find_pwd_section">
        <h2>비밀번호 찾기</h2>

        <form id = "pwd_form" action="find_look.php" method="POST">
          <fieldset>
            <legend class="blind">비밀번호 찾기</legend>
            
            <p class="cfixed">
              <label for="name2" class="name">이름</label>
              <input type="text" name="name" id="name2" size="10" placeholder="이름을 입력해 주세요." autocomplete="off" autocapitalize="off">
            </p>

            <p class="cfixed">
              <label for="id" class="id">아이디</label>
              <input type="text" name="id" id="id" size="11" placeholder="아이디를 입력해 주세요." autocomplete="off" autocapitalize="off">
            </p>

            <p class="cfixed">
              <label for="mobile">전화번호</label>
              <input type="text" name="mobile" id="mobile" size="11" placeholder="숫자만 입력해 주세요. ex)01033330000" autocomplete="off" autocapitalize="off">
            </p>

            <input type="hidden" value="1" name="check">
            <button type="button" onclick="find_check(1)">비밀번호 찾기</button>
          </fieldset>
        </form>

      </section>
    </div><!-- find_pwd_modal -->
  </div><!-- modal -->

  <!-- 폼 체크 스크립트 -->
  <script type=text/javascript> 

  // 로그인 폼 체크 
  function form_check(frm) { 
    var mem_id = $("#mem_id"); 
    var mem_pwd = $("#mem_pwd"); 

    // 아이디(필수) 미입력 시 
    if (mem_id.val() == "" ) { 
      alert("아이디를 입력하세요.");
      mem_id.focus(); 
      return false; 
    }; 

    // 비밀번호(필수) 미입력 시 
    if (mem_pwd.val() == "" ) { 
      alert('비밀번호를 입력하세요.'); 
      mem_pwd.focus();
      return false; 
    }; 
    
    frm.submit(); 
  }; // form_check()


  /*--------------------------------
    아이디 찾기
  -----------------------------------*/
  
  function find_check(index){

    
    if(index == 0) {

      var name = $("#name");
      var mobile = $("#mobile");

      // 이름을 입력하지 않았다면
      if ( name.val()=="") {
        alert("이름을 입력하세요.");
        name.focus();
        return false;

      // 전화번호를 입력하지 않았다면
      } else if ( mobile.val()=="") {
        alert("전화번호를 입력하세요.");
        mobile.focus();
        return false;
      }
      // 서버로 폼 데이터 보내기
      // return true;
      $("#id_form").submit();


  /*--------------------------------
    비밀번호 찾기
  -----------------------------------*/
    } else if (index == 1) {

      var name2 = $("#name2");
      var id = $("#id");
      var mobile2 = $("#mobile2");

      if(name2.val()=="") {
        alert("이름을 입력하세요.");
        name2.focus();
        return false;

      } else if(id.val()=="") {
        alert("아이디를 입력하세요.");
        id.focus();
        return false;

      } else if(mobile2.val()=="") {
        alert("전화번호를 입력하세요.");
        mobile2.focus();
        return false;
      }

      // return true; // find_check pwd
      $("#pwd_form").submit();
    };
  };




    // 모달창 오픈
    $(document).ready(function(){

      $(".find_id_btn").click(function() {
        $("#modal_id").addClass('active');
      })
      $(".modal_head button").click(function() {
        $("#modal_id").removeClass('active')
      });


      $(".find_pwd_btn").click(function() {
        $("#modal_pwd").addClass('active');
      })
      $(".modal_head button").click(function() {
        $("#modal_pwd").removeClass('active')
      });
    });

  </script> 

</body>

</html>