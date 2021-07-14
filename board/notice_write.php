<?php
include "../admin/admin_check.php";
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
  <link href="../css/board_css/notice_write.css" rel="stylesheet">

  <!-- jQuery -->
  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/admin_common.js" defer></script>
</head>
<body>
  <div class="wrap">
    <!-- admin header -->
    <header>
      <div class="header">
        <h1><a href="../admin/admin.php">관리자 페이지</a></h1>
        <a href="#" class="menu_toggle_btn" onclick="openNav()"></a>

        <nav class="nav">
          <ul id="gnb" class="gnb">
            <li class="mem_list"><a href="../admin/members_list.php">회원 관리</a></li>
            <li class="notice_list"><a href="../admin/notice_list.php">공지사항게시판</a></li>
            <li class="event_list"><a href="../admin/event_list.php">이벤트게시판</a></li>
            <li class="commu_list"><a href="../admin/community_list.php">커뮤니티게시판</a></li>
          </ul>

          <ul class="user_btn">
            <li class="home_btn"><a href="../index.php">홈으로</a></li>
            <li class="logout_btn"><a href="#" onclick="log_out()">로그아웃</a></li>
          </ul>

        </nav>

      </div><!-- header -->
    </header>

    <script type="text/javascript">
      function log_out() {
      var ck = confirm("로그아웃 하시겠습니까?");
      if (ck == true) {
        location.href = "../members/logout.php";
      };
    }
    </script>

    <div class="write_section cfixed">
      <h2>공지사항 게시물 쓰기</h2>

      
        <!-- 입력 폼 -->
        <form class="wr_form" action="notice_write_ok.php" method="post" enctype="multipart/form-data" onsubmit="return form_check()">

          <fieldset class="cfixed">
            <legend class="blind">공지사항 게시물 쓰기</legend>

            <p class="auth_nm cfixed">
              <label for="auth_nm"> 작성자 </label>
              <input type="text" name="auth_nm" id="auth_nm" maxlength="10" placeholder="이름" autocomplete="off"
                autocapitalize="off">
              <span class="auth_nm_err"></span>
            </p>

            <p class="email cfixed">
              <label for="email">이메일</label>
              <input type="text" name="email" id="email" maxlength="100" placeholder="이메일" autocomplete="off"
                autocapitalize="off">
              <span class="email_err"></span>
            </p>

            <p class="pwd cfixed">
              <label for="pwd"> 비밀번호 </label>
              <input type="password" name="pwd" id="pwd" maxlength="8" placeholder="8자리" autocomplete="off"
                autocapitalize="off">
            </p>

            <p class="title cfixed">
              <label for="title" class="blind">제목</label>
              <input type="text" name="title" id="title" maxlength="100" placeholder="제목을 입력해 주세요." autocomplete="off"
                autocapitalize="off">
            </p>

            <p class="content">
              <label for="content" class="blind">내용</label>
              <textarea name="content" id="content" cols="80" placeholder="내용을 입력하세요"></textarea>
            </p>

            <p class="file cfixed">
              <label for="file">첨부파일: </label>
              <input type="file" value="1" name="file" id="file">
            </p>

            <p class="lock_post cfixed">
              <input type="checkbox" name="lock" id="lock" value="1">
              <label for="lock">비밀글로 설정합니다.</label>
            </p>
          </fieldset>

          <p class="btns cfixed">
              <button type="submit" value="저장하기">저장하기</button>
              <button type="reset" value="다시 쓰기">다시쓰기</button>
              <button type="button" value="뒤로가기" onclick="history.back()">돌아가기</button>
            </p>
        </form>
    </div><!-- write_section -->
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
      if (!auth_nm.value) { // if(!mem_nm.value) //값이 없다면
        // if (mem_nm.value != "") {   // if(mem_nm.value) //값이 있다면

        alert("이름을 입력하세요.");
        auth_nm.focus();
        return false;
      };

      // 비밀번호(필수) 미입력시
      if (!pwd.value) {

        alert("비밀번호를 입력하세요.");
        pwd.focus();
        return false;
      };

      // 비밀번호 공백없이
      if (/[\s]/.test(pwd.value) == true) {
        alert("비밀번호는 공백없이 입력해주세요.");
        mem_pwd.focus();
        return false;
      };

      // 비밀번호 길이 정하기 * 8자리 *

      if (pwd.length < 8) {

        alert("비밀번호는 8자리로 입력해주세요.");
        mem_id.focus();
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

      // return true;

      // /* 1 */ document.signform.submit();
      /* 2, 3 */
      frm.submit();

    };
  </script>
</body>
</html>