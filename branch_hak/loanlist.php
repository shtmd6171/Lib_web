<?php
/* 이 곳은 책을 대여받은  리스트 보여주기 위한 사이트. */
include "../lib/db.php";
$user_id = $_SESSION['user_id'];

//LOAN 테이블에서 유저아이디를 하나의 행으로 조회한다.
$sql = mq("select * from loan where user_id ='".$user_id."' ");
$sql->fetch_array();

$list = mq("select title,author,publisher, the_date as 빌린날짜, genre, file from book, loan where book.book_id = loan.book_id and loan.user_id ='".$user_id."'");


// codecheck 쿼리를 실행해서 값이 존재하면 else 문으로 ..
// 쿼리를 실행해서 값이 존재하지 않으면  if문 실행
// 쿼리를 실행했는데 값이 존재하지 않는다는 것은 DB에 데이터가 없다는 라는 말.
// 고로 대출 한 데이터가 없다라는 것임.


if ($sql->num_rows > 0) {
    while($result = $list->fetch_array())
    {
      echo $result['title'].$result['author'].$result['publisher'].$result['빌린날짜'].$result['genre']."<br>";
    }

}
else {
    echo "대출 리스트가 존재하지 않습니다.";
 }
?>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
