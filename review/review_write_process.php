<?php

// 이 곳은 사용자가 등록하고 싶은 서평 정보를 받아 실제로 작성하게 되는 기능을 맡은 구역이다.

include "../lib/db.php";

$review_title = $_POST['review_title'];
$review_desc = $_POST['review_desc'];
$book_id = $_POST['book_id'];
$user_id = $_POST['user_id'];
$review_rating = $_POST['review_rating'];

if(!($review_title==""||$review_desc==""||$book_id==""||$user_id==""||$review_rating=="")){
$sql = mq("insert into book_review (review_title,review_desc,book_id,user_id,review_rating) values('".$review_title."','".$review_desc."','".$book_id."','".$user_id."','".$review_rating."')");
 echo "<script>alert('OK.')</script>";
 echo "<script>window.location = './review.php?id=$book_id'</script>";
} else {
  echo mysqli_error($db);
	echo "<script>alert(\"NO.\");</script>";
	echo "<script>window.location = './review_write.php?id=$book_id'</script>";
}

 ?>
