<?php
include "./lib/db.php";

$review_title = $_POST['review_title'];
$review_desc = $_POST['review_desc'];
$book_id = $_POST['book_id'];
$user_id = $_POST['user_id'];



if(!($review_title==""||$review_desc==""||$book_id==""||$user_id=="")){
$sql = mq("insert into book_review (review_title,review_desc,book_id,user_id) values('".$review_title."','".$review_desc."','".$book_id."','".$user_id."')");
 echo "<script>alert('OK.')</script>";
 echo "<script>window.location = './review.php?id=$book_id'</script>";
} else {
  echo mysqli_error($db);
	echo "<script>alert(\"NO.\");</script>";
	echo "<script>window.location = './review_write.php?id=$book_id'</script>";
}

 ?>
