<?php
/* 이 곳은 책을 대여받은  리스트 보여주기 위한 사이트. */
include "../lib/db.php";
date_default_timezone_set('Asia/Seoul');
$user_id = $_SESSION['user_id'];
$nowDate = (new DateTime('NOW'));

//LOAN 테이블에서 유저아이디를 하나의 행으로 조회한다.
$sql = mq("select * from loan where user_id ='".$user_id."' ");


$list = mq("select title,author,publisher, loan_date as 대여, genre, file, return_date, book.book_id as bk_id from book, loan where book.book_id = loan.book_id and loan.user_id ='".$user_id."'");

?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="../css/bootstrap-theme.css">
  <script src="../css/js/bootstrap.js"></script>
  <title></title>
  <style>
  #myList{
    -webkit-box-flex: 0;
    -ms-flex: 0 0 23%;
    flex: 0 0 23%;
    max-width: 23%;
  }
  </style>
</head>
<body>
  <header class="blog-header py-3 sticky-top"></header>

<div class="row">
  <button onclick="goBack()">Go Back</button>

  <script>
  function goBack() {
    window.history.back();
  }
</script>
</div>


  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
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
      <!-- 돌아가기 복잡해서 붙인버튼 삭제예정 -->
      <button onclick="goBack()">Go Back</button>
      <script>function goBack() {window.history.back();}</script>
      <a href="../book/book_list.php">메인</a>

      <form class="form-inline my-2 my-lg-0 text-right" style="margin-left: 57%;">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </nav>
  </div>

  <div class="container">
    <div class="row">
      <?php if ($sql->num_rows > 0) {
        while($result = $list->fetch_array())
        {
          // diff 오브젝트를 사용하려면, DateTime() 클래스에서 diff 오브젝트를 사용해야한다.
          // diff 오브젝트는 DateInterval 오브젝트 또는 false를 나타낸다.
          // DateInterval 의 format table은 아래와 같다.
          // https://www.php.net/manual/en/dateinterval.format.php
          // %r는 음수의 경우 "-""를 나타낸다.
          // %D는 00일 을 나타낸다. ex 01일, 13일
          // %H는 00시간, %I는 00분, %S는 00초

         $substr_resultDate = substr($result['return_date'],0);
         $resultDate = new DateTime($substr_resultDate);

         $remainDate = $nowDate->diff($resultDate);
         $interval_remainDate = $remainDate->format('%r%D%H%I%S');

         // interval format 의 형태가 0보다 크다면, 그대로 진행
         // 0이거나 0보다 작다면, 해당 데이터 loan 테이블에서 삭제. (자동 반납)
         if($interval_remainDate>0)
         {

         }
         else{
            $delete = mq("DELETE FROM loan WHERE book_id ='".$result['bk_id']."' AND user_id ='".$user_id."'");
          }?>

          <div class="col-3 mb-5">
            <div class="card mb-1" style="width: 18rem;">
              <img class="card-img-top" src="../file/resize/<?= $result['file']; ?>" alt="Card image cap">
              <div class="card-body"><!--f-->
                <h5 class="card-title"><?=$result['title'] ?></h5>
                <p class="card-text"><?=$result['author'] ?></p>
                <p class="card-text"><?=$result['publisher'] ?></p>
                <p class="card-text"><?=$result['대여'] ?></p>
                <p class="card-text"><?=$result['genre'] ?></p>
                <p class="card-text">자동반납 날짜:<?=$result['return_date'] ?></p>
                <p class="card-text">반납까지 남은 날짜:<?=$remainDate->format('%r%D일 %H시간 %I분 %S초');?></p>
                <a href="#" class="btn btn-primary">감상하기</a>
                <!-- 감상 페이지 링크 -->
                <a href="#" class="btn btn-primary">구매하기</a>
                <!-- 구매 페이지 링크 -->
                <a href="#" class="btn btn-primary">리뷰쓰기</a>
                <!-- 리뷰 페이지 링크 -->
              </div>
            </div>
          </div>
        <?php $value--;  }  } else {?>
          <div class="row">
            대여한 책이 없습니다.&nbsp&nbsp&nbsp&nbsp
            <a href="../book/book_list.php"> 책 구경하러가기 </a>
          </div>
          <<?php  } ?>
        </div>
      </div>
    </body>
    </html>
