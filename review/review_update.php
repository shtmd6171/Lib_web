<?php

/* 이 곳은 사용자, 관리자 모두 접속할 수 있는 페이지이다.
사용자는 review.php 또는 review_board.php에서 서평을 수정할 수 있고
이 페이지는 수정하고 싶은 서평을 적는 곳이다.

이 페이지에서는 서평을 등록할 때와는 달리 user_id를 필요로 하지는 않는다.
작성한 사용자가 수정될 일은 없기 때문.
*/

include "../lib/db.php";

$review_id = $_GET['review'];
$sql = mq("select * from book_review where review_id ='".$review_id."'");
$reviewlist = $sql->fetch_array();

?>

<!-- <!DOCTYPE html>
<html lang="ko" dir="ltr">
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>

<form  >
<table table width="200" cellpadding="5" cellspacing="2" border="1" align="center">
<tr>
<td><input type="hidden" name="book_id" value="<?=$reviewlist['book_id']?>"></td>
<td><input type="hidden" name="review_id" value="<?=$review_id?>"></td>
</tr>
<tr>
<td>Title <input type="text" name="title" value="<?= $reviewlist['review_title'] ?>"></td>
</tr>
<tr>
<td>Description <textarea name="review_desc" rows="12" cols="80"><?= $reviewlist['review_desc'] ?></textarea></td>
</tr>
<tr> -->
<!DOCTYPE html>
<html lang="ko" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="../css/bootstrap-theme.css">
  <script src="../css/js/bootstrap.js"></script>
  <title></title>
</head>
<body>
  <div class="row">
    <!-- 돌아가기 복잡해서 붙인버튼 삭제예정 -->
    <button onclick="goBack()">Go Back</button>
    <script>function goBack() {window.history.back();}</script>
    <a href="../book/book_list.php">메인</a>
  </div>

  <header class="blog-header py-3 sticky-top"></header>

  <!-- 모달로 바꾸기 / 별점 추가하기-->
  <div class="container">
    <div class="row">
      <h1>리뷰 수정하기</h1>
    </div>
    <div class="row">
      <form  action="./review_update_process.php" enctype="multipart/form-data" method="post">
        <div class="form-group">
          <input type="hidden" name="book_id" value="<?=$reviewlist['book_id']?>">
          <input type="hidden" name="review_id" value="<?=$review_id?>">
        </div>
        <div class="form-group">
          <label>Title</label>
          <input class="form-control form-control-lg" type="text" name="title" value="<?= $reviewlist['review_title'] ?>">

        </div>
        <div class="form-group">
          <label>Description</label>
          <textarea class="form-control" name="review_desc" rows="12" cols="80"><?= $reviewlist['review_desc'] ?></textarea>
        </div>

        <div class="form-group">
          <input type="submit" value="등록">
        </div>

      </form>
    </div>
  </div>

</body>
</html>

</body>
</html>
