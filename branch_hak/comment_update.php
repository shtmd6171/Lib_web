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
    <title></title>
  </head>
  <body>
    <h1>COMMENT UPDATE WRITE</h1>
    <form  action="./comment_update_process.php" enctype="multipart/form-data" method="post">
     <table table width="200" cellpadding="5" cellspacing="2" border="1" align="center">
       <tr>
         <td><input type="hidden" name="comment_id" value="<?=$commentlist['comment_id']?>"></td>
         <td><input type="hidden" name="review_id" value="<?=$commentlist['review_id']?>"></td>
       </tr>
       <tr>
          <td>Writer <input type="text" name="writer" value="<?= $commentlist['name'] ?>" readonly></td>
       </tr>
       <tr>
          <td>Description <textarea name="comm_description" rows="12" cols="80"><?= $commentlist['comm_description'] ?></textarea></td>
       </tr>
       <tr>
         <td align="right"><input type="submit" value="등록"></td>
       </tr>
     </table>
    </form>
    <button onclick="goBack()">Go Back</button>

    <script>
    function goBack() {
      window.history.back();
    }
    </script>
  </body>
</html>
