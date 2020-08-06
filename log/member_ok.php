<?php
	include "../lib/db.php";
	include "./password.php";

	$email = $_POST['email'];
	$pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
	$name = $_POST['name'];
	$addr = $_POST['addr'];
	$tel = $_POST['tel'];
	$gender = $_POST['gender'];

if(!($email==""||$pwd==""||$name==""||$gender=="")){
$sql = mq("insert into user (pwd,email,addr,name,gender,tel) values('".$pwd."','".$email."','".$addr."','".$name."','".$gender."','".$tel."')");
 echo "<script>alert('회원가입이 완료되었습니다.')</script>";
 echo "<script>window.location = './login.php'</script>";
} else {
	echo "<script>alert(\"필요사항을 기입하지 않았습니다.\");</script>";
	echo "<script>window.location = './member.php'</script>";
}
?>
