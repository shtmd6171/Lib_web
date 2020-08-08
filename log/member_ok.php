<?php
	include "../lib/db.php";
	include "./password.php";

	$email = $_POST['email'];
	$pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
	$name = $_POST['name'];
	$addr = $_POST['addr'];
	$tel = $_POST['tel'];
	$gender = $_POST['gender'];

/* 여기서 if문의 조건을 공통적으로 ==""로 줬는데 그 이유는
일단 위에 형식에 맞춰 $_POST를 통해 변수로 받아올경우 값이 없는 경우에는
NULL 값이 아닌 아무것도 없는 문자열 " "를 받아온다. (NULL과 아무것도 없는 문자열은 기본 형태가 다르다.)
그렇기 때문에 isset을 사용했을 경우 내용이 없더라고 값은 있는 형태로 인식하게 된다

즉, 아무것도 입력하지 않아도 isset을 이용하면 값이 있다고 판단해버린다.
그것은 if문에서 하고자하는 기능 ( : 필수 입력내용을 전부 입력 할 때만 값이 적용하려는 것)이 적용되지 않는다는 의미다.
그렇기 때문에 각 값이 아무것도 넣지 않는 문자열인지로 판단하여 구분할 수 있다.
*/
if(!($email==""||$pwd==""||$name==""||$gender=="")){
$sql = mq("insert into user (pwd,email,addr,name,gender,tel) values('".$pwd."','".$email."','".$addr."','".$name."','".$gender."','".$tel."')");
 /* PHP는 기본적으로 HTML문을 배경으로 동작한다.
 이말은 echo를 통해 ""로 감싼 문자열을 입력 했을 때, 그 자체로 HTML문이 된다는 것이다.
 그렇기에 <script></script>를 사용해 문자열로 감싸게 되면 script문으로 감싼 html문을 실행한다는 의미다.
 */
 echo "<script>alert('회원가입이 완료되었습니다.')</script>";
 echo "<script>window.location = './login.php'</script>";
} else {
	echo "<script>alert(\"필요사항을 기입하지 않았습니다.\");</script>";
	echo "<script>window.location = './member.php'</script>";
}
?>
