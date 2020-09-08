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
// ini_set('display_errors','0'); //비 로그인시 나오는 에러 무시 -학현-
//페이지를 다시 만드는게 속편할듯



$review_id = $_GET['review'];

if(isset($user_id)){
  $user_id = $_SESSION['user_id'];


  $sql = mq("select * from user where user_id ='".$user_id."'");
  $codecheck = $sql->fetch_array();

  $sql = mq("select * from book_review where user_id ='".$user_id."'");
  if($sql->num_rows == 0) {
    $reviewcheck = NULL;
  } else {
    $reviewcheck = $sql->fetch_array();
  }
} else{
  $reviewcheck = NULL;
  $codecheck = NULL;
}

?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="../css/bootstrap-theme.css">
  <script src="../css/js/bootstrap.js"></script>
  <title></title>
  <style media="screen">
  td {
    width: 90%;
  }

  #myCard {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border-radius: 0.25rem;
  }
  </style>
</head>

<body>
  <div class="row">
    <!-- 돌아가기 복잡해서 붙인버튼 삭제예정 -->
    <button onclick="goBack()">Go Back</button>
    <script>function goBack() {window.history.back();}</script>
    <a href="../book/book_list.php">메인</a>
  </div>

  <header class="blog-header py-3 sticky-top"></header>
  <div class="container">

    <div class="row">
      <h1>BOOK REVIEW</h1>
    </div>
    <div class="row">
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

    </div>

    <div class="row mb-5">
      <div id="mycard">
        <div class="title h5">
          <p><?= $filtered['review_title'] ?></p>
        </div>
        <h6 class="text-muted time"><?= $filtered['name'] ?></h6>
        <div class="row">
          <p><?= $filtered['review_desc'] ?></p>
        </div>
      </div>
    </div>

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
        'comment_id' => htmlspecialchars($commentlist['comment_id']),
        'comm_description' => htmlspecialchars($commentlist['comm_description']),
        'name' => htmlspecialchars($commentlist['name']));?>

        <div class="row">

          <table class="table">
            <tbody>
            <tr class="value">
                <th>Comment</th>
                <td><p><?= $commfiltered['comm_description'] ?></p></td>
                <th>Writer</th>
                <td><p><?= $commfiltered['name'] ?></p></td>
                <?php
                if($codecheck !=NULL){
                  if(isset($user_id)|| $codecheck['code'] == 'A') {?>
                    <td><a href="../branch_hak/comment_update.php?comment=<?= $commfiltered['comment_id'] ?>">수정</a> </td>
                    <td><a href="../branch_hak/comment_delete_process.php?comment=<?= $commfiltered['comment_id']  ?>">삭제</a> </td>
                  <?php }} ?>
                </tr>
              </tbody>
            </table>
          <?php } ?>
        </div>
        <div class="row">

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
        </div>

        <div class="row">
          <form action="../comment/comment_process.php" method="post">
            <div class="form-group">
              <input type="hidden" name="review_id" value="<?= $filtered['review_id'] ?>">
              <input type="hidden" name="user_id" value="<?= $filtered['user_id'] ?>">
            </div>
            <div class="row">
              <label class="comment">댓글 작성하기</label>
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="8" cols="80" placeholder="댓글 입력" required></textarea>
            </div>
            <div class="form-group">
            <input type="submit" value="등록">
            </div>
          </form>
        </div>
        <div class="row">
          <a href="./review.php?id=<?=$filtered['book_id'] ?>">돌아가기</a>
        </div>
      </div>
    </body>
    </html>
