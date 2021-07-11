<?php 

session_start();
$s_id = isset($_SESSION["s_id"])? $_SESSION["s_id"]:"";

// 관리자인 경우에만 접속 가능 (도메인을 알고 들어올수 있으므로 제한 걸어두기)
if($s_id != "admin") {
  
  echo "
  <script type=\"text/javascript\">
    alert(\"관리자 권한이 필요합니다.\")
    location.href=\"../index.php\";
  </script>
  ";

};


?>
