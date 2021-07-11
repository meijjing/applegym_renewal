<?php

session_start();

$s_id = isset($_SESSION["s_id"])? $_SESSION["s_id"]:"";
$s_name = isset($_SESSION["s_name"])? $_SESSION["s_name"]:"";

include "../inc/dbcon.php";

  $bno = $_GET['idx'];
  // $cm_user = $s_id;
  // $cm_pwd = $s_pwd;
  // $cm_pwd = password_hash($_POST['cm_pwd'], PASSWORD_DEFAULT);

  $cmnt = $_POST['cmnt'];

  // if($bno && $cm_user && $cm_pwd && $cmnt) {
  if($bno && $cmnt) {

      $sql = "INSERT INTO reply (con_num, cm_user, cmnt) VALUES (\"$bno\", \"$s_id\", \"$cmnt\");";
      $result = mysqli_query($dbcon, $sql);

      //데이터베이스와의 연결 종료
      mysqli_close($dbcon);

      echo "
        <script>
          // alert('댓글이 작성되었습니다.'); 
          location.href=\"community_read.php?idx=$bno\";
        </script>";

  } else {
      echo "
        <script>
          alert('댓글 작성에 실패했습니다.'); 
          history.back();
        </script>";
  }
	
?>