<?php
include "./lib/db.php";
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>WRITE</h1>
    <form  action="./write_process.php" enctype="multipart/form-data" method="post">
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
        <option value="1">문학</option>
        <option value="2">인문/사회</option>
        <option value="3">자기계발</option>
        <option value="4">비즈니스/경제</option>
        <option value="5">라이프스타일</option>
        <option value="6">만화</option>
        <option value="7">과학</option>
        <option value="8">컴퓨터</option>
        <option value="9">수험서/자격증</option>
        <option value="10">예술/대중문화</option>
        <option value="11">외국</option>
        <option value="12">오디오북</option>
        <option value="13">기타</option>
      </select>
      <p>
        <input type="file" name="lo_image_link" value="1">
      </p>
      <input type="submit">
    </form>
    <p><a href="./viewAll.php">돌아가기</a></p>
  </body>
</html>
