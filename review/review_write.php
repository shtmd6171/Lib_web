<?php
/* 이 곳은 사용자, 관리자 모두 접속할 수 있는 페이지이다.
사용자는 review.php에서 리뷰를 등록할 수 있고
이 페이지는 등록하고 싶은 리뷰를 적는 곳이다.
*/

include "../lib/db.php";

/* 서평은 테이블 내부에서
book_id와 user_id를 모두 필요로 한다.
누가 썼는지 알아야되고, 어떤 책의 대한 서평인지 알아야하기 때문.
그렇기에 이 두 정보를 모두 받고 hidden 타입으로 $_POST 값에 집어넣는다.
*/


$book_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
<head>
  <meta charset="utf-8">
  <link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet">
  <script src="../css/js/bootstrap.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <title></title>
  <style media="screen">
  .starR1{
    background: url('./review_lib/star.png') no-repeat -31px 0;
    background-size: auto 100%;
    width: 15px;
    height: 30px;
    float:left;
    text-indent: -9999px;
    cursor: pointer;
    color: yellow;
  }
  .starR2{
    background: url('./review_lib/star.png') no-repeat right 0px;
    background-size: auto 100%;
    width: 15px;
    height: 30px;
    float:left;
    text-indent: -9999px;
    cursor: pointer;
  }
  .starR1.on{background-position:0px 0;}
  .starR2.on{background-position:-15px 0;}
  </style>
  <script type="text/javascript">
    $(function(){
      $('.starRev span').click(function(){
    $(this).parent().children('span').removeClass('on');
    $(this).addClass('on').prevAll('span').addClass('on');
    return false;
    });

    $('.starR1').click(function(){
      var value = $(this).attr('value');
      console.log(value);
      $('.review_rating').attr('value',value);
    });
    $('.starR2').click(function(){
      var value = $(this).attr('value');
      console.log(value);
      $('.review_rating').attr('value',value);
    });
  });
  </script>
</head>
<body>
  <header class="blog-header py-3 sticky-top"></header>
  <div class="container">
    <div class="row">
      <h1>REVIEW WRITE</h1>
    </div>
    <div class="row">
      <form  action="./review_write_process.php" enctype="multipart/form-data" method="post">
        <div class="row">
          <input type="hidden" name="user_id" value="<?= $user_id ?>">
        </div>

        <div class="row">
          <input type="hidden" name="book_id" value="<?= $book_id ?>">
        </div>

        <div class="row d-flex">
          <input type="text" name="review_title" placeholder="title">
          <div class="starRev d-flex ml-2 mb-2 align-items-center justify-content-center">
            <div class="">평점&nbsp:&nbsp</div>
            <div class="">
              <span class="starR1 on" value="0.5"></span>
              <span class="starR2 on" value="1"></span>
              <span class="starR1" value="1.5"></span>
              <span class="starR2" value="2"></span>
              <span class="starR1" value="2.5"></span>
              <span class="starR2" value="3"></span>
              <span class="starR1" value="3.5"></span>
              <span class="starR2" value="4"></span>
              <span class="starR1" value="4.5"></span>
              <span class="starR2" value="5"></span>
            </div>

          </div>
          <input type="hidden" class="review_rating" name="review_rating" value="1">
        </div>

        <div class="row">
          <textarea name="review_desc" rows="12" cols="80" placeholder="description"></textarea>
        </div>
        <div class="row">
          <input type="submit" value="저장하기">
        </div>
      </form></div>
    <div class="row">
        <a href="./review.php?id=<?= $book_id ?>">돌아가기</a>
    </div>
  </div>
</body>
</html>
