<?php

// 세션 연결
// session_start();
// $s_idx = isset($_SESSION["s_idx"])? $_SESSION["s_idx"]:"";


$idx = $_GET["idx"];

// db 연결
include "../inc/dbcon.php";

// 쿼리작성
$sql = "delete from event_board where idx=$idx;";

// 쿼리전송
mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));

// db 종료
mysqli_close($dbcon);


// 페이지 이동
echo "
    <script type=\"text/javascript\">
        alert(\"처리되었습니다.\");
        location.href=\"event.php\";
    </script>
";


?>