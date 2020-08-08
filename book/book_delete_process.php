<?php
include "../lib/db.php";

$book_id = $_GET['id'];

if(!($book_id==""&&(!(isset($book_id))))){
$sql = mq("select * from book where book_id ='".$book_id."'");
$get_file = $sql->fetch_array();
unlink('../file/'.$get_file['file']);

$sql = mq("delete from book where book_id ='".$book_id."'");
$sql_review_getID = mq("select * from book_review where book_id ='".$book_id."'");
$getID = $sql_review_getID->fetch_array();
$sql_review = mq("delete from book_review where book_id='".$book_id."'");
$sql_comment = mq("delete from comment where review_id='".$getID['review_id']."'");
 echo "<script>alert('OK.')</script>";
 echo "<script>window.location = './book_list.php'</script>";
} else {
  echo mysqli_error($db);
	echo "<script>alert(\"NO.\");</script>";
	echo "<script>window.location = './book_list.php'</script>";
}

  ?>
