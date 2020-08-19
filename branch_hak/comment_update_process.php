<?php
include "../lib/db.php";

$review_id = $_POST['review_id'];
$comment_id = $_POST['comment_id'];
$writer = $_POST['writer'];
$comm_description = $_POST['comm_description'];

if(!($comm_description=="")){
$sql = mq("UPDATE comment SET comm_description ='".$comm_description."' WHERE comment_id ='".$comment_id."'");
 echo "<script>alert('OK.')</script>";
 echo "<script>window.location = '../review/review_board.php?review=$review_id'</script>";
} else {
  echo mysqli_error($db);
	echo "<script>alert(\"NO.\");</script>";
	echo "<script>window.location = '../review/review_board.php?review=$review_id'</script>";
}



 ?>
