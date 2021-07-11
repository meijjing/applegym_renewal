<?php


 // 이전 페이지에서 값 가져오기
  $mem_id = $_POST["mem_id"];

 // db 연결
  include "../inc/dbcon.php";


  // 쿼리작성
  $sql = "select mem_id from members where mem_id = '$mem_id';";


  // 쿼리 전송
  $result = mysqli_query($dbcon, $sql);

  // echo '$result';
  // exit;


  // db에서 결과값 가져오기
  $num = mysqli_num_rows($result);


  $return_val = "";
  
  if(!$num){
    $return_val = "<div style=\"color:green\">사용할 수 있는 아이디입니다.</div>";
  } else {
    $return_val = "사용할 수 없는 아이디입니다.";
  };

  echo $return_val;


?>