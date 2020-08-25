<?php
include $_SERVER['DOCUMENT_ROOT']."/db.php";

//각 변수에 write.php에서 input name를 저장한다.
$name = $_POST['name'];
$cont_1 = $_POST['cont_1'];
$cont_2 = $_POST['cont_2'];
$cont_3 = $_POST['cont_3'];

if($name && $cont_1 && $cont_2 && $cont_3){
	
	$sql = mq("insert into event(name,cont_1,cont_2,cont_3)values('".$name."','".$cont_1."','".$cont_2."','".$cont_3."')");
	$sqll = mq("select * from event where name ='".$name."'" );
	$array = $sqll->fetch_array();
	$idx = $array['m_idx'];
	echo "<script>alert('후기가 등록 완료.');location.href='/test_list.php';</script>";
	
	}else{
		echo "<script>alert('후기 등록 실패.');</script>";
	}
?>