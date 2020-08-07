<?php
include "./lib/db.php";

$book_id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$date = $_POST['the_date'];
$genre = $_POST['genre'];
$tmpfile = $_FILES['lo_image_link']['tmp_name'];
$o_name = $_FILES['lo_image_link']['name'];
$filename = iconv("UTF-8","EUC-KR",$_FILES['lo_image_link']['name']);
$folder = "./file/".$filename;
$vall = move_uploaded_file($tmpfile,$folder);

if(!($title==""||$author==""||$publisher==""||$date==""||$genre=="")){
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
