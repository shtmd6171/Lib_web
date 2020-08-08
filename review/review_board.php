<?php
/* 이 곳은 서평의 자세한 정보를 보기 위한 페이지이다.
이 페이지에서는 서평 정보를 한 페이지 전체에 걸쳐 확인할 수 있으며
서평을 수정, 식제할 수 있다.
또한 작성된 댓글을 보거나 작성할 수 있다.

이 페이지의 원리는 review.php와 거의 흡사하므로 주석은 자세히 달지 않는다.
전체적인 개요는..
처음 sql문에서는 서평의 정보를
아래 while문부터는 댓글의 대한 출력을 나타낸다.
*/
include_once "../lib/db.php";

$user_id = $_SESSION['user_id'];
$review_id = $_GET['review'];

$sql = mq("select * from user where user_id ='".$user_id."'");
$codecheck = $sql->fetch_array();

$sql = mq("select * from book_review where user_id ='".$user_id."'");
if($sql->num_rows == 0) {
  $reviewcheck = NULL;
} else {
  $reviewcheck = $sql->fetch_array();
}

?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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
          // 현재 댓글 정보를 불러오는데, 댓글을 작성한 사용자의 ID가 아닌
          // name을 불러오기 위해서 join을 통해 sql문을 생성했다.
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
            <?php
            if($reviewcheck != NULL) {
            // review.php에서 뿐만아니라, 서평을 자세히 보는 현재 이 페이지(review_board.php)에서도
            // 서평을 수정하거나, 삭제할 수 있게 조건문과 기능을 추가했다.
            if($filtered['user_id'] == $reviewcheck['user_id'] || $codecheck['code'] == 'A') {?>
            <td><a href="./review_update.php?review=<?= $_GET['review'] ?>">수정</a> </td>
            <td><a href="./review_delete_process.php?review=<?= $filtered['review_id'] ?>">삭제</a> </td>
            <?php  }
            } ?>
            <!-- 댓글을 작성하게 되면 실제 작성 기능은 comment_process.php에서 수행된다. -->
            <form action="../comment/comment_process.php" method="post">
              <input type="hidden" name="review_id" value="<?= $filtered['review_id'] ?>">
              <input type="hidden" name="user_id" value="<?= $filtered['user_id'] ?>">
              <textarea name="desc" rows="8" cols="80" placeholder="댓글 입력"></textarea>
              <input type="submit" value="등록">
            </form>
                  <p><a href="./review.php?id=<?=$filtered['book_id'] ?>">돌아가기</a></p>

  </body>
  </html>
