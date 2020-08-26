<?php

include $_SERVER['DOCUMENT_ROOT']."/db.php";

//각 변수에 write.php에서 input name값들을 저장한다
$bno = $_GET['idx'];
$name = $_POST['name'];
$role = $_POST['lead_role'];
$date = $_POST['Opening_date'];
$OST = $_POST['OST'];
$r_age = $_POST['r_age'];
$awards = $_POST['awards'];
$genre = $_POST['genre'];
$summay = $_POST['summay'];
$r_time = $_POST['r_time'];
$link = $_POST['link'];
$country = $_POST['country'];
$director = $_POST['director'];
$lo_image_link = $_POST['lo_image_link'];
$etc = $_POST['etc'];

if($name && $role && $date && $OST && $r_age && $awards && $genre && $summay && $r_time && $link && $country && $director && $lo_image_link && $etc){
    $sql = mq("update movie_info set m_name='".$name."',
	m_lead_role='".$role."',
	m_Opening_date='".$date."',
	m_OST='".$OST."',
	m_r_age='".$r_age."',
	m_awards='".$awards."',
	m_genre='".$genre."',
	m_summay='".$summay."',
	m_r_time='".$r_time."',
	m_link='".$link."',
	m_country='".$country."',
	m_director='".$director."',
	m_lo_image_link='".$lo_image_link."',
	etc='".$etc."'");

echo "<script>
	alert('글 수정이 완료되었습니다.');
	location.href='/page/main.php';</script>";
}
?>