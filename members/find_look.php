<!-- find_look.php -->
<?php

// 세션 실행
session_start();

// find.php에서 넘어온 데이터 받기
$mem_nm = $_POST["mem_nm"];
$mem_id = $_POST["mem_id"];
$tel_no = $_POST["tel_no"];
$i = $_POST["check"];


$name = $_POST["name"];
$mobile = $_POST["mobile"];
$id = $_POST["id"];



// db 외부 파일 불러오기
include "../inc/dbcon.php";


// 아이디 찾기
if($i == 0) {

  $sql = "select mem_id from members where mem_nm ='$name' and tel_no = '$mobile'";

  // $result = $db->query($sql);
  // mysqli_query("연결객체", "전송할 쿼리");
  $result = mysqli_query($dbcon, $sql);

  $array = mysqli_fetch_array($result);


  $num = mysqli_num_rows($result);


  if ($num == 1) {
    echo "
      <script type=\"text/javascript\">
        alert(\"찾고자 하는 아이디는 ".$array['mem_id']." 입니다.\");
        location.href=\"login.php\";
      </script>
  ";
  } else {
    echo "
      <script type=\"text/javascript\">
        alert(\"이름 또는 전화번호를 잘못 입력하였습니다.\");
        history.back();
      </script>
    ";
  }; 




// 비밀번호 찾기
} else if ($i == 1) {

  $sql = "select * from members where mem_nm = '$name' and mem_id ='$id' and tel_no = '$mobile'";


  // $result = $db->query($sql);
  $result = mysqli_query($dbcon, $sql);

  $array = mysqli_fetch_array($result);

  $num = mysqli_num_rows($result);

  if ($num == 1) {

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
  <link rel="stylesheet" href="../css/members_css/find_look.css">

  <!-- jQuery -->
  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="js/00-common.js" defer></script>

  



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

          <form class="login_form" action="login_ok.php" method="post"">
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


              <button type="submit" class="login_btn">LOG IN</button>
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



  <!-----------------------------------
  비밀번호 찾기 모달창
  ------------------------------------>
  <div id="modal_pwd">
    <div id="find_pwd_modal"> 
      <div class="modal_head">
        <h1 class="logo" onclick="location.href='../index.php'">애플짐 피트니스</h1>
        <button type="button" onclick="history.back()">닫기</button>
      </div>

      <section class="find_pwd_section">
        <h2>비밀번호 변경하기</h2>

        <form id = "pwd_form" action="pwd_edit_ok.php" method="POST">
          <fieldset>
            <legend class="blind">비밀번호 변경</legend>

            <input type="hidden" name="idx" id="idx" value="<?php echo $array['idx']; ?>">

            <p class="cfixed">
              <label for="pwd"> 비밀번호 </label>
              <input type="password" name="pwd" id="pwd" maxlength="32" minlength="8"
                placeholder="숫자, 영문, 특수문자(!@$%^&*?_~ 만 허용) 조합으로 8~32자리" autocomplete="off"
                autocapitalize="off">
            </p>

            <p class="cfixed">
              <label for="r_pwd"> 비밀번호 확인 </label>
              <input type="password" name="r_pwd" id="r_pwd" maxlength="32" minlength="8"
                placeholder="비밀번호를 재입력 해주세요." autocomplete="off" autocapitalize="off">
            </p>



            <input type="hidden" value="1" name="check">
            <button type="button" onclick="form_check(this.form)">비밀번호 변경</button>
          </fieldset>
        </form>

      </section>
    </div><!-- find_pwd_modal -->
  </div><!-- modal -->




  <!-- 폼 체크 스크립트 -->
  <script type=text/javascript> 

function form_check(frm) {

  var mem_pwd = document.getElementById("pwd");
  var re_pwd = document.getElementById("r_pwd");

  // 비밀번호(필수) 미입력 시
  if (!mem_pwd.value) {
    alert("비밀번호를 입력하세요.");
    mem_pwd.focus();
    return false;
  };

  // 비밀번호 공백없이
  if (/[\s]/.test(mem_pwd.value) == true) {
    alert("비밀번호는 공백없이 입력해주세요.");
    mem_pwd.focus();
    return false;
  };

  // 비밀번호 길이 검증
  if (!/^[a-zA-Z0-9!@#$%^&*()?_~]{8,32}$/.test(mem_pwd.value)) {
    alert("비밀번호는 숫자, 영문, 특수문자(!@$%^&*?_~ 만 허용) 조합으로 8~32자리를 사용해야 합니다.");
    mem_pwd.focus();
    return false;
  }


  // 비밀번호 확인 입력
  if (re_pwd.value == '') {
    alert("비밀번호를 다시 한번 더 입력하세요!")
    re_pwd.focus();
    return false;
  }

  // 비밀번호 확인 검증
  if (mem_pwd.value != re_pwd.value) {
    alert("비밀번호를 확인해주세요.");
    re_pwd.focus();
    return false;
  };


frm.submit();

};

  </script> 

</body>

</html>

<?php
  } else {
    echo "
      <script type=\"text/javascript\">
        alert(\"이름 또는 전화번호를 잘못 입력하였습니다.\");
        history.back();
      </script>
    ";
  };

};


  // db 종료
  mysqli_close($dbcon);
?>