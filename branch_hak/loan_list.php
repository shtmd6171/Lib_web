<?php
/* 이 곳은 책을 대여받은  리스트 보여주기 위한 사이트. */
include "../lib/db.php";
$user_id = $_SESSION['user_id'];

//LOAN 테이블에서 유저아이디를 하나의 행으로 조회한다.
$sql = mq("select * from loan where user_id ='".$user_id."' ");
$sql->fetch_array();

$list = mq("select title,author,publisher, loan_date as 빌린날짜, genre, file from book, loan where book.book_id = loan.book_id and loan.user_id ='".$user_id."'");


// codecheck 쿼리를 실행해서 값이 존재하면 else 문으로 ..
// 쿼리를 실행해서 값이 존재하지 않으면  if문 실행
// 쿼리를 실행했는데 값이 존재하지 않는다는 것은 DB에 데이터가 없다는 라는 말.
// 고로 대출 한 데이터가 없다라는 것임.

/*2020-08-27~28
  inseon todo
  네비게이션 바 간격 더 주고싶다
  flex
  카드 크기 줄이기(가능?)
  서치창 끝으로 밀기
  반납하기랑 리뷰쓰기 버튼 양끝으로 밀기, 버튼 크기 통일시키기
  카드 배치에 열주기
*/
?>

<<<<<<< HEAD


=======
<!DOCTYPE html>
<html lang="ko" dir="ltr">
<head>
  <meta charset="utf-8">
  <link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/bootstrap-theme.css">
  <script src="../css/js/bootstrap.js"></script>
  <title></title>
</head>
<body>
  <div class="container">
    <header class="blog-header py-3 sticky-top"></header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link" href="./loan_list.php">대여한 책</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./purchase_list.php">구매한 책</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./favorite_list.php">찜 목록</a>
          </li>

        </ul>

        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

      </div>
    </nav>
    <div class="row">
      책 대여 리스트
    </div>
    <div class="row">
    <div class="col-md-3"> <!--카드를 col 3씩 줘서 row당 4개씩 배치하고 싶은데 어렵네요-->
    <?php if ($sql->num_rows > 0) {
      while($result = $list->fetch_array())
      {?>
>>>>>>> 6d4aab9c17d91ebf08413ba881ba9b0f723ab913
        <div class="card" style="width: 18rem;"> <!--일단 카드형으로 만들어보긴 했는데, 메인 페이지처럼 갯수별로 불러오는 백엔드 할 수 있을까요?-->
          <img class="card-img-top" src="../file/<?= $result['file']; ?>" alt="Card image cap" width="250" height="250">
          <div class="card-body">
            <h5 class="card-title"><?=$result['title'] ?></h5>
            <p class="card-text"><?=$result['author'] ?></p>
            <p class="card-text"><?=$result['publisher'] ?></p>
            <p class="card-text"><?=$result['빌린날짜'] ?></p>
            <p class="card-text"><?=$result['genre'] ?></p>
            <a href="#" class="btn btn-primary">반납하기</a>
            <a href="#" class="btn btn-primary">리뷰 작성하기</a>
          </div>
        </div>
      <?php   }  } else {
<<<<<<< HEAD
=======
        echo "대여한 책이 없습니다.";
        echo "대여할 책을 둘러보러 가시겠습니까?";
      } ?>
    </div>
    </div>
    </div>
  </body>
  </html>
  <div class="row">
    <button onclick="goBack()">Go Back</button>

    <script>
    function goBack() {
      window.history.back();
    }
  </script>
>>>>>>> 6d4aab9c17d91ebf08413ba881ba9b0f723ab913
</div>
