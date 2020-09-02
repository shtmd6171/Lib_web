<?php
/* 이 곳은 책을 구매  리스트 보여주기 위한 사이트. */
include "../lib/db.php";
$user_id = $_SESSION['user_id'];

//purchase 테이블에서 유저아이디를 하나의 행으로 조회한다.
$sql = mq("select * from purchase where user_id ='".$user_id."' ");
$sql->fetch_array();

$list = mq("select title,author,publisher, purchase_date as 구매날짜, genre, file from book, purchase where book.book_id = purchase.book_id and purchase.user_id ='".$user_id."'");


// codecheck 쿼리를 실행해서 값이 존재하면 else 문으로 ..
// 쿼리를 실행해서 값이 존재하지 않으면  if문 실행
// 쿼리를 실행했는데 값이 존재하지 않는다는 것은 DB에 데이터가 없다는 라는 말.
// 고로 대출 한 데이터가 없다라는 것임.


?>


</script>
