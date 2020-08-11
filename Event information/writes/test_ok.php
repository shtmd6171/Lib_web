<?php
include $_SERVER['DOCUMENT_ROOT']."/db.php";

//각 변수에 write.php에서 input name를 저장한다.
$name = $_POST['name'];
$day = $_POST['day'];
$ba = $_POST['ba'];
$reviwe = $_POST['reviwe'];
move_uploaded_file($tmpfile,$folder);

if($name && $day && $ba && $reviwe  ){
	
	$sql = mq("insert into event(name,day,ba,reviwe)values('".$name."','".$day."','".$ba."','".$reviwe."')");
	echo "<script>alert('후기가 등록 완료.');location.href='/movie_list.php';</script>";
	
	}else{
		echo "<script>
		alert('후기 등록 실패.');</script>";
	}
?>