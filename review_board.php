<?php
include_once "./lib/db.php";

$review_id = $_GET['review'];
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(function() {
        // $(".comment").on('click',function() {
        //   var value = $(".comment").text();
        //   if(value == "댓글 게시하기") {
        //   value = $(".comment").text("댓글 닫기");
        //   $(".comment_write").html('');
        // } else {
        //   $(".comment_write").html('');
        //   value = $(".comment").text("댓글 게시하기");
        // }
        // });
      });

    </script>
    <style media="screen">
      td {
        width: 90%;
      }
    </style>
  </head>
  <body>
    <h1>BOOK REVIEW</h1>
  <?php
      if(isset($review_id)) {
      $sql = mq("select * from book_review, user where review_id='".$review_id."'
        AND book_review.user_id = user.user_id");
      } else {
      // TO DO
      }
      $reviewlist = $sql->fetch_array();
      $filtered = array(
        'review_id' => htmlspecialchars($reviewlist['review_id']),
        'review_title' => htmlspecialchars($reviewlist['review_title']),
        'review_desc' => htmlspecialchars($reviewlist['review_desc']),
        'name' => htmlspecialchars($reviewlist['name']),
        'user_id' => htmlspecialchars($reviewlist['user_id']),
        'book_id' =>htmlspecialchars($reviewlist['book_id'])
      );?>
      <br>
      <table class="list" cellpadding="5" border="1" align="center">
      <tr class="value">
        <th>Title</th>
        <td><p><?= $filtered['review_title'] ?></p></td>
      </tr>
      <tr>
        <th>Description</th>
        <td><p><?= $filtered['review_desc'] ?></p></td>
      </tr>
      <tr>
        <th>Writer</th>
        <td><p><?= $filtered['name'] ?></p></td>
      </tr>
      </table>
      <?php
          if(isset($review_id)) {
          $sql = mq("select * from comment, user where review_id='".$review_id."'
            AND comment.user_id = user.user_id");

          } else {
          // TO DO
          }

          while($commentlist = $sql->fetch_array()){
            $commfiltered = array(
              'comm_description' => htmlspecialchars($commentlist['comm_description']),
              'name' => htmlspecialchars($commentlist['name']));?>

              <br>
              <table class="list" cellpadding="5" border="1" align="center">
              <tr class="value">
                <th>Comment</th>
                <td><p><?= $commfiltered['comm_description'] ?></p></td>
                <th>Writer</th>
                <td><p><?= $commfiltered['name'] ?></p></td>
              </tr>
              </table>
            <?php } ?>

            <p class="comment">댓글 게시하기</p>
            <form action="comment_process.php" method="post">
              <input type="hidden" name="review_id" value="<?= $filtered['review_id'] ?>">
              <input type="hidden" name="user_id" value="<?= $filtered['user_id'] ?>">
              <textarea name="desc" rows="8" cols="80" placeholder="댓글 입력"></textarea>
              <input type="submit" value="등록">
            </form>
                  <p><a href="./review.php?id=<?=$filtered['book_id'] ?>">돌아가기</a></p>

  </body>
  </html>
