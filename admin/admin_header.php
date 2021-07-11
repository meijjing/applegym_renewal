<header>
  <div class="header">
    <h1><a href="admin.php">관리자 페이지</a></h1>
    <a href="#" class="menu_toggle_btn" onclick="openNav()"></a>

    <nav class="nav">
      <ul id="gnb" class="gnb">
        <li class="mem_list"><a href="members_list.php">회원 관리</a></li>
        <li class="notice_list"><a href="notice_list.php">공지사항게시판</a></li>
        <li class="event_list"><a href="event_list.php">이벤트게시판</a></li>
        <li class="commu_list"><a href="community_list.php">커뮤니티게시판</a></li>
      </ul>

      <ul class="user_btn">
        <li class="home_btn"><a href="../index.php">홈으로</a></li>
        <li class="logout_btn"><a href="#" onclick="log_out()">로그아웃</a></li>
      </ul>

    </nav>

  </div><!-- header -->
</header>

<script type="text/javascript">
  function log_out() {
  var ck = confirm("로그아웃 하시겠습니까?");
  if (ck == true) {
    location.href = "../members/logout.php";
  };
}
</script>