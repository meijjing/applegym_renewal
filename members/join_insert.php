<!-- join_insert.php -->
<meta charset="utf-8">
<?php

// 세션 실행
session_start();


/* 이전 페이지에서 값 가져오기 */
$mem_nm = $_POST['mem_nm'];
$male_flg = $_POST['male_flg'];
$mem_id = $_POST['mem_id'];
$mem_pwd = password_hash($_POST['mem_pwd'], PASSWORD_DEFAULT);
$tel_no = $_POST["tel_no"];

$email = $_POST["email_id"]."@".$_POST["email_dns"];
// $email_id = $_POST["email_id"];
// $email_dns = $_POST["email_dns"];
// $email_sel = $_POST["email_sel"];

$birth = $_POST["birth"];
$postal_code = $_POST["postal_code"];
$addr1 = $_POST["addr1"];
$addr2 = $_POST["addr2"];
$agree = $_POST["agree"];

$mem_reg_date = date("y-m-d");
// date("형식") - Y:4자리 년도, y:2자리 년도, H: 0~23시간, h:1~12시간
// ("y-m-d H-i")




/* 화면에 출력하기 */

// echo "<p>이름 : ".$mem_nm."</p>";
// echo "<p>성별 : ".$male_flg."</p>";
// echo "<p>아이디 : ".$mem_id."</p>";
// echo "<p>비밀번호 : ".$mem_pwd."</p>";

// echo "<p>이메일 : ".$email_id."@".$email_dns."</p>";
// // echo "<p>이메일 아이디 : ".$email_id."</p>"
// // echo "<p>이름 : ".$email_dns."</p>"

// echo "<p>생년월일 : ".$birth."</p>";
// echo "<p>우편번호 : ".$postal_code."</p>";
// echo "<p>기본주소 : ".$addr1."</p>";
// echo "<p>상세주소 : ".$addr2."</p>";
// echo "<p>약관동의 : ".$agree."</p>";

// echo "<p>가입일 : ".$mem_reg_date."</p>";






/* DB 접속 */
// db 연결
include "../inc/dbcon.php";

// $dbcon = mysqli_connect("localhost", "root", "1234", "front") or die("DB 접속 실패");
// mysqli_set_charset($dbcon, "utf8");

// $db_host = 'localhost';
// $db_user = 'root';
// $db_password = '1234';
// $db_name = 'front';
// $db_port = 8080;

// $dbcon = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// if(!$dbcon) {
//   echo 'db 연결 실패'.mysqli_connect_error();
// } else {
//   echo 'db 연결 성공';
// }



/* 쿼리 생성 */

// echo "insert into members(mem_nm, male_flg, mem_id, mem_pwd, tel_no, email, birth, postal_code, addr1, addr2, mem_reg_date) values
// ('".$mem_nm."', '".$male_flg."', '".$mem_id."', '".$mem_pwd."', '".$tel_no."', '".$email."', '".$birth."', '".$postal_code."', '".$addr1."', '".$addr2."', '".$mem_reg_date."');";

// echo "<hr>";

// echo "insert into members (mem_nm, male_flg, mem_id, mem_pwd, tel_no, email, birth, postal_code, addr1, addr2, mem_reg_date) values ('$mem_nm', '$male_flg', '$mem_id', '$mem_pwd', '$tel_no', '$email', '$birth', '$postal_code', '$addr1', '$addr2', '$mem_reg_date');";

// echo "<hr>";

// echo "insert into members(
//   mem_nm, male_flg, mem_id, mem_pwd, tel_no, email, birth, postal_code, addr1, addr2, mem_reg_date
//   ) values (
//     '$mem_nm', '$male_flg', '$mem_id', '$mem_pwd', '$tel_no', '$email', '$birth', '$postal_code', '$addr1', '$addr2', '$mem_reg_date');";



// 테이블 만들기
$sql = "insert into members (
  mem_nm, male_flg, mem_id, mem_pwd, tel_no, email, birth, postal_code, addr1, addr2, mem_reg_date) values ('$mem_nm', '$male_flg', '$mem_id', '$mem_pwd', '$tel_no', '$email', '$birth', '$postal_code', '$addr1', '$addr2', '$mem_reg_date');";




/* 데이터 베이스에 값 전달하기 */

  // mysqli_query("연결객체", "전달할 쿼리");
$result = mysqli_query($dbcon, $sql);

// if($result === false) {
//   echo '저장 실패 !';
//   echo error_log(mysqli_error($dbcon)); // 에러 로그 기록
// } else {
//   echo '저장 성공';
// }
// exit;


/* 연결 종료 */
// mysqli_close();
mysqli_close($dbcon);



/* 결과 페이지로 이동 */ 

echo "

<script type=\"text/javascript\">
  location.href=\"join_ok.php\";
</script>

";



?>

<!-- <script type="text/javascript">
  location.href="(result.php)";
</script> -->