<!-- community_read.php -->
<?php
// 세션 실행
session_start();

$s_id = isset($_SESSION["s_id"])? $_SESSION["s_id"]:"";
$s_name = isset($_SESSION["s_name"])? $_SESSION["s_name"]:"";

include "../inc/dbcon.php";

$bno = $_GET['idx'];

// 조회 수 올리기 
$hit = mysqli_fetch_array(mq("select * from board where idx ='$bno';"));
$hit = $hit['hit'] + 1;
$fet = mq("update board set hit = '$hit' where idx = '$bno';");

/* 받아온 idx값을 선택 */
$sql = mq("select * from board where idx='$bno';"); 
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


  <!-- CSS -->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/board_css/community_read.css">
  <!-- <link rel="stylesheet" href="../css/jquery-ui.css"> -->

  <!-- jQuery -->
  <!-- <script src="../js/jquery-ui.js"></script> -->
  <!-- <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->
  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/common.js" defer></script>

  <!-- aos -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


</head>

<body>
  <div class="wrap">

  <?php include "../header.php"; ?>

    <section class="main_section">
      <div class="main_img">
        <h2 class="blind">COMMUNITY</h2>
        <p class="blind">애플짐은 다양한 소식을 전해드립니다.</p>
        <img src="../images/community_main.png" alt="">


        <!-- aside -->
        <aside class="aside">
          <ul>
            <li><a class="aside_menu" href="notice.php">NOTICE</a></li>
            <li><a class="aside_menu" href="event.php">EVENT</a></li>
            <li><a class="on_menu" href="community.php">COMMUNITY</a></li>
          </ul>
        </aside>
      </div>
    </section><!-- main_section -->

    <section class="community_read_section">

      <div class="community_read">

        <div class="community_tit">
          <h2><?php echo $board['title']; ?></h2>
          <ul class="cfixed">
            <li>작성자 : <span><?php echo $board['auth_nm']; ?></span></li>
            <li>작성일 : <span><?php  echo $board['wr_date']; ?></span></li>
            <li>조회수 : <span><?php echo $board['hit']; ?></span></li>
          </ul>
        </div>

        <div class="community_desc">
          <!-- <img src="../images/notice_post.png" alt="사회적 거리두기 운영 변경사항"> -->

          <?php if ($board['b_file']) { ?>
          <p class="upload_file"> 
            <span>
              첨부파일 : <a href="upload/<?php echo $board['b_file'];?>" download><?php echo $board['b_file']; ?></a>
            </span>
            <span>
              
              <img src="upload/<?php echo $board['b_file']; ?>" alt="file">
              
            </span>  
          </p>

          <?php } else {}; ?>

          <p class="community_con">
            <?php echo nl2br("$board[content]"); ?>
          </p>


        </div>


        <button type="button" class="list_btn" onclick="location.href='community.php'">목록</button>

        <?php if ($s_id == $board['mem_id']) { ?>

        <button type="button" class="edit_btn" onclick="location.href='community_edit.php?idx=<?php echo $board['idx']; ?>'">수정</button>
        <button type="button" class="del_btn" onclick="del_post(<?php echo $board['idx']; ?>)">삭제</button>

        <?php } else {} ?>

      </div><!-- community_read -->
    </section><!-- community_post_section -->





    <!-- 게시글 삭제 모달창 -->
    <!-- <section id="community_del_modal">
      <div class="del_modal_body">
        <h3>게시글 삭제하기</h3>

        <form action="community_del_ok.php?idx=<?php echo $bno; ?>" method="post" onsubmit="return form_check()">
          <fieldset>
            <legend class="blind">게시글 삭제하기</legend>

            <input type="hidden" name="bno" value="<?php echo $bno; ?>">

            <label for="pwd" class="blind"></label>
            <input type="password" name="pwd" id="pwd" placeholder="비밀번호" />

            <button type="submit" class="del_btn">삭제하기</button>
            <button type="button" class="close_btn">닫기</button>
          </fieldset>
        </form>

      </div>
    </section> -->
    <!-- community_del_modal -->



    <!-- 댓글 -->
    <section class="cmnt_section">
      <!-- 댓글 입력 폼 -->
      <div class="cm_input">
        <form action="community_reply_ok.php?idx=<?php echo $bno; ?>" method="post" class="cm_input cfixed">

        <input type="hidden" name="mem_id" id="mem_id" value="<?php $s_id ?>"/>


        <?php if (!$s_id) { ?>

          <label for="cmnt">댓글 작성</label>
          <textarea name="cmnt" id="cmnt" placeholder="로그인 후 이용해 주세요."></textarea>
          

        <?php } else {; ?>

          <label for="cmnt">댓글 작성</label>
          <textarea name="cmnt" id="cmnt" placeholder="댓글을 입력하세요."></textarea>
        
        <?php }; ?>

        <button type="submit" class="rep_btn">댓글</button>

        </form>
      </div><!-- cm_input -->


      <!-- 댓글 목록 불러오기 -->
    <?php 
    $query = "select * from reply where con_num='$bno' order by idx desc;";
    $result = mysqli_query($dbcon, $query);
    while ( $reply = mysqli_fetch_array($result)) {
    ?>

      <div class="reply_log">
        <div class="cmnt_table">
          <table>
            <tr>
              <td>
                <span class="cm_user"><?php echo $reply['cm_user'];?></span>
                <span class="cm_date"><?php echo $reply['cm_date']; ?></span>
              </td>
              <td class="cmnt_td"><?php echo nl2br("$reply[cmnt]"); ?></td>

              <?php 
              if ($reply['cm_user'] == $s_id) {

              ?>
              <td class="cm_btns">
                <div class="cm_user_btns">
                  <button type="button" class="cm_edit_btn">수정</button>
                  <button type="button" class="cm_del_btn">삭제</button>
                </div>
              </td>

              <?php };?>
            </tr>
          </table>
        </div><!-- cm_table -->

        <!-- 댓글 수정 폼 -->
        <div id="cm_edit_modal">
          <div class="edit_modal_body">
            <h3>댓글 수정하기</h3>

            <form action="community_reply_edit_ok.php" method="post">
              <fieldset>
                <legend class="blind">댓글 수정하기</legend>

              <input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" />
              <input type="hidden" name="bno" value="<?php echo $bno; ?>">

              <!-- <label for="cm_pwd" class="blind"></label>
              <input type="password" name="cm_pwd" id="cm_pwd" placeholder="비밀번호" /> -->

              <label for="cmnt"></label>
              <textarea name="cmnt" id="cmnt">
                <?php echo nl2br("$reply[cmnt]"); ?>
              </textarea>

              <button type="submit" class="edit_btn">수정하기</button>
              <button type="button" class="close_btn">닫기</button>
              </fieldset>
            </form>
          </div><!-- edit_modal_body -->
        </div><!-- cm_edit_modal -->
      

        <!-- 댓글 삭제하기 폼 -->
        <div id="cm_del_modal">
          <div class="del_modal_body">
            <h3>정말 삭제하시겠습니까?</h3>

            <form action="community_reply_del_ok.php" method="post">
              <fieldset>
                <legend class="blind">댓글 삭제하기</legend>

                <input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" />
                <input type="hidden" name="bno" value="<?php echo $bno; ?>">

                <!-- <label for="cm_pwd" class="blind"></label>
                <input type="password" name="cm_pwd" id="cm_pwd" placeholder="비밀번호" /> -->

                <button type="submit" class="del_btn">삭제하기</button>
                <button type="button" class="close_btn">닫기</button>
              </fieldset>
            </form>

          </div>
        </div>

      </div><!-- reply_log -->
      <?php }; ?>
    </section><!-- cmnt_section -->

    <?php include "../footer.php"; ?>

  </div><!-- wrap -->

  <script type="text/javascript">
    AOS.init({disable: 'mobile'});


    // 게시글 삭제 
    function del_post(idx) {
      var ck = confirm("정말 삭제하시겠습니까?");
      if (ck == true) {
        location.href = "community_del_ok.php?idx="+idx;
      };
    };

    // 게시글 삭제 모달창
    // $(function(){
    //   $('.del_btn').click(function() {
    //     $('#community_del_modal').addClass('active');
    //   })
    //   $(".close_btn").click(function() {
    //     $(this).closest('#community_del_modal').removeClass('active')
    //   });
    // });


    // 게시글 삭제 비번 (필수) 확인
    // function form_check( /* 3 */ frm) {

    //   var pwd = document.getElementById("pwd");

    //   // 비밀번호(필수) 미입력시
    //   if (!pwd.value) {
    //     alert("비밀번호를 입력하세요.");
    //     pwd.focus();
    //     return false;
    //   };

    //   // 비밀번호 공백없이
    //   if (/[\s]/.test(pwd.value) == true) {
    //     alert("비밀번호는 공백없이 입력해주세요.");
    //     pwd.focus();
    //     return false;
    //   };

    //   // 비밀번호 길이 정하기 * 8자리 *
    //   if (pwd.length < 8) {
    //     alert("비밀번호는 8자리로 입력해주세요.");
    //     pwd.focus();
    //     return false;
    //   };

    //   frm.submit();
    // };

    // 댓글 수정하기 모달창
    $(function(){
      $(".cm_edit_btn").click(function() {
        $(this).closest(".reply_log").children("#cm_edit_modal").addClass('active');
      })
      $(".close_btn").click(function() {
        $(this).closest("#cm_edit_modal").removeClass('active')
      });
    });

    // 댓글 삭제하기 모달창
    $(function(){
      $(".cm_del_btn").click(function() {
        $(this).closest(".reply_log").children("#cm_del_modal").addClass('active');
      })
      $(".close_btn").click(function() {
        $(this).closest("#cm_del_modal").removeClass('active')
      });
    });
  </script>

</body>
</html>