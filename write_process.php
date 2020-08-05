<?php
include "./lib/db.php";

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

if(isset($title)&&isset($author)&&isset($publisher)&&isset($date)&&isset($genre)){
$sql = mq("insert into book (title,author,publisher,the_date,genre,file) values('".$title."','".$author."','".$publisher."','".$date."','".$genre."','".$o_name."')");
 echo "<script>alert('OK.')</script>";
 //echo "<script>window.location = '../viewAll.php'</script>";
} else {
  echo mysqli_error($db);
	echo "<script>alert(\"NO.\");</script>";
	//echo "<script>window.location = '../writepage.php'</script>";
}



 ?>
