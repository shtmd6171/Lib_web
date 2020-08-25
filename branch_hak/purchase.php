<?php
/* 이 곳은 책을 구매하기 위한 사이트. */
include "../lib/db.php";
$user_id = $_SESSION['user_id'];
$book_id = $_GET['id'];
$date = date("Y-m-d H:i:s");

$sql = mq("select * from user where user_id ='".$user_id."'");
$codecheck = $sql->fetch_array();

if(isset($user_id))
{
  //PURCHASE 테이블에서 유저아이디와 북 아이디를 하나의 행으로 조회한다.
    $sql = mq("select * from purchase where user_id ='".$user_id."' AND book_id ='".$book_id."'");

    if($codecheck['code'] == 'M' )
    {
      if (!($purchasecheck = $sql->fetch_array()))
      {
        $insert = mq("INSERT INTO purchase VALUES ('".$book_id."', '".$user_id."', '".$date."') ");
        echo "<script>alert('구매 했습니다.'); history.back();</script>";
      }
      else
      {
        echo "<script>alert('이미 구매 한 상품입니다.'); history.back();</script>";
      }
    }
      else
      {
        echo "<script>alert('멤버쉽에 가입하셔야 구매가 가능합니다.'); history.back();</script>";
      }
}

 else
 {
   	echo "<script>alert('로그인 해주세요.'); location.href='../log/login.php';</script>";
 }

?>
