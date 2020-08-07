<?php
include "./lib/db.php";
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
