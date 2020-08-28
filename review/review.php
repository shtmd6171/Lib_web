<?php
/* 이 곳은 책의 자세한 정보를 보기 위한 페이지이다.
이 페이지에서는 책의 정보를 한 페이지 전체에 걸쳐 확인할 수 있으며
서평을 등록하는 페이지로 이동하거나,
작성된 서평의 간략한 정보를 확인할 수 있다.
*/

/*2020-08-27~28
inseon todo
ㅡㅡ review랑 riview_랑 헷갈려요 ㅡㅡ
페이지 디자인 상의좀 합시다 일단 제가 생각하는대로 임의로 레이아웃 배치했어요
대대공사 준비중
*/

include "../lib/db.php";
// 현재 접속한 사용자의 아이디와 책의 아이디를 얻는다.
$book_id = $_GET['id'];
if(isset($_SESSION['user_id']))
{
  $user_id = $_SESSION['user_id'];


  // 관리자, 사용자 구분을 위해 현재 사용자의 정보가 담긴 $codecheck 배열을 만든다.
  $sql = mq("select * from user where user_id ='".$user_id."'");
  $codecheck = $sql->fetch_array();

  // 현재 접속한 사용자가 작성한 서평은, 사용자 본인이 수정하거나 삭제할 수 있어야 한다.
  // 이것을 위해, 현재 접속한 사용자가 이 책의 관한 서평이 있는지 없는지 알아낸다.
  $sql = mq("select * from book_review where user_id ='".$user_id."'");
  /*만약 서평을 적지 않았을 경우 NULL 값으로 채워줘야한다.
  그렇지 않을경우 $reviewcheck의 배열을 사용하는 부분에서 오류가 출력된다.

  Q.왜요?
  A. 우선적으로, 사용자가 작성한 서평이 있다는 가정으로 sql문을 동작하기 때문에
  없을 경우 false가 반환되므로 $sql->f etch_array()를 실행하지 못해 오류가 나오는 것
  */

  if($sql->num_rows == 0) {
    $reviewcheck = NULL;
  } else {
    $reviewcheck = $sql->fetch_array();
  }
}

