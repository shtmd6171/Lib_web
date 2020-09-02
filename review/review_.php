<?php
include_once "../lib/db.php";

$book_id = $_GET['id'];
if(isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];

  $sql = mq("select * from book where book_id ='".$book_id."'");
  $book = $sql->fetch_array();

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
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet">
<<<<<<< HEAD
=======
      <link rel="stylesheet" href="../css/bootstrap-theme.css">
      <script src="../css/js/bootstrap.js"></script>
>>>>>>> 6d4aab9c17d91ebf08413ba881ba9b0f723ab913
      <link href="./review_lib/booklist.css" rel="stylesheet">
      <title></title>
    </head>
  </head>
  <body>
    <div class="container">
      <header class="blog-header py-3 sticky-top w-100">
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
              <a class="glass" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

      <div class="nav-scroller bg-white rounded box-shadow my-3 text-center">
        <nav class="nav nav-underline mx-auto">
          <a class="nav-link active" href="#">책 조회</a>
          <a class="nav-link" href="#">
            Favorite
            <span class="badge badge-pill bg-light align-text-bottom">27</span>
          </a>
          <a class="nav-link" href="#">행사</a>
        </nav>
      </div>

      <!-- tab end -->

      <main role="main" class="container">
        <div class="d-flex flex-row bookcontainer">

          <div class=" d-flex align-items-center p-3 my-4 rounded box-shadow">
            <div class=" d-flex align-items-center justify-content-center showwindow">
              <img class="card bookimg" src="../book/booklist_lib/1.jpg" alt="">
              <img class="card-img img-thumbnail rounded book" src="../file/<?=$filtered['file']; ?>" alt="">
            </div>
          </div>

          <!-- book cover end  -->
            <div class="d-none d-md-inline my-auto">
              <div class="d-flex flex-column align-items-center py-2 my-4 mx-2 bg-white rounded box-shadow bookdesc">
                <h4 class="d-sm-inline-flex border-bottom border-gray pb-2 mb-0">책 정보</h4>
                <div class="text-center align-items-center justify-content-center my-auto">
                    <div class="media text-muted pt-3">
                      <p class=" pb-3 mb-0 lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark text-center pb-1">제목</strong>
                        <?= $filtered['title']; ?>
                      </p>
                    </div>

                    <div class="media text-muted pt-3">
                      <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark text-center pb-1">작가</strong>
                      <?= $filtered['author']; ?>
                      </p>
                    </div>

                    <div class="media text-muted pt-3">
                      <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark text-center pb-1">출판사</strong>
                      <?= $filtered['publisher']; ?>
                      </p>
                    </div>

                    <div class="my-4">
                      <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
                      <button class="bttn-jelly bttn-sm bttn-warning redirectioning "><a href="./review_write.php?id=<?= $filtered['book_id']?>">리뷰쓰기</a></button>
                    </p>
                    </div>

                    <div class="my-4">
                      <button class="bttn-jelly bttn-md bttn-danger redirectioning" data-toggle="modal" ><a href="../branch_hak/favorite.php?id=<?= $filtered['book_id']?>">찜하기</a></button>
                    </div>

                </div>
              </div>
            </div>

            <!-- book description end  -->

          </div>

        <div class="row py-2 mx-2">

          <div class="card text-center col-md-4 col-sm-6 box-shadow px-0">
            <div class="card-header">이 책을 읽어볼까요?</div>
              <div class="row card-body mx-auto">
              <button class="bttn-jelly bttn-md bttn-warning redirectioning" onclick="location.href='../branch_hak/loan.php?id=<?=$book_id?>'" >대여하기</button>
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
                  <button class="bttn-jelly bttn-md bttn-warning redirectioning" onclick="location.href='../branch_hak/purchase.php?id=<?=$book_id?>'" >구매하기</a></button>

                </div>
              <div class="card-footer text-muted">27명이 이 책을 구입했습니다</div>
            </div>

            <div class="card text-center col-md-4 col-sm-12 d-sm-flex d-md-none d-lg-none box-shadow px-0">
              <div class="card-header">상세정보</div>
                <div class="row card-body mx-auto">
                  <button class="bttn-jelly bttn-md bttn-danger" data-toggle="modal" data-target="#exampleModal">들여보기</button>
                </div>
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
</html>
