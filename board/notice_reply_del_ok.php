<?php
session_start();

$s_id = isset($_SESSION["s_id"])? $_SESSION["s_id"]:"";
$s_pwd = isset($_SESSION["s_pwd"])? $_SESSION["s_pwd"]:"";

include "../inc/dbcon.php";

// 모달창에서 비번쳐서 삭제하는 방법
$rno = $_POST['rno']; 
$bno = $_POST['bno'];

$pwd_ck = $_POST['cm_pwd'];
// $cm_pwd = $reply['cm_pwd'];

// if(password_verify($pwd_ck, $bpwd)) {
// if($pwd_ck == $s_pwd) {
  
	// $sql = mq("delete from notice_reply where idx='$rno';"); 

  echo "
    <script type=\"text/javascript\">
      // alert('댓글이 삭제되었습니다.'); 
      //location.replace(\"notice_read.php?idx=<?php echo $bno; ?>\");
    </script>";

	// } else { 
    echo "
      <script type=\"text/javascript\">
        // alert('비밀번호가 틀립니다');
        // history.back();
      </script>";
// }; 
  

// 확인메세지로 삭제하는 방법

$sql = mq("delete from notice_reply where idx=$rno;");

// mysqli_close($dbcon);
?>

  <script type="text/javascript">

    // alert ("삭제되었습니다.");
    // location.href="notice_read.php?idx=<?php echo $bno; ?>";
    history.back();

  </script>

  
