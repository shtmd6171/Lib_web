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

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>REVIEW UPDATE WRITE</h1>
    <form  action="./review_update_process.php" enctype="multipart/form-data" method="post">
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
       <tr>
         <td align="right"><input type="submit" value="등록"></td>
       </tr>
     </table>
    </form>
    <p><a href="./review.php">돌아가기</a></p>
  </body>
</html>
