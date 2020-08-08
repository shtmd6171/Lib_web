<?php
/* 이 곳은 관리자만 접속할 수 있는 페이지이다.
관리자는 book_list.php에서 책을 등록할 수 있고
이 페이지는 등록하고 싶은 책의 정보를 적는 곳이다.
*/

include "../lib/db.php";
?>


<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>WRITE</h1>
    <form  action="./book_write_process.php" enctype="multipart/form-data" method="post">
      <p>
        <input type="text" name="title" placeholder="title">
      </p>
      <p>
        <input type="text" name="author" placeholder="author">
      </p>
      <p>
        <input type="text" name="publisher" placeholder="publisher">
      </p>
      <p>
        <input type="date" name="the_date">
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
        <input type="file" name="lo_image_link" value="1">
      </p>
      <input type="submit">
    </form>
    <p><a href="./book_list.php">돌아가기</a></p>
  </body>
</html>
