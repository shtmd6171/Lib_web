<meta charset="utf-8" />
<?php
	include "../lib/db.php";
	include "../log/password.php";

  $user_id = $_SESSION['user_id'];
  $sql = mq("select * from user where user_id='".$user_id."'");
  $codecheck = $sql->fetch_array();

  $pwd = $codecheck['pwd'];

	if($_POST['pwd'] == ""){
		echo '<script> alert("패스워드를 입력하세요"); history.back(); </script>';
	}else{

	$password = $_POST['pwd'];
	$hash_pw = $codecheck['pwd'];
  $code = $codecheck['code'];

	if(password_verify($password, $hash_pw))
	{
		$_SESSION['user_id'] = $codecheck["user_id"];
		if($code == 'U')  {
			echo "<script>alert('마이 페이지에 로그인되었습니다.'); location.href='./member_manage.php';</script>";
		} else {
			echo "<script>alert('관리자로 마이 페이지에 로그인되었습니다.'); location.href='./member_manage.php';</script>";
		}
	}else{
		echo "<script>alert('비밀번호를 확인하세요.'); history.back();</script>";
	}
}
?>
