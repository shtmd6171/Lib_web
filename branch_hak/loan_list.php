<?php
/* 이 곳은 책을 대여받은  리스트 보여주기 위한 사이트. */
include "../lib/db.php";
$user_id = $_SESSION['user_id'];
$date = new DateTime('NOW');
$nowDate = $date->format('Y-m-d H:i:s');

//LOAN 테이블에서 유저아이디를 하나의 행으로 조회한다.
$sql = mq("select * from loan where user_id ='".$user_id."' ");
$sql->fetch_array();

$list = mq("SELECT title,author,publisher, loan_date as 빌린날짜, genre, file, return_date from book, loan where book.book_id = loan.book_id and loan.user_id ='".$user_id."'");
$loancheck = $list->fetch_array();

if(($nowDate - $loancheck['return_date']) == 0 )
{
  $delete = mq("DELETE FROM loan WHERE book.book_id = loan.book_id and loan.user_id ='".$user_id."'");
}


echo "<h1>책 대여 리스트</h1>";
if ($sql->num_rows > 0) {
    while($result = $list->fetch_array())
    {?>
      <!DOCTYPE html>
      <html lang="ko" dir="ltr">
        <head>
          <meta charset="utf-8">
          <title></title>
        </head>
        <body>
          <table border="1">
            <tr>
              <th>제목</th>
              <th>저자</th>
              <th>출판사</th>
              <th>빌린날짜</th>
              <th>장르</th>
              <th>자동반납날짜</th>
          </tr>
            <tr>
              <td><?=$result['title'] ?></td>
              <td><?=$result['author'] ?></td>
              <td><?=$result['publisher'] ?></td>
              <td><?=$result['빌린날짜'] ?></td>
              <td><?=$result['genre'] ?></td>
              <td><?=$result['return_date'] ?></td>
          </table>
        </body>
      </html>

      <?php
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
