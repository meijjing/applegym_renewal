<?php

  // 세션 연결
  session_start();   

  $s_idx = isset($_SESSION["s_idx"])? $_SESSION["s_idx"]:"";




  /* 이전 페이지에서 값 가져오기 */
  $g_idx = $_POST["g_idx"];

  $mem_pwd = $_POST["mem_pwd"];
  $tel_no = $_POST["tel_no"];
  $mem_pwd = password_hash($_POST["mem_pwd"], PASSWORD_DEFAULT);

  $email = $_POST["email_id"]."@".$_POST["email_dns"];
  $email_id = $_POST["email_id"];
  $email_dns = $_POST["email_dns"];
  // $email_sel = $_POST["email_sel"];

  $birth = $_POST["birth"];
  $postal_code = $_POST["postal_code"];
  $addr1 = $_POST["addr1"];
  $addr2 = $_POST["addr2"];




  // db 연결
  include "../inc/dbcon.php";



  // 조건 처리 & 쿼리 작성
  if ($mem_pwd) { // 비밀번호 입력시
    $sql = " update members set 
              mem_pwd ='$mem_pwd' , 
              tel_no ='$tel_no' ,  
              email = '$email' , 
              birth = '$birth' , 
              postal_code = '$postal_code' ,
              addr1 = '$addr1' , 
              addr2 = '$addr2' 
              WHERE idx=$g_idx; ";

  } else { // 비밀번호 미 입력시
    $sql = " update members set 
              tel_no ='$tel_no' ,  
              email = '$email' , 
              birth = '$birth' , 
              postal_code = '$postal_code' ,
              addr1 = '$addr1' , 
              addr2 = '$addr2' 
              WHERE idx=$g_idx; ";
  };
  // echo $sql;
  // exit;




  // db에 쿼리 전송
  mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));



  // db 연결 종료
  mysqli_close($dbcon);



  // 결과페이지로 이동
  echo "

  <script type=\"text/javascript\">
    alert(\"회원정보가 수정되었습니다.\");
    location.href=\"members_list.php\";
  </script>

";

?>
