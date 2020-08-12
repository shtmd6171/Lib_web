<?php
include $_SERVER['DOCUMENT_ROOT']."/db.php";

//각 변수에 write.php에서 input name를 저장한다.
$name = $_POST['name'];
$cont_1 = $_POST['cont_1'];
$cont_2 = $_POST['cont_2'];
$cont_3 = $_POST['cont_3'];
$tmpfile = $_FILES['lo_image_link']['tmp_name'];
$o_name = $_FILES['lo_image_link']['name'];
$filename = iconv("UTF-8","EUC-KR",$_FILES['lo_image_link']['name']);
$folder = "./img/poster/".$filename;
move_uploaded_file($tmpfile,$folder);

if($name && $cont_1 && $cont_2 && $cont_3 && $o_name ){
	
	$sql = mq("insert into movie_info(name,cont_1,cont_2,cont_3,lo_image_link)values('".$name."','".$cont_1."','".$cont_2."','".$cont_3."','".$o_name."')");
	echo "<script>alert('행사가 등록되었습니다.');location.href='/movie_list.php';</script>";
	
	}else{
		echo "<script>
		alert('행사 등록이 실패되었습니다.');</script>";
	}
?>
 