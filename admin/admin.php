<?php 

include "admin_check.php";

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
  <link href="../css/admin_css/admin.css" rel="stylesheet">


  <!-- jQuery -->
  <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/admin_common.js" defer></script>


</head>

<body>
  <div class="wrap">


    <?php include "admin_header.php" ?>


    <section class="admin_section">
      <h2> 관리자 페이지 입니다.</h2>
      

    </section>

    <footer class="footer">

    </footer>

  </div><!-- wrap -->


  <script type="text/javascript">
    jQuery(document).ready(function () {

      $('.gnb>li').mouseover(function () {

        var submenu = $('.submenu');

        if (submenu.is(':visible')) {
          submenu.slideUp();
        } else {
          submenu.slideDown();
        }
      });
    });
  </script>
</body>

</html>