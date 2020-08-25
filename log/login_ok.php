<meta charset="utf-8" />
<?php
	include "../lib/db.php";
	include "./password.php";

	/* 여기서 if문의 조건을 공통적으로 ==""로 줬는데 그 이유는
	일단 위에 형식에 맞춰 $_POST를 통해 변수로 받아올경우 ($_POST를 그대로 써도) 값이 없는 경우에는
	NULL 값이 아닌 아무것도 없는 문자열 " "를 받아온다. (NULL과 아무것도 없는 문자열은 기본 형태가 다르다.)
	그렇기 때문에 isset을 사용했을 경우 내용이 없더라고 값은 있는 형태로 인식하게 된다

	즉, 아무것도 입력하지 않아도 isset을 이용하면 값이 있다고 판단해버린다.
	그것은 if문에서 하고자하는 기능 ( : 필수 입력내용을 전부 입력 할 때만 값이 적용하려는 것)이 적용되지 않는다는 의미다.
	그렇기 때문에 각 값이 아무것도 넣지 않는 문자열인지로 판단하여 구분할 수 있다.
	*/
	if($_POST["email"] == "" || $_POST["pwd"] == ""){
		echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
	}else{

	$password = $_POST['pwd'];
	$sql = mq("select * from user where email='".$_POST['email']."'");
	$member = $sql->fetch_array();
	$hash_pw = $member['pwd'];
	// 여기서 code란 user 테이블의 A(관리자)와 U(유저)를 의미한다
	$code = $member['code'];

	/* password_verify(일반암호, 암호화한암호) 는 password_hash를 통해 암호화된 암호를 복호화하여
	일반암호와 값이 같은지 비교한다. 이 함수의 반환값은 true 또는 false로
	암호화된 암호와 일반암호가 같을경우 if문 내부를 실행하게 된다.
	*/
	if(password_verify($password, $hash_pw))
	{
		// 현재 user_id (PK)를 세션에 삽입하였다.
		$_SESSION['user_id'] = $member["user_id"];
		// code가 U일 경우에는 일반 사용자로 인식한다. 그와 반대로 A일 경우에는 관리자로 인식한다.
		// 사실, 출력 결과의 차이는 alert이 다르게 뜨는게 전부지만.. 실제론 다른페이지로 접속하게 해야한다.
		if($code == 'U' || $code == 'M')  {
			echo "<script>alert('로그인되었습니다.'); location.href='../book/book_list.php';</script>";
		} else {
			echo "<script>alert('관리자로 로그인되었습니다.'); location.href='../book/book_list.php';</script>";
		}
	// 암호화된 암호와 일반암호가 다를 경우 if문 외부인 여기를 실행하게 된다.
	}else{
		echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
	}
}
?>
