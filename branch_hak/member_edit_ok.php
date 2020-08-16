<?php
  include "../lib/db.php";
  $user_id = $_SESSION['user_id'];


  $sql = mq("select * from user where user_id ='".$user_id."'");

  $codecheck = $sql->fetch_array();

  $hash_pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
  $name = $_POST['name'];
  $addr = $_POST['addr'];
  $tel = $_POST['tel'];


  if($_POST['pwd'] == $_POST['repwd']){

    $change = mq("UPDATE user SET pwd = '$hash_pwd', addr = '$addr', name = '$name', tel = '$tel' WHERE user_id = '$user_id'");

    echo "<script>alert('회원정보가 수정되었습니다. 다시 로그인 해주세요.'); location.href='../log/login.php';</script>";


  }else{
    echo "<script>alert('비밀번호를 확인하세요.'); history.back();</script>";
  }

?>
