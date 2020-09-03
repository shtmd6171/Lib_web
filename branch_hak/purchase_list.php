<?php
/* 이 곳은 책을 구매  리스트 보여주기 위한 사이트. */
include "../lib/db.php";
$user_id = $_SESSION['user_id'];

//purchase 테이블에서 유저아이디를 하나의 행으로 조회한다.
$sql = mq("select * from purchase where user_id ='".$user_id."' ");
$sql->fetch_array();

$list = mq("select title,author,publisher, purchase_date as 구매날짜, genre, file from book,
purchase where book.book_id = purchase.book_id and purchase.user_id ='".$user_id."'");


// codecheck 쿼리를 실행해서 값이 존재하면 else 문으로 ..
// 쿼리를 실행해서 값이 존재하지 않으면  if문 실행
// 쿼리를 실행했는데 값이 존재하지 않는다는 것은 DB에 데이터가 없다는 라는 말.
// 고로 대출 한 데이터가 없다라는 것임.
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap-theme.css">
  <script src="../bootstrap/dist/js/bootstrap.js"></script>
  <title></title>
  <style media="screen">
  #myLibraryCard{
    -webkit-box-flex: 0;
    -ms-flex: 0 0 22%;
    flex: 0 0 22%;
    max-width: 22%;
  }
  </style>
</head>

<body>
  <header class="blog-header py-3 sticky-top w-100"></header>

  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <p class="navbar-brand">내 서재</p>

    <div class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item">
          <a class="nav-link" href="./purchase_list.php">구매</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./loan_list.php">대여</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./favorite_list.php">찜</a>
        </li>

      </ul>
      <!-- 뒤로 돌아가기 귀찮아 냅두는 버튼입니다 헤더 완성되면 가차없이 버릴거릴거예요 개못생김 -->
      <button onclick="goBack()">Go Back</button>
      <script>function goBack() {window.history.back();}</script>

      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <div class="container">
    <div class="col-12">
      <div class="row">
        <?php
        if ($sql->num_rows > 0) {
          while($result = $list->fetch_array())
          {?>

            <div id="myLibraryCard"class="card col-3 mb-5 mx-3" style="width: 18rem;">

              <img class="card-img-top" src="../file/resize/<?= $result['file']; ?>" alt="BookCover">
              <div class="card-body">
                <h5 class="card-title"><?=$result['title'] ?></h5>
                <p class="card-text"><?=$result['author'] ?></p>
                <p class="card-text"><?=$result['publisher'] ?></p>
                <p class="card-text"><?=$result['구매날짜'] ?></p>
                <p class="card-text"><?=$result['genre'] ?></p>
                <!-- 버튼 크기 조정하기 -->
                <a href="#" class="btn btn-primary">바로읽기</a>
                <!-- 감상페이지로 넘어가기 -->
                <a href="#" class="btn btn-primary">리뷰작성</a>
                <!-- ../review/review_write.php?id=n(book_id)-->
              </div>
            </div>

            <?php}
          }else {?>
            <div class="row">
              찜한 책이 없습니다.";
              책을 둘러보러 가시겠습니까?";
            </div>
            <?}?>
          </div>
        </div>
      </div>
  </body>
</html>
