<?php
include "./lib/db.php";
$book_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = mq("select * from user where user_id ='".$user_id."'");
$codecheck = $sql->fetch_array();

$sql = mq("select * from book_review where user_id ='".$user_id."'");
$reviewcheck = $sql->fetch_array();

?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>BOOK REVIEW</h1>

    <form method="post">
      <select name="selected">
        <option value="review_title">제목</option>
        <option value="name">작성자</option>
        <option value="review_desc">내용</option>
      </select>
      <input type="text" name="search" placeholder="검색내용">
      <input type="submit" value="검색">
    </form>
    <?php
    if(isset($book_id)) {
    $sql = mq("select * from book where book_id='".$book_id."'");
    } else {
     // TO DO
    }
    while($booklist = $sql->fetch_array()){
      $filtered = array(
        'book_id' => htmlspecialchars($booklist['book_id']),
        'title' => htmlspecialchars($booklist['title']),
        'author' => htmlspecialchars($booklist['author']),
        'publisher' => htmlspecialchars($booklist['publisher']),
        'the_date' => htmlspecialchars($booklist['the_date']),
        'genre' => htmlspecialchars($booklist['genre']),
        'file' => htmlspecialchars($booklist['file'])
      );?>
      <a href="./review_write.php?id=<?= $filtered['book_id']?>">서평 작성</a>
      <table class="list" cellpadding="5" border="1" align="center">
      <tr class="tltle">
        <th>Title</th>
        <th>Author</th>
        <th>Publisher</th>
        <th>The_Day</th>
        <th>Genre</th>
        <th>Image</th>
        <th>담아두기</th>
      </tr>
      <tr class="value">
        <td><p><?= $filtered['title'] ?></p></td>
        <td><p><?= $filtered['author'] ?></p></td>
        <td><p><?= $filtered['publisher'] ?></p></td>
        <td><p><?= $filtered['the_date'] ?></p></td>
        <td><p><?= $filtered['genre'] ?></p></td>
        <td><p><img src="./file/<?= $filtered['file'] ?>" alt="이미지 없음"></p></td>
      </tr>
      </table>
    <?php   }
      if(isset($book_id)&&(!(isset($_POST['selected'])))) {
      $sql = mq("select * from book_review, user where book_id='".$book_id."'
      AND book_review.user_id = user.user_id");
      } else if(isset($book_id)&&((isset($_POST['selected'])))) {
        $sql = mq("select * from book_review, user where book_id='".$book_id."'
        AND book_review.user_id = user.user_id AND ".$_POST['selected']." LIKE '%".$_POST['search']."%'");
      }

      while($reviewlist = $sql->fetch_array()){
        $filtered = array(
          'review_id' => htmlspecialchars($reviewlist['review_id']),
          'review_title' => htmlspecialchars($reviewlist['review_title']),
          'review_desc' => htmlspecialchars($reviewlist['review_desc']),
          'user_id' => htmlspecialchars($reviewlist['user_id']),
          'name' => htmlspecialchars($reviewlist['name'])
        );?>
        <br>
        <table class="list" cellpadding="5" border="1" align="center">
        <tr class="tltle">
          <th>Title</th>
          <th>Description</th>
          <th>Writer</th>
          <th>보기</th>
        </tr>
        <tr class="value">
          <td><p><?= $filtered['review_title'] ?></p></td>
          <td><p><?= $filtered['review_desc'] ?></p></td>
          <td><p><?= $filtered['name'] ?></p></td>
          <td><a href="./review_board.php?review=<?= $filtered['review_id'] ?>">보기</a> </td>
          <!-- 자신 것만 수정 삭제 -->
          <?php if($codecheck['user_id'] == $reviewcheck['user_id'] && $filtered['user_id'] == $reviewcheck['user_id'] || $codecheck['code'] == 'A') {?>
          <td><a href="./review_board.php?review=<?= $filtered['review_id'] ?>">수정</a> </td>
          <td><a href="./review_board.php?review=<?= $filtered['review_id'] ?>">삭제</a> </td>
          <?php } ?>
        </tr>
        </table>
      <?php } ?>
      <p><a href="./book_list.php">돌아가기</a></p>
  </body>
</html>
