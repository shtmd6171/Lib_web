<!-- 뭐하는 페이지임????????? 모르겟음,,, -->
<?php

include "../lib/db.php";

$comment_id = $_GET['comment'];

$sql = mq("SELECT * FROM comment, user WHERE comment_id ='".$comment_id."'
  AND comment.user_id = user.user_id ");
  $commentlist = $sql->fetch_array();

  ?>

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
    <header class="blog-header py-3 sticky-top"></header>
    <div class="container">

      <div class="row">
        <button onclick="goBack()">Go Back</button>
        <script>function goBack() {window.history.back();}</script>
        <a href="../book/book_list.php">메인</a>
      </div>

      <div class="row">
        <h1>COMMENT UPDATE WRITE</h1>
      </div>

      <div class="row">
        <form  action="./comment_update_process.php" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <input type="hidden" name="comment_id" value="<?=$commentlist['comment_id']?>">
            <input type="hidden" name="review_id" value="<?=$commentlist['review_id']?>">
          </div>

            <div class="form-group">
              Writer &nbsp&nbsp&nbsp&nbsp
              <input type="text" name="writer" value="<?= $commentlist['name'] ?>" readonly>
            </div>

            <div class="form-group">
              Description
              <textarea class="form-control" name="comm_description" rows="12" cols="80"><?= $commentlist['comm_description'] ?> </textarea>
            </div>

            <div class="form-group">
              <input type="submit" value="등록">
            </div>
        </form>
      </div>
    </div>
  </body>
  </html>
