<?php
include "../lib/db.php";

// 이 곳은 관리자가 수정하고 싶은 정보를 받아 실제로 수정하게 되는 기능을 맡은 구역이다.

$book_id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$date = $_POST['the_date'];
$genre = $_POST['genre'];
$tmpfile = $_FILES['lo_image_link']['tmp_name'];
$o_name = $_FILES['lo_image_link']['name'];
$filename = iconv("UTF-8","EUC-KR",$_FILES['lo_image_link']['name']);
$folder = "../file/original/".$filename;
$vall = move_uploaded_file($tmpfile,$folder);

if(!($title==""||$author==""||$publisher==""||$date==""||$genre=="")){
// update문을 이용해서 수정하고 싶은 정보들을 삽입하여 수정한다.
$sql = mq("update book set title ='".$title."', author ='".$author."', publisher ='".$publisher."',
the_date ='".$date."', genre ='".$genre."', file ='".$o_name."' where book_id ='".$book_id."'");
 echo "<script>alert('OK.')</script>";
 echo "<script>window.location = './book_list.php'</script>";
} else {
  echo mysqli_error($db);
	echo "<script>alert(\"NO.\");</script>";
	echo "<script>window.location = './book_update.php?id=$book_id'</script>";
}



 ?>
