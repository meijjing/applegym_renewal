<?php
include "../inc/dbcon.php";

$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
$sql = mq("select * from board where idx='$bno'"); /* 받아온 idx값을 선택 */
$board = $sql->fetch_array();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no, 
  maximum-scale=1.0, minimum-scale=1.0">
  <title>애플짐 피트니스</title>

  <!-- favicon -->
  <link rel="shortcut icon" href="../images/favicon.ico">
  <link rel="icon" href="../images/favicon.ico">
  <link rel="apple-touch-icon" href="../images/favicon.ico">

  <script src="../js/jquery-3.6.0.min.js"></script>
<style>
  .blind {
    position: absolute;
    width: 0;
    height: 0;
    line-height: 0;
    text-indent: -9999px;
    overflow: hidden;
  }

  /* 비밀번호 모달 창 */
  #ck_read_modal {
    position: fixed;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    background: rgba(0, 0, 0, .5);
    z-index: 1;
    /* display: none; */
  }

  #ck_read_modal.active {
    display: block;
  }

  #ck_read_modal .ck_read_modal_body {
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
    padding: 30px 20px;
    box-sizing: border-box;
    background: #fff;
    border-top: 6px solid #eee;
    border-bottom: 6px solid #eee;

    text-align: center;
    position: relative;
    top: 30%;
  }

  .ck_read_modal_body h3 {
    width: 100%;
    line-height: 40px;
    border-bottom: 1px solid #000;
    margin: 0px auto;
    margin-bottom: 20px;
  }

  .ck_read_modal_body form {
    width: 80%;
    margin: 0 auto;
  }

  .ck_read_modal_body fieldset {
    border: none;
  }

  .ck_read_modal_body #pwd_chk {
    display: block;
    width: 60%;
    height: 30px;
    line-height: 30px;
    font-size: 0.75rem;
    float: left;
    outline: 0;
    border: 1px solid #585859;
    border-radius: 3px;
    padding-left: 10px;
    box-sizing: border-box;
  }

  .ck_read_modal_body .del_btn {
    display: block;
    width: 36%;
    height: 30px;
    line-height: 30px;
    font-size: 0.75rem;
    float: right;
    border: 0;
    border-radius: 3px;
    color: #fff;
    background: #000;
    cursor: pointer;
  }

  .ck_read_modal_body .del_btn:hover {
    background: #3c3c3c;
  }
  .ck_read_modal_body .del_btn:active {
    opacity: .7;
  }

  .ck_read_modal_body .close_btn {
    width: 20px;
    height: 20px;
    background: url('../images/main/close.png') no-repeat center;
    background-size: 20px;
    text-indent: -9999px;
    border: none;
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
  }

  .ck_read_modal_body .close_btn:hover {
    background: url('../images/main/close-p.png') no-repeat center;
    background-size: 20px;
  }
</style>
</head>

<body>
  <!-- <div id='wr_pwd_section'>
    <form action="" method="post">
      <p>비밀번호
        <input type="password" name="pwd_chk" />
        <input type="submit" value="확인" />
      </p>
    </form>
  </div> -->

  <div id="ck_read_modal">
    <div class="ck_read_modal_body">
      <h3>비밀글 열람하기</h3>

      <form action="" method="post" onsubmit="form_check()">
        <fieldset>
          <legend class="blind">비밀글 열람하기</legend>

          <input type="hidden" name="bno" value="<?php echo $board['idx']; ?>">

          <label for="pwd_chk" class="blind"></label>
          <input type="password" name="pwd_chk" id="pwd_chk" placeholder="비밀번호" />

          <button type="submit" class="del_btn">열람하기</button>
          <button type="button" class="close_btn" onclick="history.back()">닫기</button>

          <!-- <input type="button" value="GET" onclick="AjaxCall('GET');" /> <input type="button" value="POST" onclick="AjaxCall('POST');" /> -->
        </fieldset>
      </form>
    </div><!-- ck_read_modal_body -->
  </div><!-- ck_read_modal -->

  <!-- <div id='wr_pwd_section'>
    <form action="" method="post">
      <p>비밀번호
        <input type="password" name="pwd_chk" />
        <input type="submit" value="확인" />
      </p>
    </form>
  </div> -->

  <script type="text/javascript">
    function form_check(frm) {
      var pwd = $('#pwd_chk');

      if (!pwd) {
        alert ("비밀번호를 입력해주세요.");
        history.back();
        return false;
      }
    frm.submit();
    };
  </script>


  <?php
	$bpwd = $board['pwd'];

  if(isset($_POST['pwd_chk'])) {//만약 pwd_chk POST값이 있다면
    $pwd_ck = $_POST['pwd_chk']; // $pwk변수에 POST값으로 받은 pwd_chk를 넣습니다.

    // if(password_verify($pwk,$bpw)) {//다시 if문으로 DB의 pwd와 입력하여 받아온 pwk와 값이 같은지 비교를 하고    
    //   $pwk == $bpw;

    if(password_verify($pwd_ck, $bpwd)) {
    ?>

    <script type="text/javascript">
      location.replace("community_read.php?idx=<?php echo $board["idx"]; ?>");
    </script><!-- pwk와 bpw값이 같으면 read.php로 보내고 -->


  <?php 
			} else { ?>
    <script type="text/javascript">
      alert('비밀번호를 확인해주세요.');
      history.back();
    </script>
  <!--- 아니면 비밀번호가 틀리다는 메시지를 보여줍니다 -->
  <?php } }; ?>

</body>
</html>