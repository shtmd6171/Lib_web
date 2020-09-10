<?php

include "../lib/db.php";
$user_id = $_SESSION['user_id'];
$book_id = $_GET['book_id'];


// get으로 받아온 book_id가 공백 또는 존재하지않는게... ! 아니라면 밑에 쿼리문 실행
// if(!($book_id=="")&&(!(isset($book_id))))
if(!($book_id==""&&(!(isset($book_id)))))
{
  echo "<script>alert('찜 취소.')</script>";
  $sql = mq("DELETE FROM favorite WHERE user_id ='".$user_id."' and book_id='".$book_id."' ");
} else {
  echo mysqli_error($db);
  echo "<script>alert(\"NO.\");</script>";
}


?>
