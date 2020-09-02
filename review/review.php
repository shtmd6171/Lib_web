<?php
<<<<<<< HEAD
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
=======
include_once "../lib/db.php";

>>>>>>> 51fc89b4bfa10aa6fafc31563510bf955f9c88c4
$book_id = $_GET['id'];
if(isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];

  $sql = mq("select * from book where book_id ='".$book_id."'");
  $book = $sql->fetch_array();

<<<<<<< HEAD
<<<<<<< HEAD
=======
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
>>>>>>> 6d4aab9c17d91ebf08413ba881ba9b0f723ab913
}

else
{
  $reviewcheck = NULL;
}
=======
  $sql = mq("select * from user where user_id ='".$user_id."'");
  $codecheck = $sql->fetch_array();

  $sql = mq("select * from book_review where user_id ='".$user_id."'");
    if($sql->num_rows == 0) {
      $reviewcheck = NULL;
    } else {
      $reviewcheck = $sql->fetch_array();
    }
  $name = $codecheck['name'];
  } else {
    $reviewcheck = NULL;
    $codecheck = NULL;
  }
>>>>>>> 51fc89b4bfa10aa6fafc31563510bf955f9c88c4
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
<<<<<<< HEAD
<<<<<<< HEAD
    $sql = mq("select * from book where book_id='".$book_id."'");
