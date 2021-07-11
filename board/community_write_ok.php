<?php

session_start();

$s_id = isset($_SESSION["s_id"])? $_SESSION["s_id"]:"";

include "../inc/dbcon.php";

// $idx = $_GET['idx'];
$auth_nm = $_POST['auth_nm'];
$email = $_POST['email'];
$pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

$title = $_POST['title'];
$content = $_POST['content'];
$wr_date = date('Y-m-d');

$REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];

if(isset($_POST['lock'])) {
  $lock_post = 'Y';
} else {
  $lock_post = 'N';
};


// 파일 업로드
$today_time = strtotime(date('Ymdhis'));
$tmpfile =  $_FILES['file']['tmp_name'];

// $o_name = $today_time."_".$_FILES['file']['name'];
$o_name = $_FILES['file']['name'];

// iconv([입력 캐릭터셋], [변환하고자하는 캐릭터셋], [문자열]);
// ANSI, UTF-8(유니코드), EUC-KR(한글)
$filename = iconv("UTF-8", "EUC-KR", $_FILES['file']['name']);

// 저장 파일명
$folder = "upload/".$filename;
move_uploaded_file($tmpfile, $folder);



if ($auth_nm && $title && $content) {

  $query = mq("INSERT INTO board (auth_nm, mem_id, email, pwd, title, content, b_file, wr_date, hit, lock_post, ip) VALUES ('$auth_nm', '$s_id', '$eamil', '$pwd', '$title', '$content', '$o_name', now(), 0, '$lock_post', '$REMOTE_ADDR');");

  //데이터베이스와의 연결 종료
  mysqli_close($dbcon);

  echo "<script>
    alert('글쓰기가 완료되었습니다.');
    history.go(-2);
  </script>";


} else {
  echo "<script>
      alert('글쓰기에 실패했습니다.');
      history.back();
    </script>";
}


?>