else
{
  $reviewcheck = NULL;
}
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
  <header class="blog-header py-3 sticky-top"></header>
  <h1>BOOK REVIEW</h1>

  <!-- book_list와 같이 검색기능을 구현한 부분이다.
  이 검색기능은 서평을 검색할 때 사용된다. -->
  <form method="post">
    <select name="selected">
      <option value="review_title">제목</option>
      <option value="name">작성자</option>
      <option value="review_desc">내용</option>
    </select>
    <input type="text" name="search" placeholder="검색내용">
    <input type="submit" value="검색">
  </form>
  <?php
  /* Q. 여기는 왜 isset()을 사용 했나요?
  A. 어차피 이 페이지는 $book_id를 가지지 않고서는 정상적으로 올 수 없는 페이지이다.
  그렇기 때문에 $book_id를 가지지 않았다는 것은 잘못된 방식으로 접속 했다는 의미이며
  우리는 else문을 통해 잘못된 방식으로 들어온 사용자를
  처리(다른 페이지로 보내거나, 안내 문구를 띄우거나)해줄 수 있다. */
  if(isset($book_id)) {
    $sql = mq("select * from book where book_id='".$book_id."'");
  } else {
    // 잘못된 경로를 통한 방문을 처리하는 부분
  }

  //이 부분은 선택한 척의 정보를 출력하기 위한 db 정보를 가져오는 부분이다.
  $booklist = $sql->fetch_array();
  $filtered = array(
    'book_id' => htmlspecialchars($booklist['book_id']),
    'title' => htmlspecialchars($booklist['title']),
    'author' => htmlspecialchars($booklist['author']),
    'publisher' => htmlspecialchars($booklist['publisher']),
    'the_date' => htmlspecialchars($booklist['the_date']),
    'genre' => htmlspecialchars($booklist['genre']),
    'file' => htmlspecialchars($booklist['file']));?>

    <!-- 서평작성을 위한 페이지로 이동한다, 이 때 우리는 어떤 책의 관한 서평인지
    알아야하기 때문에 book_id도 같이 보낸다.  -->
    <a href="./review_write.php?id=<?= $filtered['book_id']?>">서평 작성</a>

    <!-- 이 부분은 위에서 만든 $filtered를 통해 책 정보를 출력해주는 부분이다. -->
    <table class="list" cellpadding="5" border="1" align="center">
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
    </table>

    <?php
    // 검색 정보에 따른 sql문을 각기 설정해준다. 자세한 주석은 book_list에 있다.
    if(isset($book_id)&&(!(isset($_POST['selected'])))) {
      $sql = mq("select * from book_review, user where book_id='".$book_id."'
      AND book_review.user_id = user.user_id");
    } else if(isset($book_id)&&((isset($_POST['selected'])))) {
      $sql = mq("select * from book_review, user where book_id='".$book_id."'
      AND book_review.user_id = user.user_id AND ".$_POST['selected']." LIKE '%".$_POST['search']."%'");
    }

    // 이 while문 부분은 서평 목록을 while문에 따라 각각 출력하는 부분이다.
    while($reviewlist = $sql->fetch_array()){
      $filtered = array(
        'review_id' => htmlspecialchars($reviewlist['review_id']),
        'review_title' => htmlspecialchars($reviewlist['review_title']),
        'review_desc' => htmlspecialchars($reviewlist['review_desc']),
        'user_id' => htmlspecialchars($reviewlist['user_id']),
        'name' => htmlspecialchars($reviewlist['name'])
      );?>
      <br>
      <table class="list" cellpadding="5" border="1" align="center">
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
        -->
        <?php
        // $reviewcheck != NULL : 만약 현재 사용자가 작성한 서평이 없다면 밑의 내용을 살펴볼 것도 없이 실행하지 않으면 된다.
        if($reviewcheck != NULL) {
          /* $filtered['user_id'] == $reviewcheck['user_id'] : while문을 통해 출력된 서평을 작성한 사용자의 ID와 현재 접속한 사용자의 ID가 같다.
          || $codecheck['code'] == 'A' : 또는 현재 접속한 사용자가 관리자라면..
          */
          if($filtered['user_id'] == $reviewcheck['user_id'] || $codecheck['code'] == 'A') { ?>
            <!-- 서평을 수정하거나 삭제할 수 있다. -->
            <td><a href="./review_update.php?review=<?= $filtered['review_id'] ?>">수정</a> </td>
            <td><a href="./review_delete_process.php?review=<?= $filtered['review_id'] ?>">삭제</a> </td>
          <?php  }
        } ?>
      </tr>
    </table>


  <?php } ?>
  <p><a href="../branch_hak/loan.php?id=<?=$book_id?> ">대여하기</a></p>
  <p><a href="../book/book_list.php">돌아가기</a></p>
<!-- //
  <div class="container">
      <div class="mgb-40 padb-30 auto-invert line-b-4 align-center">
          <h4 class="font-cond-l fg-accent lts-md mgb-10" contenteditable="false">Not Yet Convinced?</h4>
          <h1 class="font-cond-b fg-text-d lts-md fs-300 fs-300-xs no-mg" contenteditable="false">Read Customer Reviews</h1>
      </div>
      <ul class="hash-list cols-3 cols-1-xs pad-30-all align-center text-sm">
          <li>
            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="wpx-100 img-round mgb-20" title="" alt="" data-edit="false" data-editor="field" data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
            <p class="fs-110 font-cond-l" contenteditable="false">" Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae. "</p>
            <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">Martha Stewart</h5>
            <small class="font-cond case-u lts-sm fs-80 fg-text-l" contenteditable="false">Business Woman - New York</small>
          </li>
          <li>
            <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="wpx-100 img-round mgb-20" title="" alt="" data-edit="false" data-editor="field" data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
            <p class="fs-110 font-cond-l" contenteditable="false">" Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae. "</p>
            <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">Ariana Menage</h5>
            <small class="font-cond case-u lts-sm fs-80 fg-text-l" contenteditable="false">Recording Artist - Los Angeles</small>
          </li>
          <li>
            <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="wpx-100 img-round mgb-20" title="" alt="" data-edit="false" data-editor="field" data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
            <p class="fs-110 font-cond-l" contenteditable="false">" Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae. "</p>
            <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">Sean Carter</h5>
            <small class="font-cond case-u lts-sm fs-80 fg-text-l" contenteditable="false">Fund Manager - Chicago</small>
          </li>
        </ul>
  </div>
//
  <div class="row">
    <div class="col-sm-3">
      <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
      <div class="review-block-name"><a href="#">nktailor</a></div>
      <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
    </div>
    <div class="col-sm-9">
      <div class="review-block-rate">
        <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button>
      </div>
      <div class="review-block-title">this was nice in buy</div>
      <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
    </div> -->
  </div>
</body>
</html>
