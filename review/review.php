<?php
/* 이 곳은 책의 자세한 정보를 보기 위한 페이지이다.
이 페이지에서는 책의 정보를 한 페이지 전체에 걸쳐 확인할 수 있으며
서평을 등록하는 페이지로 이동하거나,
작성된 서평의 간략한 정보를 확인할 수 있다.
*/

include "../lib/db.php";
// 현재 접속한 사용자의 아이디와 책의 아이디를 얻는다.
$book_id = $_GET['id'];
if(isset($_SESSION['user_id']))
{
  $user_id = $_SESSION['user_id'];


}

else
{
  $reviewcheck = NULL;
}
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
    $sql = mq("select * from book where book_id='".$book_id."'");
      <tr class="tltle">
        <th>Title</th>
        <th>Author</th>
        <th>Publisher</th>
        <th>The_Day</th>
        <th>Genre</th>
        <th>Image</th>
      </tr>
      <tr class="value">
        <td><p><?= $filtered['title'] ?></p></td>
        <td><p><?= $filtered['author'] ?></p></td>
        <td><p><?= $filtered['publisher'] ?></p></td>
        <td><p><?= $filtered['the_date'] ?></p></td>
        <td><p><?= $filtered['genre'] ?></p></td>
        <td><p><img src="../file/<?= $filtered['file'] ?>" alt="이미지 없음" width="200" height="200"></p></td>
      </tr>

    <?php
      $sql = mq("select * from book_review, user where book_id='".$book_id."'
      AND book_review.user_id = user.user_id");

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
          <!-- 서평의 수정 삭제하기 위해서는 관한 3가지 요건이 필요하다.

          1. 서평을 작성한 사용자는 게시글을 수정, 삭제할 수 있다.
          2. 서평을 작성하지 않은 사용자는 게시글을 수정, 삭제할 수 없다.
          3. 관리자는 1,2와 관계 없이 모든 게시글을 수정, 삭제할 수 있다.

          이 세 조건을 만족하기 위해서, if문을 통해서 조건을 준다.
          /* $filtered['user_id'] == $reviewcheck['user_id'] : while문을 통해 출력된 서평을 작성한 사용자의 ID와 현재 접속한 사용자의 ID가 같다.
          || $codecheck['code'] == 'A' : 또는 현재 접속한 사용자가 관리자라면..
          */
          if($filtered['user_id'] == $reviewcheck['user_id'] || $codecheck['code'] == 'A') { ?>
          <?php  }
</html>
