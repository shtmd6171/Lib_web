<?php
/* 이 곳은 책을 대여하기 위한 사이트. */
include "../lib/db.php";

date_default_timezone_set('Asia/Seoul');

$user_id = $_SESSION['user_id'];
$book_id = $_GET['id'];
$loanDate = (new DateTime('NOW'));
$returnDate = (new DateTime('NOW +3 days'));

$format_loanDate = $loanDate->format('Y-m-d H:i:s');
$format_returnDate = $returnDate->format('Y-m-d H:i:s');

$now = (new DateTime('2020-09-03'));
$now = $now->setTime(14,54);

$now2 =(new DateTime('2020-09-03'));
$now2 = $now2->setTime(14,54);

echo $now2->format('Y-m-d H:i:s');

$returnDate = $now->diff($now2);
$tmdals= $returnDate->format("%D%H%i") ."<br>";

echo "<br><br>";
 echo $tmdals;

echo "<br>";
$tmdalscjswo = intval($tmdals);

//
if($tmdalscjswo == 0)
{
  echo "승민짱";
}

//
//
// if(isset($user_id))
// {
//   //LOAN 테이블에서 유저아이디와 북 아이디를 하나의 행으로 조회한다.
//   $sql = mq("select * from loan where user_id ='".$user_id."' AND book_id ='".$book_id."'");
//
//   // codecheck 쿼리를 실행해서 값이 존재하면 else 문으로 ..
//   // 쿼리를 실행해서 값이 존재하지 않으면  if문 실행
//   // 쿼리를 실행했는데 값이 존재하지 않는다는 것은 DB에 데이터가 없다는 라는 말.
//   // 고로 대출 한 데이터가 없다라는 것임.
//   if (!($codecheck = $sql->fetch_array())) {
//
//     $insert = mq("INSERT INTO loan VALUES ('".$book_id."', '".$user_id."', '".$format_loanDate."', '".$format_returnDate."') ");
//     echo "<script>alert('대출 받았습니다.'); history.back();</script>";
//
//    } else {
//       echo "<script>alert('이미 대출 받은 상품입니다.'); history.back();</script>";
//    }
//  }
//  else
//  {
//    	echo "<script>alert('로그인 해주세요.'); location.href='../log/login.php';</script>";
//  }
//
// ?>
