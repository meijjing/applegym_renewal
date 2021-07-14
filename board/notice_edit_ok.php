<?php
    // db 연결
    include "../inc/dbcon.php";

    $bno = $_GET['idx'];
    $auth_nm = $_POST['auth_nm'];
    $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    // 파일 업로드
    $tmpfile =  $_FILES['file']['tmp_name'];
    $o_name = $_FILES['file']['name'];

    // iconv([입력 캐릭터셋], [변환하고자하는 캐릭터셋], [문자열]);
    // ANSI, UTF-8(유니코드), EUC-KR(한글)
    $filename = iconv("UTF-8", "EUC-KR", $_FILES['file']['name']);
    $folder = "notice_upload/".$filename;
    move_uploaded_file($tmpfile, $folder);

    // 글의 pwd를 가져온다.
    $query = "SELECT * FROM notice_board WHERE idx=$bno;";
    $result = mysqli_query($dbcon, $query);
    $board = mysqli_fetch_array($result);

    // 입력된 값과 비교한다.
    // if ($_POST['pwd'] == $board['pwd']) { //비밀번호가 일치하는 경우
    if (password_verify($_POST['pwd'], $board['pwd'])) {

        $sql = mq("update notice_board set auth_nm='$auth_nm', pwd='$pwd', email='$email', title='$title', content='$content', b_file='$o_name' where idx='$bno';");

        // $query = "UPDATE notice_board SET auth_nm='$auth_nm', email='$email', title='$title', content='$content' WHERE idx=$bno";
        // $result=mysqli_query($dbcon, $query);
?>
        <script>
          alert('수정이 완료되었습니다.');
          location.href="notice_read.php?idx=<?php echo $bno; ?>"
        </script>

<?php
    }
    else { // 비밀번호가 일치하지 않는 경우
        echo ("
        <script>
          alert('비밀번호가 틀립니다.');
          history.back();
        </script>
        ");
        exit;//반드시 exit를 써줘야됨. 안그러면 아래의 코드가 실행이됨.
    }

    //데이터베이스와의 연결 종료
    // mysqli_close($dbcon);

    // 수정하기인 경우 수정된 글로..
    // echo ("<meta http-equiv='Refresh' content='1;
    // URL='../board/notice_read.php?idx=$bno'>");
?>

<!-- <center>
<font size=2>정상적으로 수정되었습니다.</font> -->

<!-- <script type="text/javascript">
  alert("수정되었습니다."); 
</script>
<meta http-equiv="refresh" content="../board/notice_read.php?idx=<?php echo $bno; ?>"> -->
