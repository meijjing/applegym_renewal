<?php

// utf-8 인코딩
header('Content-Type: text/html; charset=UTF-8');


// $dbcon = mysqli_connect("localhost", "닷홈아이디", "닷홈비밀번호", "닷홈아이디(혹은 닷홈 admin에 보여지는 데이터베이스명") or die("데이터 베이스 연결 실패 !");  //   닷홈이 가지고 있는 mysql에 DB를 만들어서 실행시킴.

// $dbcon = mysqli_connect("localhost", "meijing", "jjing2!!", "meijing") or die("DB 접속 실패 !!");



$dbcon = mysqli_connect("localhost", "root", "1234", "applegym") or die("DB 접속 실패 !!");
// mysqli_set_charset($dbcon, "utf8");
// $dbcon->set_charset("utf8");

function mq($sql) {
  global $dbcon;
  return $dbcon->query($sql);
}
?>
