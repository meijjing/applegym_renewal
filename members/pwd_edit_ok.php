<?php

include "../inc/dbcon.php";

$idx = $_POST['idx'];

$mem_pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

$sql = mq("update members set mem_pwd = '$mem_pwd' where idx = '$idx';");

mysqli_close($dbcon);

?>

  <script type="text/javascript">
  alert('비밀번호를 변경했습니다.');
  location.href='login.php';
  </script>";

