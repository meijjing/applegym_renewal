<?php

// 세션 실행
session_start();
// echo $_SESSION["s_idx"];



// --* 이전 페이지에서 데이터 가져오기 *--

  // 변수명 = $_메소드방식["필드의 name 속성값"];
$mem_id = $_POST['mem_id'];
$mem_pwd = $_POST['mem_pwd'];

  // 데이터 확인
  // echo $mem_id."/".$mem_pwd;



// --* db 연결 *--
// $dbcon = mysqli_connect("localhost", "root", "1234", "front") or die("DB 접속 실패 !!");
// mysqli_set_charset($dbcon, "utf8"); // 연결객체는 " " 쓰면 안됨!

// db 외부 파일 불러오기
include "../inc/dbcon.php";



// --* 쿼리 작성 *--
$sql = "select * from members where mem_id='$mem_id';";

  // 쿼리가 제대로 들어가는지 값 확인 
  // echo $sql;


// --* db에 쿼리 전달하기 *--
// mysqli_query("연결객체", "전송할 쿼리");
$result = mysqli_query($dbcon, $sql);


// --* 결과값 가져오기 *--
  // mysqli_fetch_row(전달쿼리);  -> 필드 순서
  // $row = mysqli_fetch_row($result);
  // echo $row[0]."/".$row[1];


  // mysqli_fetch_array : 필드명
$array = mysqli_fetch_array($result);
  // echo $array["mem_id"]." / ".$array["mem_pwd"];
  // exit;

  // $array = mysqli_fetch_array($result);

  // db에서 가져온 값을 변수에 저장(생략해도 무관)
  // $g_idx = $array["idx"];
  // $g_name = $array["mem_nm"];
  // $g_id = $array["mem_id"];
  // $g_pwd = $array["mem_pwd"];
  // echo $g_idx." / ".$g_name." / ".$g_id." / ".$g_pwd;

// --* fetch_row 와 array는 천번째 행만 반환


  // mysqli_num_rows : 결과행의 개수
  // slect count(*) from members where mem_id='jjing'; 와 같은 개념
  $num = mysqli_num_rows($result);
  // echo $num;


  

  // 조건 처리
  if(!$num) { // 일치하는 아이디가 없는 경우
    echo "
      <script type=\"text/javascript\">
        alert(\"일치하는 아이디가 없습니다.\");
        history.back();
      </script>
    ";
    exit;

  } else if(!password_verify($mem_pwd, $array['mem_pwd'])) {

    echo "
    <script type=\"text/javascript\">
      alert(\"비밀번호가 일치하지 않습니다.\");
      history.back();
    </script>
    ";
    exit;
  
  } else {

      echo "
      <script type=\"text/javascript\">
        location.href=\"../index.php\";
      </script>
      ";
  };


    // 세션 생성 -> session_start(); 모든페이지에 상단에 넣어줘야해
    // $_SESSION["세션변수명"] = 저장할 값;
    $_SESSION["s_idx"] = $array["idx"];
    $_SESSION["s_name"] = $array["mem_nm"];
    $_SESSION["s_id"] = $array["mem_id"];
    $_SESSION["s_pwd"] = $array["mem_pwd"];
    $_SESSION["s_tel"] = $array["tel_no"];
    $_SESSION["s_email"] = $array["email"];
    
    // echo $_SESSION["s_idx"]." / ".$_SESSION["s_name"]." / ".$_SESSION["s_id"];


    // $g_idx = $array["idx"];
    // $g_name = $array["mem_nm"];
    // $g_id = $array["mem_id"];
    // -* 세션에 비밀번호는 저장해두면 안되징


  // db 종료
  mysqli_close($dbcon);

// --* 페이지 이동 *--

?>