=======
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
>>>>>>> 6d4aab9c17d91ebf08413ba881ba9b0f723ab913
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
<<<<<<< HEAD

    <?php
      $sql = mq("select * from book_review, user where book_id='".$book_id."'
      AND book_review.user_id = user.user_id");

=======
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
>>>>>>> 6d4aab9c17d91ebf08413ba881ba9b0f723ab913
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
<<<<<<< HEAD
=======
        -->
        <?php
        // $reviewcheck != NULL : 만약 현재 사용자가 작성한 서평이 없다면 밑의 내용을 살펴볼 것도 없이 실행하지 않으면 된다.
        if($reviewcheck != NULL) {
>>>>>>> 6d4aab9c17d91ebf08413ba881ba9b0f723ab913
          /* $filtered['user_id'] == $reviewcheck['user_id'] : while문을 통해 출력된 서평을 작성한 사용자의 ID와 현재 접속한 사용자의 ID가 같다.
          || $codecheck['code'] == 'A' : 또는 현재 접속한 사용자가 관리자라면..
          */
          if($filtered['user_id'] == $reviewcheck['user_id'] || $codecheck['code'] == 'A') { ?>
<<<<<<< HEAD
          <?php  }
=======
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
>>>>>>> 6d4aab9c17d91ebf08413ba881ba9b0f723ab913
=======
  <head>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
      <link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet">
      <link rel="stylesheet" href="../bootstrap/dist/bttn.min.css">
      <link href="./review_lib/booklist.css" rel="stylesheet">

      <!-- aosjs -->
      <script src="../aosjs/dist/aos.js"></script>
      <link href="../aosjs/dist/aos.css" rel="stylesheet">

      <!-- mojs -->
      <link rel="stylesheet" type="text/css" href="./review_lib/fonts/font-awesome-4.5.0/css/font-awesome.min.css" />
  		<link rel="stylesheet" type="text/css" href="./review_lib/demo.css"/>
  		<link rel="stylesheet" type="text/css" href="./review_lib/icons.css" />
      <title></title>
    </head>
  </head>
  <body>
    <div class="container">
      <header class="blog-header py-3 sticky-top">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <a class="text-muted mr-2 d-none d-sm-none d-md-inline-block" href="../book/book_list.php">MARK</a>
            <?php if(isset($codecheck)){
            if($codecheck['code'] == 'A') {?>
            <a class="text-muted d-none d-md-inline-block" href="../branch_hak/member_manage.php"><?php echo $name."(admin)"; ?></a>

          <?php } else { ?>
            <a class="text-muted d-none d-md-inline-block" href="../branch_hak/member_manage.php"><?php echo $name."(user)"; ?></a>
          <?php } ?>
            <a class="text-muted d-none d-md-inline-block pl-2" href="../branch_hak/loan_list.php">LOAN LIST</a>
            <a class="text-muted d-none d-md-inline-block pl-2" href="../branch_hak/purchase_list.php">PURCHASE LIST</a>
            <a class="text-muted d-none d-md-inline-block pl-2" href="../branch_hak/favorite_list.php">FAVORITE LIST</a>
          <?php  } ?>
          </div>
          <div class="col-4 text-center">
            <a class="text-muted d-none d-md-none d-sm-block" href="../book/book_list.php">MARK</a>
            <a class="blog-header-logo text-dark" href="../book/book_list.php">BOOK</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
             <div class="dropdown show d-none d-md-inline-block" id="selectedop">
              <a class="glass" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="-200,10">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3">
                  <circle cx="10.5" cy="10.5" r="7.5"></circle>
                  <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                </svg>
              </a>
              <form class="dropdown-menu p-4 " method="post">
                <div class="form-group">
                  <select class="form-control" name="selected">
                    <option value="review_title">제목</option>
                    <option value="review_desc">내용</option>
                    <option value="name">작성자</option>
                  </select>
                   <input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search">
                   <input type="submit" class="form-control" value="검색">
                 </div>
              </form>
            </div>
            <?php if(!(isset($_SESSION['user_id']))) { ?>
            <span class="dropdown">
              <a class="btn mr-1 btn-sm btn-outline-secondary d-none d-md-inline-block sign" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sign in</a>
              <form class="dropdown-menu p-4" method="post" action="../log/login_ok.php">
                <div class="form-group">
                  <label for="exampleDropdownFormEmail2">Email address</label>
                  <input type="email" class="form-control" id="exampleDropdownFormEmail" name="email" placeholder="email@example.com">
                </div>
                <div class="form-group">
                  <label for="exampleDropdownFormPassword2">Password</label>
                  <input type="password" class="form-control" id="exampleDropdownFormPassword" name="pwd"  placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
              </form>
              <a class="btn btn-sm btn-outline-secondary d-none d-md-inline-block sign" href="../log/member.php">Sign up</a>
            <?php } else { ?>
              <a class="btn mr-1 btn-sm btn-outline-secondary d-none d-md-inline-block sign" href="../log/logout.php">Logout</a>
            <?php } ?>
          </span>
          </div>
        </div>
      </header>

      <!-- header end -->

      <?php
      if(isset($book_id)) {
      $sql = mq("select * from book where book_id='".$book_id."'");
      } else {
        // TO DO
      }
      $booklist = $sql->fetch_array();
      $filtered = array(
        'book_id' => htmlspecialchars($booklist['book_id']),
        'title' => htmlspecialchars($booklist['title']),
        'author' => htmlspecialchars($booklist['author']),
        'publisher' => htmlspecialchars($booklist['publisher']),
        'the_date' => htmlspecialchars($booklist['the_date']),
        'genre' => htmlspecialchars($booklist['genre']),
        'file' => htmlspecialchars($booklist['file']));
      ?>
      <div class="row">
        <div class=" offset-3 col-6 nav-scroller bg-white rounded box-shadow my-3  ">
          <nav class="nav nav-underline mx-auto align-items-center justify-content-around">
            <a class="nav-link active" href="#">책 조회</a>

            <button class="bttn-jelly bttn-sm bttn-warning redirectioning "><a href="./review_write.php?id=<?= $filtered['book_id']?>">리뷰쓰기</a></button>

            <a class="nav-link" href="#">행사</a>
          </nav>
        </div>
        <div class="col-3">

        </div>
      </div>


      <!-- tab end -->

      <main role="main" class="container">
        <div class="d-flex flex-row bookcontainer">

          <div class=" d-flex align-items-center p-3 my-4 rounded box-shadow">
            <div class=" d-flex align-items-center justify-content-center showwindow">
              <img class="card bookimg" src="./review_lib/1.jpg" alt="">
              <?php if(isset($filtered['file'])&&$filtered['file']!="")  {
                $img = $filtered['file']; ?>
                <img data-aos="zoom-in"
                 data-aos-easing="ease-in-out-back"
                 data-aos-duration="1500" class="card-img img-thumbnail rounded book" src="../file/original/<?=$filtered['file']; ?>" alt="">
               <?php } else { ?>
                <img data-aos="zoom-in"
                 data-aos-easing="ease-in-out-back"
                 data-aos-duration="1500" class="card-img img-thumbnail rounded book" src="../file/no_image_session.jpg" alt="">
               <?php } ?>
            </div>
          </div>
          <script>
            AOS.init();
          </script>

          <!-- book cover end  -->
            <div class="d-none d-md-inline my-auto">
              <div class="d-flex flex-column align-items-center py-2 my-4 mx-2 bg-white rounded box-shadow bookdesc">
                <h4 class="d-sm-inline-flex border-bottom border-gray pb-2 mb-0">책 정보</h4>
                <div class="text-center align-items-center justify-content-center my-auto">
                    <div class="media text-muted pt-3">
                      <p class=" pb-3 mb-0 lh-125 border-bottom border-gray mx-auto">
                        <strong class="d-block text-gray-dark text-center pb-1">제목</strong>
                        <?= $filtered['title']; ?>
                      </p>
                    </div>

                    <div class="media text-muted pt-3">
                      <p class="pb-3 mb-0 lh-125 border-bottom border-gray mx-auto">
                        <strong class="d-block text-gray-dark text-center pb-1">작가</strong>
                      <?= $filtered['author']; ?>
                      </p>
                    </div>

                    <div class="media text-muted pt-3">
                      <p class="pb-3 mb-0 lh-125 border-bottom border-gray mx-auto">
                        <strong class="d-block text-gray-dark text-center pb-1">출판사</strong>
                      <?= $filtered['publisher']; ?>
                      </p>
                    </div>

                    <div class="my-4" style="color: #FF5964;">  <?php  if(isset($user_id)) { ?> 찜하기
                    <?php
                    $sql = mq("select * from favorite where user_id ='".$user_id."' AND book_id ='".$book_id."'");
                        if(($favoritecheck = $sql->fetch_array())) { ?>
                        <div class="grid">
                        <li class="grid__item">
                          <!-- 찜 삭제시 여기서 location으로 처리하기 -->
                          <button class="icobutton icobutton--heart" style="color: #FF5964;">
                            <span class="fa fa-heart"></span></button>
                        </li>
                      </div>
                    <?php  } else { ?>
                      <div class="grid">
                      <li class="grid__item">
                        <button class="icobutton icobutton--heart" onclick="
                        setTimeout( function() { location.href = '../branch_hak/favorite.php?id=<?= $filtered['book_id']?>'}, 1000 )"><span class="fa fa-heart"></a></button>
                      </li>
                    </div>
                  <?php  } } ?>
                      <script src="./review_lib/mo.min.js"></script>
                      <script src="./review_lib/demo.js"></script>
                    </p>
                    </div>

                </div>
              </div>
            </div>

            <!-- book description end  -->

          </div>

        <div class="row py-2 mx-2">

          <div class="col-md-4 col-sm-12 d-sm-flex d-md-none d-lg-none d-flex flex-column align-items-center py-2 my-4 mx-auto w-100 bg-white rounded box-shadow bookdesc">
            <h4 class="d-sm-inline-flex border-bottom border-gray pb-2 mb-0">책 정보</h4>
            <div class="text-center align-items-center justify-content-center my-auto">
                <div class="media text-muted pt-3">
                  <p class=" pb-3 mb-0 lh-125 border-bottom border-gray mx-auto">
                    <strong class="d-block text-gray-dark text-center pb-1">제목</strong>
                    <?= $filtered['title']; ?>
                  </p>
                </div>

                <div class="media text-muted pt-3">
                  <p class="pb-3 mb-0 lh-125 border-bottom border-gray mx-auto">
                    <strong class="d-block text-gray-dark text-center pb-1">작가</strong>
                  <?= $filtered['author']; ?>
                  </p>
                </div>

                <div class="media text-muted pt-3">
                  <p class="pb-3 mb-0 lh-125 border-bottom border-gray mx-auto">
                    <strong class="d-block text-gray-dark text-center pb-1">출판사</strong>
                  <?= $filtered['publisher']; ?>
                  </p>
                </div>

                <div class="my-4" style="color: #FF5964;">찜하기
                  <?php $sql = mq("select * from favorite where user_id ='".$user_id."' AND book_id ='".$book_id."'");
                    if(($favoritecheck = $sql->fetch_array())) { ?>
                    <div class="grid">
                    <li class="grid__item">
                      <!-- 찜 삭제시 여기서 location으로 처리하기 -->
                      <button class="icobutton icobutton--heart" style="color: #FF5964;">
                        <span class="fa fa-heart"></span></button>
                    </li>
                  </div>
                <?php  } else { ?>
                  <div class="grid">
                  <li class="grid__item">
                    <button class="icobutton icobutton--heart" onclick="
                    setTimeout( function() { location.href = '../branch_hak/favorite.php?id=<?= $filtered['book_id']?>'}, 1000 )"><span class="fa fa-heart"></a></button>
                  </li>
                </div>
                <?php  } ?>
                  <script src="./review_lib/mo.min.js"></script>
                  <script src="./review_lib/demo.js"></script>
                </p>
                </div>
            </div>
          </div>

          <div class="card text-center col-md-4 col-sm-6 box-shadow px-0">
            <div class="card-header">이 책을 읽어볼까요?</div>
              <div class="row card-body mx-auto">
              <button data-aos="slide-right"
               data-aos-easing="ease-in-out-back"
               data-aos-duration="1000" class="bttn-jelly bttn-md bttn-warning redirectioning" onclick="location.href='../branch_hak/loan.php?id=<?=$book_id?>'" >대여하기</button>
              </div>
            <div class="card-footer text-muted">18일까지 기간 한정!</div>
          </div>

          <div class="card text-center col-md-4 d-none d-sm-none d-md-flex box-shadow px-0">
            <div class="card-header">책 줄거리가 궁금한가요?</div>
              <div class="row card-body mx-auto">
                <button class="bttn-jelly bttn-md bttn-danger redirectioning" data-toggle="modal" data-target="#exampleModalLong">상세보기</button>
                  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content sidebars">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">책 정보</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <h5>책 제목</h5>
                          <?= $filtered['title']; ?>
                          <hr>
                          <h5>작가</h5>
                          <?= $filtered['author']; ?>
                          <hr>
                          <h5>출판사</h5>
                          <?= $filtered['publisher']; ?>
                          <hr>
                          <h5>발행일</h5>
                          <?= $filtered['the_date']; ?>
                          <hr>
                          <h5>장르</h5>
                          <?= $filtered['genre']; ?>
                          <hr>
                          <h5>소개</h5>
                          소개는 없어요
                          <hr>
                          <h5>목차</h5>
                          목차도 없어요
                          <hr>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="bttn-jelly bttn-sm bttn-danger" data-dismiss="modal">닫기</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>

            <div class="card text-center col-md-4 col-sm-6 box-shadow px-0">
              <div class="card-header">이 책을 구매 해볼까요?</div>
                <div class="row card-body mx-auto">
                  <button data-aos="slide-left"
                   data-aos-easing="ease-in-out-back"
                   data-aos-duration="1000" class="bttn-jelly bttn-md bttn-warning redirectioning" onclick="location.href='../branch_hak/purchase.php?id=<?=$book_id?>'" >구매하기</a></button>

                </div>
              <div class="card-footer text-muted">27명이 이 책을 구입했습니다</div>
            </div>
        </div>

        <!-- 서평  -->
        <?php
        $sql = mq("select * from book_review where book_id ='".$book_id."'");
        $review_write_check= $sql->num_rows;
        $sql = mq("select ROUND(AVG(review_rating),2) as result from book_review where book_id ='".$book_id."'");
        $review_rating_avg = $sql->fetch_array();?>

        <div class="my-3 p-3 bg-white rounded box-shadow">
          <h4 class="border-bottom border-gray pb-2 mb-0">리뷰&nbsp;<small>(<?=$review_rating_avg['result']?>/ 5.00)&nbsp;<small><?=$review_write_check?>명참여</small></samll></h4>
        <?php
          if(isset($book_id)&&(!(isset($_POST['selected'])))) {
          $sql = mq("select * from book_review, user where book_id='".$book_id."'
          AND book_review.user_id = user.user_id");
          } else if(isset($book_id)&&((isset($_POST['selected'])))) {
            $sql = mq("select * from book_review, user where book_id='".$book_id."'
            AND book_review.user_id = user.user_id AND ".$_POST['selected']." LIKE '%".$_POST['search']."%'");
          }
          while($reviewlist = $sql->fetch_array()){
            $filtered = array(
              'review_id' => htmlspecialchars($reviewlist['review_id']),
              'review_title' => htmlspecialchars($reviewlist['review_title']),
              'review_desc' => htmlspecialchars($reviewlist['review_desc']),
              'user_id' => htmlspecialchars($reviewlist['user_id']),
              'name' => htmlspecialchars($reviewlist['name']),
              'review_rating' => htmlspecialchars($reviewlist['review_rating'])
            );?>
          <div class="media text-muted pt-3">
            <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
            <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
              <strong class="d-block text-gray-dark"><?= $filtered['review_title']; ?>&nbsp;<small><?=$filtered['review_rating'];?>점</small></strong>
              <?= $filtered['review_desc'];
                if($reviewcheck != NULL) {
                  if($filtered['user_id'] == $reviewcheck['user_id'] || $codecheck['code'] == 'A'  ) { ?>
                    <div class="text-right border-bottom mt-auto">
                      <strong class="d-flex-column text-gray-dark"></strong>
                      <a href="./review_update.php?review=<?= $filtered['review_id'] ?>">수정</a>
                      <a href="./review_delete_process.php?review=<?= $filtered['review_id'] ?>">삭제</a>
                    </div>
                  <?php  }
                } else if ($reviewcheck == NULL && $codecheck != NULL ) {
                  if($codecheck['code'] == 'A'  ) { ?>
                    <a href="./review_update.php?review=<?= $filtered['review_id'] ?>">수정</a>
                    <a href="./review_delete_process.php?review=<?= $filtered['review_id'] ?>">삭제</a>
                  <?php } }?>
            </p>
          </div>
          <?php } ?>
          <small class="d-block text-right mt-3">
            <a href="#">전체보기</a>
          </small>
        </div>

      </main>
    </div>
    </div>

  </body>
>>>>>>> 51fc89b4bfa10aa6fafc31563510bf955f9c88c4
</html>
