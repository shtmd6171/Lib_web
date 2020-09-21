<?php
include "../lib/db.php";
date_default_timezone_set('Asia/Seoul');
$user_id = $_SESSION['user_id'];

$nowDate = (new DateTime('NOW'));

//LOAN 테이블에서 유저아이디를 하나의 행으로 조회한다.
$sql = mq("select * from loan where user_id ='".$user_id."' ");


$list = mq("select title,author,publisher, loan_date as 대여, genre, file, return_date, book.book_id as bk_id from book, loan where book.book_id = loan.book_id and loan.user_id ='".$user_id."'");

       if ($sql->num_rows > 0) {
        while($result = $list->fetch_array())
        {
          // diff 오브젝트를 사용하려면, DateTime() 클래스에서 diff 오브젝트를 사용해야한다.
          // diff 오브젝트는 DateInterval 오브젝트 또는 false를 나타낸다.
          // DateInterval 의 format table은 아래와 같다.
          // https://www.php.net/manual/en/dateinterval.format.php
          // %r는 음수의 경우 "-""를 나타낸다.
          // %D는 00일 을 나타낸다. ex 01일, 13일
          // %H는 00시간, %I는 00분, %S는 00초

         $substr_resultDate = substr($result['return_date'],0);
         $resultDate = new DateTime($substr_resultDate);

         $remainDate = $nowDate->diff($resultDate);
         $interval_remainDate = $remainDate->format('%r%D%H%I%S');




      echo  $remainDate->format('%r%D일 %H시간 %I분 %S초');
      }
    }
?>
