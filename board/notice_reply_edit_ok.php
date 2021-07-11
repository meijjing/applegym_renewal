<?php

include "../inc/dbcon.php";

$rno = $_POST['rno'];//댓글번호
$bno = $_POST['bno']; //게시글 번호
$cmnt = $_POST['cmnt'];



//reply테이블에서 idx가 rno변수에 저장된 값을 찾음
$sql = mq("select * from notice_reply where idx='$rno';"); 
$reply = $sql->fetch_array();



//board테이블에서 idx가 bno변수에 저장된 값을 찾음
$sql2 = mq("select * from notice_board where idx='$bno';");
$board = $sql2->fetch_array();


//reply테이블의 idx가 rno변수에 저장된 값의 content를 선택해서 값 저장
$sql3 = mq("update notice_reply set cmnt = '$cmnt' where idx = '$rno';");

?> 

<script type="text/javascript">
  // alert('수정되었습니다.'); 
  location.replace("notice_read.php?idx=<?php echo $bno; ?>");
</script>
