<?php
include "./lib/db.php";

$book_id = $_POST['book_id'];
$review_id = $_POST['review_id'];
$title = $_POST['title'];
$review_desc = $_POST['review_desc'];

if(!($title==""||$review_desc=="")){
$sql = mq("update book_review set review_title ='".$title."', review_desc ='".$review_desc."' where review_id ='".$review_id."'");
 echo "<script>alert('OK.')</script>";
 echo "<script>window.location = './review_board.php?review=$review_id'</script>";
} else {
  echo mysqli_error($db);
	echo "<script>alert(\"NO.\");</script>";
	echo "<script>window.location = './review.php?id=$book_id'</script>";
}



 ?>
