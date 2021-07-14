<?php

// 세션 연결
// session_start();
// $s_idx = isset($_SESSION["s_idx"])? $_SESSION["s_idx"]:"";


// get 방식으로 값 받아오기
// $idx = $_GET["idx"];
$g_idx = $_GET["g_idx"];

// db 연결
include "../inc/dbcon.php";

// 쿼리작성
$sql = "delete from members where idx=$g_idx;";

// 쿼리전송
mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));

// 세션삭제 안남기고 모두 삭제
unset($_SESSION["s_idx"]);
unset($_SESSION["s_name"]);
unset($_SESSION["s_id"]);

// db 종료
mysqli_close($dbcon);

// 페이지 이동
echo "

  <script type=\"text/javascript\">
    alert(\"처리되었습니다.\");
    location.href=\"members_list.php\";
  </script>

"
?>