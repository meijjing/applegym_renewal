<?php

session_start();

$s_id = isset($_SESSION["s_id"])? $_SESSION["s_id"]:"";
$s_name = isset($_SESSION["s_name"])? $_SESSION["s_name"]:"";

if(!$s_id){ // 로그인인 되지 않았다면
  echo "
    <script type=\"text/javascript\">
      alert (\"로그인 후 사용가능합니다.\");
      history.back();
    </script>
  ";
}

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
  <link href="../css/header.css" rel="stylesheet">
  <link href="../css/footer.css" rel="stylesheet">
  <link href="../css/board_css/community_write.css" rel="stylesheet">


  <!-- jQuery -->
  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/common.js" defer></script>

</head>

<body>
  <div class="wrap">

    <?php include "../header.php"; ?>

    <section class="main_section">
      <div class="main_img">
        <h2 class="blind">COMMUNITY</h2>
        <p class="blind">애플짐 피트니스 센터를 소개합니다.</p>
        <img src="../images/community_main.png" alt="">


        <!-- aside -->
        <aside class="aside">
          <ul>
            <li><a class="aside_menu" href="notice.php">NOTICE</a></li>
            <li><a class="aside_menu" href="event.php">EVENT</a></li>
            <li><a class="on_menu" href="community.php">COMMUNITY</a></li>
          </ul>
        </aside>
      </div>
    </section><!-- main_section -->

    <!-- contents -->
    <section class="contents">
      
      <div class="write_section cfixed">
        <h2>커뮤니티 게시물 쓰기</h2>

          <!-- 입력 폼 -->
          <form class="wr_form" id="wr_form" action="community_write_ok.php" method="post" enctype="multipart/form-data" onsubmit="return form_check()">

            <fieldset class="cfixed">
              <legend class="blind">커뮤니티 게시물 쓰기</legend>


              <p class="auth_nm cfixed">
                <label for="auth_nm">작성자</label>
                <input type="text" name="auth_nm" id="auth_nm" maxlength="10" placeholder="이름 (필수)" autocomplete="off"
                  autocapitalize="off">
              </p>


              <p class="email cfixed">
                <label for="email">이메일</label>
                <input type="text" name="email" id="email" maxlength="100" placeholder="이메일" autocomplete="off"
                  autocapitalize="off">
              </p>

              <p class="title cfixed">
                <label for="title" class="blind">제목</label>
                <input type="text" name="title" id="title" maxlength="100" placeholder="제목을 입력 해주세요. (필수)" autocomplete="off"
                  autocapitalize="off">
              </p>

              <p class="file cfixed">
                <label for="file">첨부파일: </label>
                <input type="file" name="file" id="file">
                <!-- <button type="button" id="file_btn">올리기</button> -->
              </p>

              <p class="content">
                <label for="content" class="blind">내용</label>
                <textarea name="content" id="content" cols="80" placeholder="내용을 입력해주세요. (필수)"></textarea>
              </p>

              <p class="lock_post cfixed">
                <input type="checkbox" name="lock" id="lock" value="1">
                <label for="lock">비밀글로 설정합니다.</label>

                <label for="pwd" class="blind"> 비밀번호 </label>
                <input type="password" name="pwd" id="pwd" maxlength="8" placeholder="비밀번호 8자리" autocomplete="off"
                  autocapitalize="off">      
              </p>
            </fieldset>

            <p class="btns cfixed">
                <button type="submit" value="저장하기">저장하기</button>
                <button type="reset" value="다시 쓰기">다시쓰기</button>
                <button type="button" value="뒤로가기" onclick="history.back()">돌아가기</button>
            </p>
          </form>
      
      </div><!-- write_section -->

    </section><!-- contents_section -->

    <?php include "../footer.php" ?>

  </div><!-- wrap -->



  <!-- 폼체크 스크립트 -->
  <script type="text/javascript">
    // 저장하기 버튼 클릭시 폼 체크
    function form_check( /* 3 */ frm) {

      // /* 2 */ var frm = document.signform;
      var auth_nm = document.getElementById("auth_nm");
      var eamil = document.getElementById("eamil");
      var title = document.getElementById("title");
      var content = document.getElementById("content");
      var pwd = document.getElementById("pwd");
      var lock = document.getElementById("lock");


      // 이름(필수) 미입력시
      if (!auth_nm.value) { 
        alert("이름을 입력하세요.");
        auth_nm.focus();
        return false;
      };

      // 제목(필수) 미입력시
      if (!title.value) {
        alert("제목을 입력하세요.");
        title.focus();
        return false;
        };

      // 내용(필수) 미입력시
      if (!content.value) {
        alert("내용을 입력하세요.");
        content.focus();
        return false;
      };


      // 비밀번호 입력시 검증
      if(pwd.value) {

        if (!lock.value) {
          alert("비밀글을 체크하여 주세요.");
          lock.focus();
          return false;
        }

        // 비밀번호 공백없이
        if (/[\s]/.test(pwd.value) == true) {
          alert("비밀번호는 공백없이 입력해주세요.");
          mem_pwd.focus();
          return false;
        }

        // 비밀번호 길이 정하기 * 8자리 *
        if (pwd.length < 8) {
          alert("비밀번호는 8자리로 입력해주세요.");
          mem_id.focus();
          return false;
        }
      };

      // 비밀글 체크 시 검증
      if (lock.checked) {
        if(!pwd.value) {
          alert("비밀번호를 입력하세요.");
          pwd.focus();
          return false;
        }
      };
      frm.submit();
    };
  </script>


  <!-- 파일 이미지 리사이징 -->
  <!-- <script type="text/javascript">
    $("#file_btn").on('click', function(e){
      e.preventDefault();

      var val = $("#file").val();
      var fd = new FormData($("#wr_form")[0]);

      if (val) {
        
        fd.append("file", $("input[name=file]")[0].files[0]);

        $.ajax ({
          type: "post",
          url: "fileImgChg.php",
          data: fd,
          processData: false,
          contentType: false,
          success: function(data, status, xhr) {
            alert("파일이 정상적으로 업로드되었습니다.");
            // window.location.reload(true);
          },
          error: function(xhr, status, error) {
            alert("파일 업로드시 오류가 발생했습니다.");
          }
        });
      }
    });

  
  
  </script> -->


</body>

</html>