<?php

header('Content-Type: text/html; charset=UTF-8');

// 세션 실행
session_start();

// unset(삭제할 세션 변수);
unset($_SESSION["s_idx"]);
unset($_SESSION["s_name"]);
unset($_SESSION["s_id"]);

// 페이지 이동
?>
  <script type="text/javascript">
    alert("로그아웃 되었습니다.");
    location.href="../index.php";
  </script>



