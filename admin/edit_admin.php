<?php


// 세션 실행
// session_start();
// $s_idx = isset($_SESSION["s_idx"])? $_SESSION["s_idx"]:"";

include "admin_check.php";


// db 연결
include "../inc/dbcon.php";

// 선택한 사용자 정보
$g_idx = $_GET["g_idx"];


// 쿼리 작성
$sql = "select * from members where idx=$g_idx;" ;
// echo $sql;
// exit;


// db에 쿼리 전송
$result = mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));
// echo '$result';
// exit;


// db에서 값 가져오기

  // mysqli_fetch_row(전달쿼리(객체));  -> 필드 순서
  // mysqli_fetch_array(전송쿼리(객체)) : 필드명
  // mysqli_num_rows : 결과행의 개수
  $array = mysqli_fetch_array($result);

  // while ($array = mysqli_fetch_array($result)) {
  //   echo $array;
  // }


  // db 종료
  mysqli_close($dbcon);

  // 사용자 정보 출력

?>

<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no, 
  maximum-scale=1.0, minimum-scale=1.0">
  <title>admin page</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="../images/favicon.ico">
    <link rel="icon" href="../images/favicon.ico">
    <link rel="apple-touch-icon" href="../images/favicon.ico">

    <link href="../css/reset.css" rel="stylesheet">
    <link href="../css/admin_css/admin_header.css" rel="stylesheet">
    <link href="../css/admin_css/edit_admin.css" rel="stylesheet">


    <!-- jQuery -->
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/admin_common.js" defer></script>


    <!-- daumpostcode -->
    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js" type="text/javascript"></script>
</head>

