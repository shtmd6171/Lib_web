<?php
/* 이 곳은 관리자만 접속할 수 있는 페이지이다.
관리자는 book_list.php에서 각 책을 수정 삭제할 수 있고
이 페이지는 수정하고 싶은 책의 정보를 적는 곳이다.
*/

include "../lib/db.php";

/* 이 페이지로 넘어오면 book_list를 통해서 현재 내가 고른 책의 id를 가진 URL로 이동하게 된다.
우리는 현재 우리가 보고 있는 이 책의 id를 얻음으로써, 다른 정보들을 얻거나, 수정하거나 삭제할 수 있다.
*/
$book_id = $_GET['id'];
// 현재 책의 정보를 가져오고 $booklist를 생성했다.
$sql = mq("select * from book where book_id ='".$book_id."'");
$booklist = $sql->fetch_array();
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>UPDATE WRITE</h1>
    <!-- 내가 submit버튼을 누르게 되면 book_update_process.php로 내가 수정하고 싶은 정보와 같이 이동하게 된다 -->
    <form  action="./book_update_process.php" enctype="multipart/form-data" method="post">
      <p>
        <!-- 현재 내가 보는 book_id 값은 PK로 수정되어서는 안되지만, 값을 수정하기 위해서는 필요한 값이기도 하다.
         그렇기 때문에 hidden 타입을 통해, 사용자는 이 값을 실제로 볼 수는 없지만, $_POST를 통해 값을 넘길 수 있다. -->
        <input type="hidden" name="id" value="<?= $book_id?>">
      </p>
      <p>
        <input type="text" name="title" value="<?= $booklist['title'] ?>">
      </p>
      <p>
        <input type="text" name="author" value="<?= $booklist['author'] ?>">
      </p>
      <p>
        <input type="text" name="publisher" value="<?= $booklist['publisher'] ?>">
      </p>
      <p>
        <input type="date" name="the_date" value="<?= $booklist['the_date'] ?>">
      </p>
      <select name="genre">
        <option value="">장르선택</option>
        <option value="문학">문학</option>
        <option value="인문/사회">인문/사회</option>
        <option value="자기계발">자기계발</option>
        <option value="비즈니스/경제">비즈니스/경제</option>
        <option value="라이프스타일">라이프스타일</option>
        <option value="만화">만화</option>
        <option value="과학">과학</option>
        <option value="컴퓨터">컴퓨터</option>
        <option value="수험서/자격증">수험서/자격증</option>
        <option value="예술/대중문화">예술/대중문화</option>
        <option value="외국">외국</option>
        <option value="오디오북">오디오북</option>
        <option value="기타">기타</option>
      </select>
      <p>
        <input type="file" name="lo_image_link">
      </p>
      <input type="submit">
    </form>
    <p><a href="./book_list.php">돌아가기</a></p>
  </body>
</html>
