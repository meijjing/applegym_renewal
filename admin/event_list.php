<!-- event_list.php -->
<?php

// 세션 시작
include "admin_check.php";

// db 연결
include "../inc/dbcon.php";

// 선택한 사용자 정보
// $g_idx = $_GET["g_idx"];

// 쿼리 작성
$sql = "select * from event_board;";

// 쿼리 전송
$result = mysqli_query($dbcon, $sql);
$board = mysqli_fetch_array($result);


/// paging : 전체 데이터 개수
$num = mysqli_num_rows($result);

/// paging : 한 페이지 당 글 개수
$list_num = 5;

/// paging : 한 블럭 당 페이지 수
$page_num = 3;

/// paging : 현재 페이지
$page = isset($_GET["page"])? $_GET["page"] : 1;

/// paging : 전체 페이지 수 = 전체데이터 / 페이지당 데이터 개수, ceil : 올림값, floor : 내림값, round : 반올림
$total_page = ceil($num / $list_num);
// echo "전체 페이지수 : ".$total_page;

/// paging : 총 블럭 수 = 전체 페이지 수 / 블럭 당 페이지 수
$total_block = ceil($total_page / $page_num);

/// paging : 현재 블럭 번호 = 현재 페이지 번호 / 블럭 당 페이지 수
$now_block = ceil($page / $page_num);

/// paging : 블럭 당 시작 페이지 번호 = (해당 글의 블럭번호 - 1) * 블럭 당 페이지 수 + 1;
$s_pageNum = ($now_block-1) * ($page_num + 1);
if($s_pageNum <= 0) { // 데이터가 0개인 경우
  $s_pageNum = 1;
};

/// paging : 블럭 당 마지막 페이지 번호 = 현재 블럭 번호 * 블럭 당 페이지 수
$e_pageNum = $now_block * $page_num;
if($e_pageNum > $total_page) { //마지막 번호가 전체 페이지 수를 넘지 않도록
  $e_pageNum = $total_page;
};

?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no, 
  maximum-scale=1.0, minimum-scale=1.0">
  <title>관리자 페이지</title>

  <!-- favicon -->
  <link rel="shortcut icon" href="../images/favicon.ico">
  <link rel="icon" href="../images/favicon.ico">
  <link rel="apple-touch-icon" href="../images/favicon.ico">

  <link href="../css/reset.css" rel="stylesheet">
  <link href="../css/admin_css/admin_header.css" rel="stylesheet">
  <link href="../css/admin_css/event_list.css" rel="stylesheet">


  <!-- jQuery -->
  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/admin_common.js" defer></script>

  <style>
    .event_list {
      background: #fff;
    }
    .event_list a {
      color: #000!important;
    }
  </style>


</head>

<body>

  <div class="wrap">

  <?php include "admin_header.php"; ?>

    <section class="list_section">

      <h2 class="cfixed">공지사항 게시물 관리</h2>
      <h3 class="cfixed">게시글 수 : <?php echo $num; ?></h3>

      <table class="event_list_table">
        <thead>
          <tr class="table_tit">
            <th class="no">NO</th>
            <th class="title">제목</th>
            <th class="content">내용</th>
            <th class="b_file">파일</th>
            <th class="auth_nm">작성자</th>
            <th class="wr_date">작성일</th>
            <th class="hit">조회수</th>
            <th class="lock_post">비밀글</th>
            <th class="pwd">비밀번호</th>
            <th class="ip">IP</th>
            <th class="edit">수정</th>
            <th class="delete">삭제</th>
          </tr>
        </thead>


        <?php

    /// paging : 시작 번호 = (현재 페이지 번호 - 1) * 페이지 당 보여질 데이터 수 (idx 와 글번호는 다를 수 있으니까)
    $start = ($page - 1) * $list_num;

    /// paging : 쿼리 작성
    $sql = "select * from event_board order by idx desc limit $start, $list_num;";
    // $sql = "select * from members limit $start, $list_num;"; -> 오름차순 내림차순


    /// paging : 쿼리 전송
    $result = mysqli_query($dbcon, $sql);


    /// paging : 글 번호
    $cnt = $start + 1;



    // 회원정보 가져오기 (반복)
    while ( $board = mysqli_fetch_array($result) ) {

    ?>

        <tbody>
          <tr>
            <td class="no"><?php echo $cnt; ?></td>

            <td class="title">
              <a href="../board/event_read.php?idx=<?php echo $board['idx']; ?>">
                <?php echo $board["title"]; ?>
              </a>
            </td>

            <td class="content"><?php echo $board["content"]; ?></td>
            <td class="b_file"><?php echo $board["b_file"]; ?></td>
            <td class="auth_nm"><?php echo $board["auth_nm"]; ?></td>
            <td class="wr_date"><?php echo $board["wr_date"]; ?></td>
            <td class="hit"><?php echo $board["hit"]; ?></td>
            <td class="lock_post"><?php echo $board["lock_post"]; ?></td>
            <td class="pwd"><?php echo $board["pwd"]; ?></td>
            <td class="ip"><?php echo $board["ip"]; ?></td>

            <td class="edit edit_btn"><a href="../board/event_edit.php?idx=<?php echo $board["idx"]; ?>">수정</a></td>
            <td class="delete del_btn"><a href="#" onclick="del_chk(<?php echo $board["idx"]; ?>)">삭제</a></td>
          </tr>
        </tbody>

        <?php
        $cnt = $cnt + 1;
        }; 
        ?>
      </table>


      <div class="wr_btn">
        <button type="button" onclick="location.href='../board/event_write.php';">게시물 쓰기</button>
      </div>


      <div class="pager">

      <?php
      /// paging : 이전 페이지 
      if($page <= 1) { 
      ?>
        <a class="list_prev_btn" href="#">이전</a>

      <?php } else { ?>
        <a class="list_prev_btn" href="event_list.php?page=<?php echo ($page-1); ?>">이전</a>
      <?php }; ?>


      <?php
      /// paging : 페이지 번호 출력
      // for(초기값; 최종갑; 증감량)
      for($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++) {
?>

        <a class="num_btn" href="event_list.php?page=<?php echo $print_page; ?>"><?php echo $print_page; ?></a>

        <?php }; ?>



        <?php
        /// paging : 다음 페이지 
        if($page >= $total_page) { 
        ?>
          <a class="list_next_btn" href="event_list.php?page=<?php echo $total_page; ?>">다음</a>

        <?php } else { ?>
          <a class="list_next_btn" href="event_list.php?page=<?php echo ($page + 1); ?>">다음</a>

        <?php }; ?>

      </div><!-- pager -->
    </section>

    <footer class="footer">

    </footer>

  </div><!-- wrap -->



  <script type="text/javascript">
   // 삭제하기 버튼 클릭시 
    function del_chk(idx) {
      var ck = confirm("정말 삭제하시겠습니까?");
      if (ck == true) {
        location.href = "event_del_admin.php?idx=" +idx;
      };
    };


  </script>




</body>

</html>