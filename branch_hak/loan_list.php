<?php
/* 이 곳은 책을 대여받은  리스트 보여주기 위한 사이트. */
include "../lib/db.php";
$user_id = $_SESSION['user_id'];
$date = new DateTime('NOW');
$nowDate = $date->format('Y-m-d H:i:s');

//LOAN 테이블에서 유저아이디를 하나의 행으로 조회한다.
$sql = mq("select * from loan where user_id ='".$user_id."' ");

$list = mq("select title,author,publisher, loan_date as 빌린날짜, genre, file, return_date from book, loan where book.book_id = loan.book_id and loan.user_id ='".$user_id."'");

// if(($nowDate - $loancheck['return_date']) == 0 )
// {
//   $delete = mq("DELETE FROM loan WHERE book.book_id = loan.book_id and loan.user_id ='".$user_id."'");
// }

?>

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
        <div class="row">

          <h1>책 대여 리스트</h1>
        </div>

        <?php $value = $sql->num_rows ;
        if ($value >= 0 ) {
          while( $result = $list->fetch_array()) { ?>

        <div class="card" style="width: 18rem;">
          <!--일단 카드형으로 만들어보긴 했는데, 메인 페이지처럼 갯수별로 불러오는 백엔드 할 수 있을까요?-->
          <img class="card-img-top" src="../file/resize/resizing_<?=$result['file'];  ?>" alt="Card image cap" width="250" height="250">
          <div class="card-body">
            <h5 class="card-title"><?=$result['title'] ?></h5>
            <p><?php echo $result['file'];  ?></p>
            <p class="card-text"><?=$result['author'] ?></p>
            <p class="card-text"><?=$result['publisher'] ?></p>
            <p class="card-text"><?=$result['빌린날짜'] ?></p>
            <p class="card-text"><?=$result['genre'] ?></p>
            <a href="#" class="btn btn-primary">반납하기</a>
          </div>
        </div>
      <?php  $value--; }  } else {
       echo "대출 리스트가 존재하지 않습니다.";
     } ?>

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
</div>