<body>
  <div class="wrap">

  <?php include "admin_header.php"; ?>

      <div class="edit_section cfixed">

        <h2>회원정보 수정</h2>
        <div class="edit_pg">

        <!-- <form name="" aciton="데이터 처리 페이지" method="데이터 전송 방식"> -->
        <form class="edit_form" action="edit_ok_admin.php" method="post" onsubmit="return form_check()">

          <fieldset>
            <legend class="blind">회원 정보 수정</legend>

              <input type="hidden" name="g_idx" value="<?php echo $g_idx; ?>">

            <p class="mem_nm fixed_value">
              <label for="mem_nm">이름</label>
              <span><?php echo $array["mem_nm"]; ?></span>
            </p>

            <p class="male_flg fixed_value">
              <label for="male_flg">성별</label>
              <span><?php echo $array["male_flg"]; ?></span>
            </p>

            <p class="mem_id fixed_value">
              <label for="mem_id">아이디</label>
              <span><?php echo $array["mem_id"]; ?></span>
            </p>

            <p class="mem_pwd">
              <label for="mem_pwd"> 비밀번호 </label>
              <input type="password" name="mem_pwd" id="mem_pwd" maxlength="32" minlength="8" autocomplete="off"
                autocapitalize="off">
            </p>

            <p class="re_pwd">
              <label for="re_pwd"> 비밀번호 확인 </label>
              <input type="password" name="re_pwd" id="re_pwd" maxlength="32" minlength="8"
                placeholder="비밀번호를 재입력 해주세요." autocomplete="off" autocapitalize="off">
            </p>

            <?php
              // 문자열 변환
              // str_replace("어떤 문자를", "어떤 문자로", "어떤 문장에서");
              // str_replace("어떤 문자를", "어떤 문자로", "어떤 문장에서");
              $birth = $array["birth"];
              $birth = str_replace("-", "", $birth);
            ?>

            <p>
              <label for="birth"> 생년월일 </label>
              <input type="date" name="birth" id="birth" maxlength="8" autocomplete="off" autocapitalize="off"
                value="<?php echo $array["birth"]; ?>">
            </p>

            <p class="tel_no">
              <label for="tel_no"> 휴대폰 번호 </label>
              <input type="tel" name="tel_no" id="tel_no" onkeyup="inputTelNumber(this);" maxlength="11"
                autocomplete="off" autocapitalize="off" value="<?php echo $array["tel_no"]; ?>">
              <button type="button">인증번호 전송</button>
              <span>* "-" 없이 숫자만 입력해주세요. ex) 01023236767</span>
            </p>

            <?php

              // 합쳐진 문자열 갈라서 불어오기
              // $txt = "010-1111-2222";
              // $rst = explode("-", $txt);
              // $rst[0] = "010";
              // $rst[1] = "1111";
              // $rst[2] = "2222";


              $email = $array["email"];
              $email = explode("@", $email);

            ?>

            <p class="email_con">
              <label for="email_id">이메일</label>
              <input type="text" name="email_id" id="email_id" autocomplete="off" autocapitalize="off"
                value="<?php echo $email[0]; ?>">
              <span>@</span>
              <input type="text" name="email_dns" id="email_dns" value="<?php echo $email[1]; ?>">

              <select name="email_sel" id="email_sel" onchange="email_change()">
                <option value=""> 직접입력 </option>
                <option value="naver.com"> 네이버</option>
                <option value="daum.net">다음 </option>
                <option value="google.com"> 구글</option>
              </select>
            </p>


            <p class="address">
              <label for="postal_code">우편번호 </label>
              <input type="text" name="postal_code" id="postal_code" value="<?php echo $array["postal_code"]; ?>">
              <button type="button" onclick="DaumPostcode()">주소검색 </button> <br>

              <label for="addr1">기본주소 </label>
              <input type="text" name="addr1" id="addr1" value="<?php echo $array["addr1"]; ?>"><br>

              <label for="addr2">상세주소</label>
              <input type="text" name="addr2" id="addr2" value="<?php echo $array["addr2"]; ?>">
            </p>


            <p class="edit_btn">
              <button type="submit" class="btn_submit" onclick="form_check()">정보수정</button>
              <!-- 클릭했을때 문서 체크 스크립트 실행 -->
            </p>

            <p class="close_btn">
              <button type="button" class="btn_close" onclick="history.back()">닫기</button>
            </p>



          </fieldset>
        </form>
        </div><!-- edit_pg -->

      </div><!-- edit_section -->




  </div><!-- wrap -->

    <!-- 정보수정 스크립트 -->
    <script type="text/javascript">
    // 정보수정 버튼 클릭시 폼 체크
    // function form_check( /* 3 */ frm) {
    function form_check() {

      // /* 2 */ var frm = document.signform;
      var mem_pwd = document.getElementById("mem_pwd");
      var re_pwd = document.getElementById("re_pwd");
      var tel_no = document.getElementById("tel_no");


      // 비밀번호 길이 검증
      // if (mem_pwd.value) {
      //   var mem_pwd_len = mem_pwd.value.length;

      //   if (mem_pwd_len < 8 || mem_pwd_len > 32) {
      //     var txt = document.querySelector(".mem_pwd_err");
      //     alert("비밀번호는 8~32글자만 입력할 수 있습니다.");
      //     mem_pwd.focus();
      //     return false;
      //   };
      // };

      // 이렇게 간단하게 쓸 수도 있다
      // if (mem_pwd.value && mem_pwd.value.length < 8 || mem_pwd.value.length > 32) {
      //   var txt = document.querySelector(".mem_pwd_err");
      //     $(txt).html("* 비밀번호는 8~32글자만 입력할 수 있습니다.");
      //     // alert ("비밀번호는 8~32글자만 입력할 수 있습니다.");
      //     mem_pwd.focus();
      //     return false;
      //   };
      

      // 비밀번호 공백 검증
      if (/[\s]/.test(mem_pwd.value) == true) {
      // alert("비밀번호는 공백없이 입력해주세요.");
        var txt = document.querySelector(".mem_pwd_err");
        txt.textContent = '* 비밀번호는 공백없이 입력해주세요.';
        mem_pwd.focus();
        return false;
      }

      // 비밀번호 길이 검증
      if (!/^[a-zA-Z0-9!@#$%^&*()?_~]{8,32}$/.test(mem_pwd.value)) {
        // alert("비밀번호는 숫자, 영문, 특수문자(!@$%^&*?_~ 만 허용) 조합으로 8~32자리를 사용해야 합니다.");
        var txt = document.querySelector(".mem_pwd_err");
        txt.textContent = '* 비밀번호는 숫자, 영문, 특수문자(!@$%^&*?_~ 만 허용) 조합으로 8~32자리를 사용해야 합니다.';
        mem_pwd.focus();
        return false;
      }


      // 비밀번호 확인 입력
      if (re_pwd.value == '') {
        // alert("비밀번호를 다시 한번 더 입력하세요!");
        var txt = document.querySelector(".re_pwd_err");
        txt.textContent = "* 비밀번호를 한 번 더 입력해주세요.";
        re_pwd.focus();
        return false;
      }

      // 비밀번호 확인 검증
      if (mem_pwd.value != re_pwd.value) {
        var txt = document.querySelector(".re_pwd_err");
        alert("* 비밀번호를 확인해 주세요.");
        re_pwd.focus();
        return false;
      };


      // 핸드폰번호 검증
      // if (tel_no.value) {
      //   var reg = /^[0-9]+$/g; //정규식
      //   if (!reg.test(tel_no.value)) {
      //     var txt = document.querySelector(".tel_no_err");
      //     alert("전화번호는 숫자만 입력할 수 있습니다.");
      //     tel_no.focus();
      //     return false;
      //   };
      // };

      if (!/^[0-9]{10,11}$/.test(tel_no.value)) {
        // alert("휴대폰 번호는 숫자만 10~11자리 입력하세요.");
        var txt = document.querySelector(".tel_no_err");
        txt.textContent = "* 휴대폰 번호는 10~11자리 숫자만 입력하세요.";
        tel_no.focus();
        return false;

      } else if (!/^(01[016789]{1}|02|0[3-9]{1}[0-9]{1})([0-9]{3,4})([0-9]{4})$/.test(tel_no.value)) {
        // alert("유효하지 않은 전화번호 입니다.");
        var txt = document.querySelector(".tel_no_err");
        txt.textContent = "* 유효하지 않은 전화번호 입니다.";
        tel_no.focus();
        return false;
      };


      return true;

      // /* 1 */ document.signform.submit();
      /* 2, 3 */
      // frm.submit();
    };


    /*--------------------------------
    이메일 도메인 옵션 정하기
    ----------------------------------*/

    function email_change() {
      // alert("Test");
      var email_dns = document.getElementById("email_dns");
      var email_sel = document.getElementById("email_sel");

      var idx = email_sel.options.selectedIndex; //selectedIndex뒤에 ()생략->많이써서
      // console.log(idx);

      // var get_text = email_sel.options[idx].text;
      var get_text = email_sel.options[idx].value;

      email_dns.value = get_text;
    };


    /* -----------------------------
    주소 검색
    ------------------------------- */
    // function search_address() {
    //   // window.open("팝업될 문서경로", "팝업된 문서이름", "옵션(크기, 위치, bar 표시)");
    //   window.open("../02-01-join-search_id_ajax.php", "addr", "width=500, height=400, left=0, top=0");

    // };

    // window.open(" ", " ", " ") <- 매게 변수 3개


    function DaumPostcode() {
      new daum.Postcode({
        oncomplete: function (data) {
          // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분입니다.
          // 예제를 참고하여 다양한 활용법을 확인해 보세요.

          // 도로명 주소의 노출 규칙에 따라 주소를 표시한다.
          // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
          var roadAddr = data.roadAddress; // 도로명 주소 변수
          var extraRoadAddr = ''; // 참고 항목 변수

          // 법정동명이 있을 경우 추가한다. (법정리는 제외)
          // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
          if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
            extraRoadAddr += data.bname;
          };

          // 건물명이 있고, 공동주택일 경우 추가한다.
          if(data.buildingName !== '' && data.apartment === 'Y') {
            extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
          };

          // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
          if(extraRoadAddr !== '') {
            extraRoadAddr = ' (' + extraRoadAddr + ')';
          };

          // 우편번호와 주소 정보를 해당 필드에 넣는다.
          document.getElementById('postal_code').value = data.zonecode;
          document.getElementById("addr1").value = roadAddr;
          document.getElementById("addr2").value = data.jibunAddress;

          // 참고항목 문자열이 있을 경우 해당 필드에 넣는다.
          // if(roadAddr !== ''){
          //   document.getElementById("extra_addr").value = extraRoadAddr;
          // } else {
          //   document.getElementById("extra_addr").value = '';
          // };


          var guideTextBox = document.getElementById("guide");
            // 사용자가 '선택 안함'을 클릭한 경우, 예상 주소라는 표시를 해준다.
            if(data.autoRoadAddress) {
                var expRoadAddr = data.autoRoadAddress + extraRoadAddr;
                guideTextBox.innerHTML = '(예상 도로명 주소 : ' + expRoadAddr + ')';
                guideTextBox.style.display = 'block';

            } else if(data.autoJibunAddress) {
                var expJibunAddr = data.autoJibunAddress;
                guideTextBox.innerHTML = '(예상 지번 주소 : ' + expJibunAddr + ')';
                guideTextBox.style.display = 'block';
            } else {
                guideTextBox.innerHTML = '';
                guideTextBox.style.display = 'none';
            };
        } // oncomplete

      }).open(); // Postcoed
      

    }; // DaumPostcode()
    



    // 탈퇴하기 버튼 클릭시 
    function del_mem() {
      var ck = confirm("정말 탈퇴하시겠습니까?\n 탈퇴한 아이디는 다시 사용하실 수 없습니다.");
      if (ck == true) {
        // get 방식으로 값 전달하기
        // http://주소?변수=전달할 값&변수=전달할 값&변수....
        // location.href = " delete.php?idx=
        // <?php //echo $s_idx; ?> 
        // ";

        location.href = "delete.php";
      } else {
        history.back();
      };
    };
  </script>



</body>

</html>