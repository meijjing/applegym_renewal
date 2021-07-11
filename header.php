<section class="info-section">
  <ul class="info-list">
    <li class="info-home"><a href="../index.php">HOME</a></li>
    <li class="info-calendar"><a href="../branch/branch_yeoksam.php#timetable">CALENDAR</a></li>
    <li class="info-user"><a href="../my/mypage.php">USER</a></li>

    <?php
        if(!$s_id){ // 로그인인 되지 않았다면
        ?>
    <li class="info-join"><a href="../members/join.php">JOIN</a></li>

    <?php
        } else { // 로그인이 되었다면
        ?>

    <li class="info-logout"><a href="#" onclick="log_out()">LOGOUT</a></li>

    <?php  
        };
        ?>
  </ul>
</section><!-- info-section -->

<!-- header -->
<header class="header">
  <h1 class="logo"><a href="../index.php">애플짐 피트니스</a></h1>

  <!-- menu -->
  <h2 class="blind">메인 메뉴</h2>
  <!-- <a href="#" class="menu-toggle-btn"></a> -->

  <nav class="nav">

    <ul class="gnb">
      <li><a href="#">브랜드</a>
        <ul class="submenu">
          <li><a href="../brand/brand_aboutus.php">ABOUT US</a></li>
          <li><a href="../brand/brand_history.php">HISTORY</a></li>
          <li><a href="../brand/brand_business.php">BUSINESS</a></li>
        </ul>
      </li>
      <li><a href="#">지점소개</a>
        <ul class="submenu">
          <li><a href="../branch/branch_yeoksam.php">역삼점</a></li>
          <li><a href="#">대치점</a></li>
          <li><a href="#">목동점</a></li>
        </ul>
      </li>
      <li><a href="#">프로그램</a>
        <ul class="submenu">
          <li><a href="../program/program.php#section1">FITNESS</a></li>
          <li><a href="../program/program.php#section2">PT</a></li>
          <li><a href="../program/program.php#section3">G.X</a></li>
          <li><a href="../program/program.php#section4">SPINNING</a></li>
          <li><a href="../program/program.php#section5">PILATES</a></li>
          <li><a href="../program/program.php#section6">반신욕,사우나</a></li>
        </ul>
      </li>
      <li><a href="#">소식</a>
        <ul class="submenu">
          <li><a href="../board/notice.php">NOTICE</a></li>
          <li><a href="../board/event.php">EVENT</a></li>
          <li><a href="../board/community.php">COMMUNITY</a></li>
        </ul>
      </li>
      <li><a href="#">마이페이지</a>
        <ul class="submenu">
          <li><a href="../my/mypage.php">회원권 조회</a></li>
          <li><a href="../my/membership.php">회원권 구매</a></li>
        </ul>
      </li>
    </ul>

  </nav>

  <!-- user menu -->
  <div class="user-menu">
    <h2 class="blind">사용자 메뉴</h2>

    <?php
      if(!$s_id){ // 로그인인 되지 않았다면
      ?>
    <ul class="no_login">
      <li class="login"><a href="../members/login.php">로그인</a></li>
      <li class="blind"><a href="../members/join.php">회원가입</a></li>
    </ul>

    <?php
      } else { // 로그인이 되었다면
    ?>
    <ul>
      <li class="welcome_mem">
        <span><?php echo $s_name; ?></span> 님, 안녕하세요.
      </li>

      <?php if($s_id == "admin") { ?>
      <li class="admin_pg"><a href="../admin/admin.php">관리자 페이지</a></li>
      <?php }; ?>


      <li class="edit"><a href="../members/edit.php">회원정보수정</a></li>
      <li class="user_menu_rb logout"><a href="#" onclick="log_out()">로그아웃</a></li>
    </ul>

    <?php  
        };
        ?>

  </div><!-- user_menu -->
</header>

<script type="text/javascript">
  function log_out() {
  var ck = confirm("로그아웃 하시겠습니까?");
  if (ck == true) {
    location.href = "../members/logout.php";

  };
}
</script>