<meta charset="utf-8" />
<?php
	include "../lib/db.php";
	include "./password.php";

	if($_POST["email"] == "" || $_POST["pwd"] == ""){
		echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
	}else{

	$password = $_POST['pwd'];
	$sql = mq("select * from user where email='".$_POST['email']."'");
	$member = $sql->fetch_array();
	$hash_pw = $member['pwd'];
	$code = $member['code'];

	if(password_verify($password, $hash_pw))
	{
		$_SESSION['user_id'] = $member["user_id"];
		if($code == 'U')  {
			echo "<script>alert('로그인되었습니다.'); location.href='../book_list.php';</script>";
		} else {
			echo "<script>alert('관리자로 로그인되었습니다.'); location.href='../book_list.php';</script>";
		}
	}else{
		echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
	}
}
?>
