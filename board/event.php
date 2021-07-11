<!-- event.php -->
<?php

// 세션 실행
session_start();

$s_id = isset($_SESSION["s_id"])? $_SESSION["s_id"]:"";
$s_name = isset($_SESSION["s_name"])? $_SESSION["s_name"]:"";



include "../inc/dbcon.php";

// 데이터베이스에서 페이지의 첫번째 글($no)부터
// $page_size 만큼의 글을 가져온다.
$query = "SELECT * FROM event_board";
// ORDER BY idx DESC LIMIT $no, $page_size";
$result = mysqli_query($dbcon, $query);

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
  <title>애플짐 피트니스</title>

  <!-- favicon -->
  <link rel="shortcut icon" href="../images/favicon.ico">
  <link rel="icon" href="../images/favicon.ico">
  <link rel="apple-touch-icon" href="../images/favicon.ico">


  <!-- CSS -->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/board_css/event.css">

  <!-- jQuery -->
  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/common.js" defer></script>

  <!-- aos -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


</head>

<body>
  <div class="wrap">

  <!-- 헤더 영역 -->
  <?php include "../header.php"; ?>



    <section class="main_section">
      <div class="main_img">
        <h2 class="blind">EVENT</h2>
        <p class="blind">애플짐은 다양한 소식을 전해드립니다.</p>
        <img src="../images/event_main.png" alt="">


        <!-- aside -->
        <aside class="aside">
          <ul>
            <li><a class="aside_menu" href="notice.php">NOTICE</a></li>
            <li><a class="on_menu" href="event.php">EVENT</a></li>
            <li><a class="aside_menu" href="community.php">COMMUNITY</a></li>
          </ul>
        </aside>
      </div>
    </section><!-- main_section -->


    <!-- contents -->
    <section class="contents">

      <section class="event_section">
        <h2>EVENT</h2>
        <p>애플짐 전 지점의 이벤트를 만나보세요.</p>


        <form class="search_box cfixed" action="event_search_result.php" method="get">
          <fieldset>
            <legend class="blind">이벤트 검색</legend>
            <label for="search" class="blind">검색</label>
            <input type="search" name="search" id="search" class="search" autocomplete="off" autocapitalize="off">

            <button type="submit">검색</button>
          </fieldset>
        </form><!-- search_box_section -->

        <div class="event_table">

          <!-- 글목록 가져오기 -->
          <?php

          /// paging : 시작 번호 = (현재 페이지 번호 - 1) * 페이지 당 보여질 데이터 수 (idx 와 글번호는 다를 수 있으니까)
          $start = ($page - 1) * $list_num;

          /// paging : 쿼리 작성
          $sql = "select * from event_board order by idx desc limit $start, $list_num;";

          /// paging : 쿼리 전송
          $result = mysqli_query($dbcon, $sql);

          /// paging : 글 번호
          $cnt = $num - ( $list_num * ($page - 1));

          // 회원정보 가져오기 (반복)
          while ( $board = mysqli_fetch_array($result) ) {

            //댓글 수 카운트
            //reply테이블에서 con_num이 board의 idx와 같은 것을 선택
            $sql2 = mq("select * from event_reply where con_num='$board[idx]';"); 
            //num_rows로 정수형태로 출력
            $rep_count = mysqli_num_rows($sql2); 

          ?>

          <div class="event_box cfixed">

            <div class="img_box">
              <a href="event_read.php?idx=<?php echo $board['idx']; ?>"><img src="event_upload/<?php echo $board['b_file']; ?>" alt="이벤트"></a>
            </div>


            <div class="desc_box cfixed">

              <!-- 새글 이미지 -->
              <?php
                //$boardtime변수에 board['date']값을 넣음
                $boardtime = $board['wr_date']; 
                //$timenow변수에 현재 시간 Y-M-D를 넣음
                $timenow = date("Y-m-d"); 

                  if($boardtime == $timenow) {
                    $img = "<img class=\"new_img\" src=\"../images/new.png\" alt=\"new\" title=\"new\" style=\"width: 46px\"/>";
                  
                  } else {
                    $img = "";
                }; ?>

              <div class="tit_box">
                <a href="event_read.php?idx=<?php echo $board['idx']; ?>"><?php echo $board['title'];?>

                  <!-- 댓글 수 표시 -->
                  <span class="re_ct">[<?php echo $rep_count; ?>]
                  <!-- 이미지 표시 -->
                  <?php echo "$img"; ?>
                  </span>
                </a>
              </div>

              <div class="date_box"><?php echo $board['wr_date']; ?></div>

              <div class="view_box"><?php echo $board['hit']; ?></div>

            </div><!-- desc_box -->

          </div><!-- event_box -->
          <?php 
          $cnt = $cnt - 1;
          }; ?>
          
        </div><!-- event_table -->

        <?php if($s_id == "admin") { ?>

        <button type="button" class="wr_btn" onclick="location.href='event_write.php'">글쓰기</button>

        <?php } else {  }; ?>

      </section><!-- event_section -->


      <div class="pager">
        <?php
        /// paging : 이전 페이지 
        if($page <= 1) { ?>
          <a class="list_prev_btn" href="#">이전</a>

        <?php } else { ?>
          <a class="list_prev_btn" href="event.php?page=<?php echo ($page-1); ?>">이전</a>
        
        <?php }; 

        /// paging : 페이지 번호 출력
        // for(초기값; 최종갑; 증감량)
        for($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++) {
        ?>

          <a class="num_btn" href="event.php?page=<?php echo $print_page; ?>"><?php echo $print_page; ?></a>

          <?php }; ?>



          <?php
          /// paging : 다음 페이지 
          if($page >= $total_page) { 
          ?>
            <!-- <a class="list_next_btn" href="notice.php?page= -->
            <?php //echo $total_page; ?>
            <!-- ">다음</a> -->
            <a class="list_next_btn" href="#">다음</a>


          <?php } else { ?>

            <a class="list_next_btn" href="event.php?page=<?php echo ($page + 1); ?>">다음</a>

          <?php }; ?>

      </div><!-- pager -->

    </section><!-- contents -->


    <?php include "../footer.php" ?>



  </div><!-- wrap -->

  <script type="text/javascript">
    AOS.init({disable: 'mobile'});
  </script>

</body>

</html>