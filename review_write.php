<?php
include "./lib/db.php";
$book_id = $_GET['id'];
$user_id = $_SESSION['user_id']; 

?>

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
        <input type="hidden" name="book_id" value="<?= $_GET['id'] ?>">
      </p>
      <p>
        <input type="text" name="review_title" placeholder="title">
      </p>
      <p>
       <textarea name="review_desc" rows="12" cols="80" placeholder="description"></textarea>
      </p>
      <input type="submit">
    </form>
    <p><a href="./review.php?id=<?= $book_id ?>">돌아가기</a></p>
  </body>
</html>
