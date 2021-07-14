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
    $folder = "event_upload/".$filename;
    move_uploaded_file($tmpfile, $folder);

    // 글의 pwd를 가져온다.
    $query = "SELECT * FROM event_board WHERE idx=$bno;";
    $result = mysqli_query($dbcon, $query);
    $board = mysqli_fetch_array($result);

    if (password_verify($_POST['pwd'], $board['pwd'])) {

        $sql = mq("update event_board set auth_nm='$auth_nm', pwd='$pwd', email='$email', title='$title', content='$content', b_file='$o_name' where idx='$bno';");

?>
        <script>
          alert('수정이 완료되었습니다.');
          location.href="event_read.php?idx=<?php echo $bno; ?>"
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
        exit;// exit 안쓰면 아래의 코드가 실행 됨.
    }
?>

