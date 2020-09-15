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
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="../css/bootstrap-theme.css">
  <script src="../css/js/bootstrap.js"></script>
  <title></title>
</head>

<body>
  <header class="blog-header py-3 sticky-top"></header>
  <div class="container">
    <div class="row">
      <button onclick="goBack()">Go Back</button>
      <script>function goBack() {window.history.back();}</script>
      <a href="../book/book_list.php">메인</a>
    </div>

    <div class="row">
      <h1>WRITE</h1>
    </div>

    <div class="row">
      <form action="./book_write_process.php" enctype="multipart/form-data" method="post">
        <div class="form-group">
          <label>제목</label>
          <input class="form-control form-control-lg" type="text" name="title" placeholder="title" required>
        </div>

        <div class="form-group">
          <label>저자</label>
          <input type="text" name="author" placeholder="author">
        </div>

        <div class="form-group">
          <label>출판사</label>
          <input type="text" name="publisher" placeholder="publisher">
        </div>

        <div class="form-group">
          <label>등록일</label>
          <input type="date" name="the_date">
        </div>

        <div class="form-group" name="genre">
          <label>장르</label>
          <select class="form-control">
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
        </div>
<!-- 둘중에 어떤 모양이 괜찮을까 둘다 만들어봄 하나만 체크해야지 오류안떠요  -->
책 등록할때 둘 중에 하나만 체크하고 등록하세요
        <div class="form-group" name="genre">
          <label>장르</label>
          <select multiple class="form-control">
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
        </div>

        <div class="form-group">
          <label>책 표지 등록</label><br>
          <input type="file" name="lo_image_link" value="1">
        </div>

        <div class="form-group">
          <input type="submit" value="등록하기">
        </div>
      </form>
      <a href="./book_list.php">돌아가기</a>
    </div>
  </div>
</body>
</html>
