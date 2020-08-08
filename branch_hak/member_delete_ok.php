<?php
include "../lib/db.php";
$user_id = $_SESSION['user_id'];

$sql = mq("select * from user where user_id ='".$user_id."'");
$codecheck = $sql->fetch_array();

$email = $_POST['email'];
$name = $_POST['name'];

$c_email = $codecheck['email'];
$c_name = $codecheck['name'];



  if($c_email == $email && $c_name == $name) {

    echo "데이터 일치확인 완료.<br>";
  } else {
    echo '<script> alert("정보를 다시 입력해주세요."); history.back(); </script>';
    exit();

  }

  $query = "DELETE FROM user where email = '$email'";
  $execute = mq($query);

  if($execute){
    echo "<script>alert('회원 탈퇴 되었습니다.'); location.href='../log/login.php';</script>";
  } else{
    echo '<script> alert("오류 발생..."); history.back(); </script>';
    echo $mysqli->error;
  }
?>
