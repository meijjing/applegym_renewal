<!-- join.php -->
<?php
// 세션 실행
session_start();
// echo $_SESSION["s_idx"];

// $s_id = isset(조건)? A:B;
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
  <link rel="stylesheet" href="../css/members_css/join.css">

  <!-- jQuery -->
  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/common.js" defer></script>

  <!-- daumpostcode -->
  <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js" type="text/javascript"></script>
  
</head>

<body>
  <div id="wrap">

  <?php include "../header.php"; ?>


    <!-- contents -->
    <div class="join_section">
      <h2><b>APPLE</b>GYM</h2>

      <div class="join_pg">
        <h3>SIGN UP</h3>
        <p>회원정보를 입력해주세요.</p>


        <form class="join_form" action="join_insert.php" method="post" onsubmit="return form_check()">

          <fieldset>
            <legend class="blind">회원가입</legend>


            <p class="mem_nm">
              <label for="mem_nm"> 이름<span class="star">*</span> </label>
              <input type="text" name="mem_nm" id="mem_nm" maxlength="10" placeholder="이름을 입력해주세요." autocomplete="off"
                autocapitalize="off">
              <span class="mem_nm_err err"></span>
            </p>


            <p class="male_flg">
              <label for="male_flg">성별<span class="star">*</span></label>
              <select name="male_flg" id="male_flg" autocomplete="off" autocapitalize="off">
                <option value="" selected>-- 선택 --</option>
                <option value="M">남</option>
                <option value="F">여</option>
              </select>
            </p>


            <p class="mem_id">
              <label for="mem_id">아이디<span class="star">*</span></label>
              <input type="text" name="mem_id" id="mem_id" minlength="4" maxlength="12"
                placeholder="아이디를 4~12글자로 입력해주세요." autocomplete="off" autocapitalize="off">
              <button type="button" name="checked_id" class="btn_id_check" value="" onclick="search_id()">아이디
                중복확인</button>
              <!-- <button type="hidden" name="checked_id" class="hidden_id_check" value=""></button> -->
              <!--버튼 타입: button summit reset-->
              <span class="mem_id_err err"></span>
              <!-- <span class="mem_id_err"></span> -->
            </p>


            <p class="mem_pwd">
              <label for="mem_pwd">비밀번호<span class="star">*</span></label>
              <input type="password" name="mem_pwd" id="mem_pwd" maxlength="32" minlength="8"
                placeholder="숫자, 영문, 특수문자(!@$%^&*?_~ 만 허용) 조합으로 8~32자리" autocomplete="off"
                autocapitalize="off">
              <span class="mem_pwd_err err"></span>
            </p>

            <p class="re_pwd">
              <label for="re_pwd">비밀번호 확인<span class="star">*</span></label>
              <input type="password" name="re_pwd" id="re_pwd" maxlength="32" minlength="8"
                placeholder="비밀번호를 재입력 해주세요." autocomplete="off" autocapitalize="off">
              <span class="re_pwd_err err"></span>
            </p>



            <p class="tel_no">
              <label for="tel_no">휴대폰 번호<span class="star">*</span></label>
              <input type="tel" name="tel_no" id="tel_no" maxlength="11" placeholder="'-' 없이 숫자만 입력해주세요. ex) 01023236767" autocomplete="off"
                autocapitalize="off">
              <!-- <input type="tel" name="tel_no" id="tel_no" onkeyup="inputTelNumber();" maxlength="11"
                placeholder="연락처를 입력해주세요." autocomplete="off" autocapitalize="off"> -->
              <button type="submit" onclick="authSend()">인증번호 전송</button>
              <span id="span_phone"></span>
              <span class="tel_no_err err"></span>
            </p>


            <p class="birth">
              <label for="birth">생년월일<span class="star">*</span></label>
              <input type="datetime" name="birth" id="birth" maxlength="8" placeholder="생년월일을 입력해주세요. ex) 20210521"
                autocomplete="off" autocapitalize="off">
              <span class="birth_err err"></span>
            </p>

            <p class="email_con">
              <label for="email_id">이메일</label>
              <input type="text" name="email_id" id="email_id" placeholder="이메일 아이디" autocomplete="off"
                autocapitalize="off">
              <span>@</span>
              <label for="email_dns" class="blind"></label>
              <input type="text" name="email_dns" id="email_dns">

              <select name="email_sel" id="email_sel" onchange="email_change()">
                <option value=""> 직접입력 </option>
                <option value="naver.com"> 네이버</option>
                <option value="daum.net">다음 </option>
                <option value="google.com"> 구글</option>
              </select>
            </p>

            <p class="address">
              <label for="postal_code">우편번호 </label>
              <input type="text" name="postal_code" id="postal_code" placeholder="주소 검색을 해주세요." readonly>
              <button type="button" onclick="DaumPostcode()">주소검색 </button> <br>

              <label for="addr1">기본주소 </label>
              <input type="text" name="addr1" id="addr1"><br>

              <span id="guide"></span>

              <label for="addr2">상세주소</label>
              <input type="text" name="addr2" id="addr2" placeholder="상세주소를 입력해주세요.">
            </p>

            <p class="agree">
              <input type="checkbox" name="agree" id="agree" value="Y" checked="checked">
              <label for="agree">약관에 동의합니다.</label>
            </p>


            <p class="join_btn">
              <button type="button" class="btn_submit" onclick="form_check(this.form)">SIGN UP</button>
              <!-- 클릭했을때 문서 체크 스크립트 실행 -->
            </p>

            <p class="close_btn">
              <button type="button" class="btn_close" onclick="history.back()">닫기</button>
            </p>



          </fieldset>
        </form>
      </div>
    </div>


    <!-- slogan -->
    <div class="slogan">
      <h2 class="blind">슬로건</h2>
      <p><img src="../images/slogan.png" alt=""><span class="blind">DREAMS COME TRUE</span></p>
    </div>



    <?php include "../footer.php"; ?>

  </div><!-- wrap -->

    

  <!-- 회원가입 스크립트 -->
  <script type="text/javascript">
    // 회원가입 버튼 클릭시 회원가입 폼 체크
    function form_check( /* 3 */ frm) {

      // /* 2 */ var frm = document.signform;
      var mem_nm = document.getElementById("mem_nm");
      var male_flg = document.getElementById("male_flg");
      var mem_id = document.getElementById("mem_id");
      var mem_pwd = document.getElementById("mem_pwd");
      var re_pwd = document.getElementById("re_pwd");
      var tel_no = document.getElementById("tel_no");
      var birth = document.getElementById("birth");
      var agree = document.getElementById("agree");


      // 이름(필수) 미입력시
      if (!mem_nm.value) { // if(!mem_nm.value) //값이 없다면
        // if (mem_nm.value != "") {   // if(mem_nm.value) //값이 있다면

        // alert("이름을 입력하세요.");
        var txt = document.querySelector("#mem_nm");
        // txt.innerHTML = "<!> 이름을 입력하세요.</!>"
        txt.textContent = "* 이름을 입력하세요!";
        mem_nm.focus();
        return false;
      };


      // 아이디(필수) 미입력 시
      if (!mem_id.value) {
        // alert("아이디를 입력하세요!");
        var txt = document.querySelector(".mem_id_err");
        txt.textContent = "* 아이디를 입력하세요!";
        mem_id.focus();
        return false;
      };


      // 아이디 길이 정하기 * 4~12자리 *
      var mem_id_len = mem_id.value.length;

      if (mem_id_len < 4 || mem_id_len > 12) {

        var txt = document.querySelector(".mem_id_err");
        txt.textContent = "* 아이디는 4~12글자만 입력할 수 있습니다.";
        // alert("아이디는 4~12글자만 입력할 수 있습니다.");
        mem_id.focus();
        return false;
      };


      // 아이디 중복확인 미 체크 시
      // $(".btn_id_check").click(function () {
      //   $("input[name=checked_id]").value = "y";

      //   if ($("input[name='checked_id']").value = "") {
      //     alert('아이디 중복 확인을 해주세요.');
      //     // $("input[name='checked_id']").eq(0).focus();
      //     mem_id.focus();
      //     return false;
      //   }
      // });

      

      // 비밀번호(필수) 미입력 시
      if (!mem_pwd.value) {
        var txt = document.querySelector(".mem_pwd_err");
        txt.textContent = '* 비밀번호를 입력하세요.';
        // alert("비밀번호를 입력하세요.");
        mem_pwd.focus();
        return false;
      };

      // 비밀번호 공백없이
      if (/[\s]/.test(mem_pwd.value) == true) {
        // alert("비밀번호는 공백없이 입력해주세요.");
        var txt = document.querySelector(".mem_pwd_err");
        txt.textContent = '* 비밀번호는 공백없이 입력해주세요.';
        mem_pwd.focus();
        return false;
      }

      // // 비밀번호 길이 검증
      // var mem_pwd_len = mem_pwd.value.length;
      // if (mem_pwd_len < 8 || mem_pwd_len > 32) {
      //   var txt = document.querySelector(".mem_pwd_err");
      //   txt.textContent = "비밀번호는 8~32글자만 입력할 수 있습니다.";
      //   // alert("비밀번호는 4~8글자만 입력할 수 있습니다.");
      //   mem_pwd.focus();
      //   return false;
      // };

      // 비밀번호 길이 검증
      if (!/^[a-zA-Z0-9!@#$%^&*()?_~]{8,32}$/.test(mem_pwd.value)) {
        // alert("비밀번호는 숫자, 영문, 특수문자(!@$%^&*?_~ 만 허용) 조합으로 8~32자리를 사용해야 합니다.");
        var txt = document.querySelector(".mem_pwd_err");
        txt.textContent = '* 비밀번호는 숫자, 영문, 특수문자(!@$%^&*?_~ 만 허용) 조합으로 8~32자리를 사용해야 합니다.';
        mem_pwd.focus();
        return false;
      }

      // 영문, 숫자, 특수문자 2종 이상 혼용
      // var chk = 0;
      // if (/[0-9]/g.test(mem_pwd.value)) chk++;
      // if (/[a-z]/ig.test(mem_pwd.value)) chk++;
      // if (/[!@#$%^&*()?_~]/g.test(mem_pwd.value)) chk++;
      // if (chk <script 2) {
      //   // alert("비밀번호는 숫자, 영문, 특수문자를 두가지이상 혼용하여야 합니다.");
      //   var txt = document.querySelector(".mem_pwd_err");
      //   txt.textContent = '비밀번호는 숫자, 영문, 특수문자를 두가지이상 혼용하여야 합니다.';
      //   mem_pwd.focus();
      //   return false;
      // }
      // email이 아닌 userID 인 경우에는 체크하면 유용. email은 특수 허용문자에서 걸러진다.
      /*
      if(password.val().search(userID.val())>-1){
        alert("userID가 포함된 비밀번호는 사용할 수 없습니다.");
        return false;
      }
		  */


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
        txt.textContent = "* 비밀번호가 일치하지 않습니다.";
        // alert("비밀번호를 확인해주세요.");
        re_pwd.focus();
        return false;
      };


      // 핸드폰번호 검증
      if (tel_no.value == '') {
        // alert('휴대폰 번호를 입력하세요');
        var txt = document.querySelector(".tel_no_err");
        txt.textConten = "* 휴대폰 번호를 입력하세요.";
        tel_no.focus();
        return false;

      } else if (!/^[0-9]{10,11}$/.test(tel_no.value)) {
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

      // var reg = /^[0-9]+$/g; //정규식
      // if (!reg.test(tel_no.value)) {
      //   var txt = document.querySelector(".tel_no_err");
      //   txt.textContent = "전화번호는 숫자만 입력할 수 있습니다.";
      //   tel_no.focus();
      //   return false;
      // };


      // 생년월일 미 입력시
      if (!birth.value) {
        var txt = document.querySelector(".birth_err");
        txt.textContent = '* 생년월일을 입력하세요. ex)20210521';
        // alert("생년월일을 입력하세요. ex)20210521");
        birth.focus();
        return false;
      };


      // 약관동의 체크박스
      if (!agree.checked) {
        alert("약관 동의가 필요합니다.");
        agree.focus();
        return false;
      };


      // return true;


      // /* 1 */ document.signform.submit();
      /* 2, 3 */
      frm.submit();

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
    //   window.open("join_addr_search.html", "addr", "width=500, height=400, left=0, top=0");

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
    


    /* --------------------------------
    아이디 중복 확인
    ----------------------------------- */

    function search_id() {

      // $(".mem_id").keyup(function () {
      //   var mem_id = $(".mem_id").val();

      // 아이디(필수) 미입력 시
      if (!mem_id.value) {
        $(".mem_id_err").html("아이디를 입력하세요.");
        mem_id.focus();
        return false;

      } else if (mem_id.value.length < 4 || mem_id.value.length > 12) { // 아이디 길이 정하기 * 4~12자리 *
        $(".mem_id_err").html("아이디는 4~12글자만 입력할 수 있습니다.");
        mem_id.focus();
        return false;

      } else {

        $.ajax({
          url: "join_id_check.php",
          type: "post",
          data: {
            mem_id: mem_id.value,
          }, //data: {변수: 값, 변수: 값, ...}
          success: function (data) {

            // if (data.result == 1) {
            //   $(".mem_id_err").html('사용 가능합니다.');
            // } else if (data.result == 0) {
            //   $(".mem_id_err").html("이미 가입된 아이디입니다.");
            //   mem_id.val("");
            // }

            $(".mem_id_err").html(data);

          },

          // error: function () {
          //   $(".mem_id_err").html("ERROR");
          // },
          error: function (jqXHR, textStatus, errorThrown) {
            alert("arjax error : " + textStatus + "\n" + errorThrown);
          },


        }); // ajax

      }; // else

    }; // function search_id()


    // $(".btn_id_check").click(function () {
    //   $("input[name=checked_id]").value('y');

    //   $(function () {
    //     $(".btn_submit").click(function () {

    //       if ($("input[name='checked_id']").value == '') {
    //         alert('아이디 중복 확인을 해주세요.');
    //         $("input[name='checked_id']").eq(0).focus();
    //         return false;
    //       }
    //     });
    //   });

    // }); // btn_id_check



    // sms 인증번호
    // function authSend() {
    //     f = document.fform;
    //     auth_nm = f.mem_nm.value;
    //     phone = f.tel_no.value;
    //     url = "/theme/jejubbs_com/skin/member/basic/password_lost_phone.send.php";

    //     $.post(url, {"mem_nm":auth_nm, "tel_no":phone}, function (data) {
    //         $("#span_phone").html(data);
    //     });
    // }
  </script>

</body>

</html>