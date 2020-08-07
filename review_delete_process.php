<?php
include "./lib/db.php";

$review_id = $_GET['review'];

if(!($review_id==""&&(!(isset($review_id))))){
$sql = mq("select * from book_review where review_id ='".$review_id."'");
$booklist = $sql->fetch_array();
$booknum = $booklist['book_id'];
$sql = mq("delete from book_review where review_id ='".$review_id."'");
$sql_comment = mq("delete from comment where review_id='".$review_id."'");
 echo "<script>alert('OK.')</script>";
 echo "<script>window.location = './review.php?id=$booknum'</script>";
} else {
  echo mysqli_error($db);
	echo "<script>alert(\"NO.\");</script>";
	echo "<script>window.location = './review.php?id=$booknum  '</script>";
}

  ?>
