<?php
/* 이 곳은 책을 찜하기 위한 사이트. */
include "../lib/db.php";
$user_id = $_SESSION['user_id'];
$book_id = $_GET['id'];
$date = date("Y-m-d H:i:s");

$sql = mq("select * from user where user_id ='".$user_id."'");
$codecheck = $sql->fetch_array();

if(isset($user_id))
{
  //PURCHASE 테이블에서 유저아이디와 북 아이디를 하나의 행으로 조회한다.
    $sql = mq("select * from favorite where user_id ='".$user_id."' AND book_id ='".$book_id."'");

      if (!($favoritecheck = $sql->fetch_array()))
      {
        $insert = mq("INSERT INTO favorite VALUES ('".$book_id."', '".$user_id."', '".$date."') ");
        echo "<script>alert('찜 했습니다.'); history.back();</script>";
      }
      else
      {
<<<<<<< HEAD
=======
        echo "<script>alert('이미 찜한 상품입니다.'); history.back();</script>";
>>>>>>> 6d4aab9c17d91ebf08413ba881ba9b0f723ab913
      }
}
 else
 {
   	echo "<script>alert('로그인 해주세요.'); location.href='../log/login.php';</script>";
 }
?>
