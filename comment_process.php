<?php
include "./lib/db.php";

$user_id = $_POST['user_id'];
$review_id = $_POST['review_id'];
$comm_description = $_POST['desc'];

if(!($user_id==""||$review_id==""||$comm_description=="")){
$sql = mq("insert into comment (comm_description,review_id,user_id) values('".$comm_description."','".$review_id."','".$user_id."')");
 echo "<script>window.location = 'review_board.php?review=$review_id'</script>";
} else {
  echo mysqli_error($db);
	echo "<script>alert(\"NO.\");</script>";
	echo "<script>window.location = 'review_board.php?review=$review_id'</script>";
}



 ?>
