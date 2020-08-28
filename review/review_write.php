<?php
/* 이 곳은 사용자, 관리자 모두 접속할 수 있는 페이지이다.
사용자는 review.php에서 리뷰를 등록할 수 있고
이 페이지는 등록하고 싶은 리뷰를 적는 곳이다.
*/

include "../lib/db.php";

/* 서평은 테이블 내부에서
book_id와 user_id를 모두 필요로 한다.
누가 썼는지 알아야되고, 어떤 책의 대한 서평인지 알아야하기 때문.
그렇기에 이 두 정보를 모두 받고 hidden 타입으로 $_POST 값에 집어넣는다.
*/

/*2020-08-27~28
inseon todo
리뷰 페이지들 구성을 정확히 모르겠음. 후일 설명요망.
모든 div class row에 mb부여할 것. 다 붙어버렸음
review_에서 review_write로 들어와 back누르면 review로 돌아오는데 정상인가요?
참고 - https://bootsnipp.com/snippets/PjPa
*/

$book_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
<head>
  <meta charset="utf-8">
  <link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/bootstrap-theme.css">
  <script src="../css/js/bootstrap.js"></script>
  <title></title>
</head>
<body>
  <header class="blog-header py-3 sticky-top"></header>
  <div class="container">
    <div class="row">
      <h1>REVIEW WRITE</h1>
    </div>
    <div class="row">
      <form  action="./review_write_process.php" enctype="multipart/form-data" method="post">
        <div class="row">
          <input type="hidden" name="user_id" value="<?= $user_id ?>">
        </div>

        <div class="row">
          <input type="hidden" name="book_id" value="<?= $book_id ?>">
        </div>

        <div class="row">
          <input type="text" name="review_title" placeholder="title">
          <select name="review_rating" value="">
            <option value="5">5점</option>
            <option value="4">4점</option>
            <option value="3">3점</option>
            <option value="2">2점</option>
            <option value="1">1점</option>
          </select>
        </div>

        <div class="row">
          <textarea name="review_desc" rows="12" cols="80" placeholder="description"></textarea>
        </div>
        <div class="row">
          <input type="submit" value="저장하기">
        </div>
      </form></div>
    <div class="row">
        <a href="./review.php?id=<?= $book_id ?>">돌아가기</a>
    </div>
  </div>
</body>
</html>
