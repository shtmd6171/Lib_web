<?php
/* 이 곳은 사용자, 관리자 모두 접속할 수 있는 페이지이다.
사용자는 review.php에서 서평을 등록할 수 있고
이 페이지는 등록하고 싶은 서평을 적는 곳이다.
*/

include "../lib/db.php";

/* 서평은 테이블 내부에서
book_id와 user_id를 모두 필요로 한다.
누가 썼는지 알아야되고, 어떤 책의 대한 서평인지 알아야하기 때문.
그렇기에 이 두 정보를 모두 받고 hidden 타입으로 $_POST 값에 집어넣는다.
*/
$book_id = $_GET['id'];
if(isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else { ?>

  <script>
    alert("먼저 로그인 해주세요");
    location.href = "../log/login.php";
  </script>

<?php } ?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>REVIEW WRITE</h1>
    <form  action="./review_write_process.php" enctype="multipart/form-data" method="post">
      <p>
        <input type="hidden" name="user_id" value="<?= $user_id ?>">
      </p>
      <p>
        <input type="hidden" name="book_id" value="<?= $book_id ?>">
      </p>
      <p>
        <input type="text" name="review_title" placeholder="title">
        <select name="review_rating" value="">
          <option value="5">5점</option>
          <option value="4">4점</option>
          <option value="3">3점</option>
          <option value="2">2점</option>
          <option value="1">1점</option>
        </select>
      </p>
      <p>
       <textarea name="review_desc" rows="12" cols="80" placeholder="description"></textarea>
      </p>
      <input type="submit">
    </form>
    <p><a href="./review.php?id=<?= $book_id ?>">돌아가기</a></p>
  </body>
</html>
