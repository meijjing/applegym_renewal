<!-- find_pwd.php -->


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

  <link href="../css/reset.css" rel="stylesheet">

  <style>
    .blind {
      position: absolute;
      width: 0;
      height: 0;
      line-height: 0;
      text-indent: -9999px;
      overflow: hidden;
    }

    .cfixed:before,
    .container:before,
    .cfixed:after,
    .container:after {
      display: block;
      content: " ";
      line-height: 0;
      clear: both;
    }

    header {
      width: 100%;
      height: 50px;
      background-color: #000;
    }

    header .logo {
      width: 60px;
      height: 50px;
      background: url('../images/main/logo_main.png') no-repeat center;
      background-size: 44px;
      text-indent: -9999px;
      float: left;
      cursor: pointer;
    }

    header button {
      width: 40px;
      height: 50px;
      background: url('../images/main/close-w.png') no-repeat center;
      background-size: 24px;
      text-indent: -9999px;
      float: right;
      border: 0;
    }

    .find_pwd_section {
      width: 100%;
      max-width: 500px;
      margin: 0 auto;
    }

    .find_pwd_section h2 {
      width: 100%;
      border-bottom: 2px solid #000;
      text-align: left;
      margin: 20px auto;
    }

    .find_pwd_section form {
      width: 90%;
      border: 1px solid #eee;
      text-align: left;
      padding: 20px;
    }

    .find_pwd_section form p {
      display: block;
      margin: 20px auto;
    }

    .find_pwd_section form label {
      font-size: 0.875rem;
      line-height: 30px;
      width: 20%;
      float: left;
    }

    .find_pwd_section form input {
      width: 79%;
      height: 30px;
      line-height: 30px;
      font-size: 0.75rem;
      float: right;
      padding: 0 10px;
      box-sizing: border-box;
      outline: none;
    }

    .find_pwd_section form input:focus {
      outline: none;
    }

    .find_pwd_section form span {
      display: block;
      width: 100%;
      line-height: 20px;
      float: left;
      font-size: 0.75rem
    }

    .find_pwd_section form button {
      display: block;
      margin: 20px auto;
      padding: 10px 50px;
      box-sizing: border-box;
      color: #fff;
      border-radius: 20px;
      border: solid 1px rgba(221, 10, 56, .2);

      box-shadow: -2px -2px 2px rgba(228, 226, 226, .8), 3px 3px 4px rgba(0, 0, 0, .5);
      -webkit-box-shadow: -2px -2px 2px rgba(228, 226, 226, .8), 3px 3px 4px rgba(0, 0, 0, .5);
      -moz-box-shadow: -2px -2px 2px rgba(228, 226, 226, .8), 3px 3px 4px rgba(0, 0, 0, .5);

      background: #f97f7f;
      background: -moz-linear-gradient(top, #f97f7f 0%, #f97070 29%, #e81a46 100%);
      background: -webkit-linear-gradient(top, #f97f7f 0%, #f97070 29%, #e81a46 100%);
      background: linear-gradient(to bottom, #f97f7f 0%, #f97070 29%, #e81a46 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f97f7f', endColorstr='#e81a46', GradientType=0);

      transition: all .4s;

    }

    .find_pwd_section form button:hover {
      cursor: pointer;
      background: #ff5454;
      background: -moz-linear-gradient(top, #ff5454 1%, #f44444 47%, #d81a1d 100%);
      background: -webkit-linear-gradient(top, #ff5454 1%, #f44444 47%, #d81a1d 100%);
      background: linear-gradient(to bottom, #ff5454 1%, #f44444 47%, #d81a1d 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff5454', endColorstr='#d81a1d', GradientType=0);
    }

    .find_pwd_section form button:active {
      color: #f8b5b0;

      box-shadow: inset -4px -2px 2px rgba(225, 225, 225, .2), inset 8px 0px 16px rgba(0, 0, 0, .1);

      background: #e81a46;
      background: -moz-linear-gradient(top, #e81a46 0%, #fd6a6a 71%, #fc7b7b 100%);
      background: -webkit-linear-gradient(top, #e81a46 0%, #fd6a6a 71%, #fc7b7b 100%);
      background: linear-gradient(to bottom, #e81a46 0%, #fd6a6a 71%, #fc7b7b 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e81a46', endColorstr='#fc7b7b', GradientType=0);
    }
  </style>

  <script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>

</head>
<body>

<header>
  <h1 class="logo" onclick="location.href='../index.php'">애플짐 피트니스</h1>
  <button type="button" onclick="history.back()">닫기</button>
</header>

<section class="find_pwd_section">
  <h2>비밀번호 찾기</h2>

  <form id = "pwd_form" action="find_look.php" method="POST">
    <fieldset>
      <legend class="blind">비밀번호 찾기</legend>
      
      <p class="cfixed">
        <label for="mem_nm">이름</label>
        <input type="text" name="mem_nm" id="mem_nm" size="10" placeholder="이름을 입력해 주세요." autocomplete="off" autocapitalize="off">
        <span class="mem_nm_err"></span>
      </p>

      <p class="cfixed">
        <label for="mem_id">아이디</label>
        <input type="text" name="mem_id" id="mem_id" size="11" placeholder="아이디를 입력해 주세요." autocomplete="off" autocapitalize="off">
        <span class="mem_id_err"></span>
      </p>

      <p class="cfixed">
        <label for="tel_no">전화번호</label>
        <input type="text" name="tel_no" id="tel_no" size="11" placeholder="숫자만 입력해 주세요. ex)01033330000" autocomplete="off" autocapitalize="off">
        <span class="tel_no_err"></span>
      </p>

      <input type="hidden" value="1" name="check">
      <button type="button" onclick="form_check(this.form)">비밀번호 찾기</button>
    </fieldset>
  </form>

</section>

<script type="text/javascript">
  function form_check(frm) {

    var mem_nm = $("#mem_nm");
    var mem_id = $("#mem_id");
    var tel_no = $("#tel_no");

    if(mem_nm.val()=="") {
      alert("이름을 입력하세요.");
      mem_nm.focus();
      return false;

    } else if(mem_id.val()=="") {
      alert("아이디를 입력하세요.");
      mem_id.focus();
      return false;

    } else if(tel_no.val()=="") {
      alert("전화번호를 입력하세요.");
      tel_no.focus();
      return false;
    }

  frm.submit();

  };

</script>

</body>
</html>