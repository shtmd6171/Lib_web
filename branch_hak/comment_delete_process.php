<?php

include "../lib/db.php";
$comment_id = $_GET['comment'];


if(!($comment_id==""&&(!(isset($comment_id))))){

$sql = mq("select * from comment where comment_id ='".$comment_id."'");
$commentlist = $sql->fetch_array();
$reviewnum = $commentlist['review_id'];


$sql = mq("DELETE FROM comment WHERE comment_id ='".$comment_id."'");
 echo "<script>alert('OK.')</script>";
 echo "<script>window.location = '../review/review_board.php?review=$reviewnum'</script>";
} else {
  echo mysqli_error($db);
	echo "<script>alert(\"NO.\");</script>";
	echo "<script>window.location = '../review/review_board.php?review=$reviewnum'</script>";
}

  ?>
