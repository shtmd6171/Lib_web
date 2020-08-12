<?php
include "../lib/db.php";

if(isset($_SESSION['user_id'])){
$user_id = $_SESSION['user_id'];

$sql = mq("select * from user where user_id ='".$user_id."'");
$codecheck = $sql->fetch_array();

$name = $codecheck['name'];
}
?>

<!doctype html>
<html lang="ko">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="./booklist_lib/myjs.js"></script>
  <link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet">
  <link href="./booklist_lib/booklist.css" rel="stylesheet">
  <link rel="stylesheet" href="../bootstrap/dist/bttn.min.css">
  <title></title>
</head>

<body>
  <div class="container">
    <header class="blog-header py-3 sticky-top">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <a class="text-muted mr-2 d-none d-sm-none d-md-inline-block" href="./book_list.php">MARK</a>
          <?php if(isset($codecheck)){
          if($codecheck['code'] == 'A') {?>
          <a class="text-muted d-none d-md-inline-block" href="../branch_hak/member_manage.php"><?php echo $name."(admin)"; ?></a>

        <?php } else { ?>
          <a class="text-muted d-none d-md-inline-block" href="../branch_hak/member_manage.php"><?php echo $name."(user)"; ?></a>
        <?php }} ?>
        </div>
        <div class="col-4 text-center">
          <a class="text-muted d-none d-md-none d-sm-block" href="./book_list.php">MARK</a>
          <a class="blog-header-logo text-dark" href="./book_list.php">BOOK</a>
            <div class="dropdown show mt-2">
              <a class=" p-2 text-muted d-md-none d-lg-none d-sm-inline-block bttn-stretch bttn-sm bttn-primary" href="#" role="button" id="dropdownMenuLink"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none;">genre</a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="./book_list.php">메인</a>
                <a class="dropdown-item" href="?genre=문학">문학</a>
                <a class="dropdown-item" href="?genre=인문/사회">인문사회</a>
                <a class="dropdown-item" href="?genre=자기계발">자기계발</a>
                <a class="dropdown-item" href="?genre=비즈니스/경제">경제</a>
                <a class="dropdown-item" href="?genre=라이프스타일">라이프</a>
                <a class="dropdown-item" href="?genre=만화">만화</a>
                <a class="dropdown-item" href="?genre=과학">과학</a>
                <a class="dropdown-item" href="?genre=컴퓨터">컴퓨터</a>
                <a class="dropdown-item" href="?genre=수험서/자격증">수험서</a>
                <a class="dropdown-item" href="?genre=예술/대중문화">예술</a>
                <a class="dropdown-item" href="?genre=외국">외국</a>
                <a class="dropdown-item" href="?genre=오디오북">오디오북</a>
                <a class="dropdown-item" href="?genre=기타">ETC</a>
              </div>
            </div>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
           <div class="dropdown show d-none d-md-inline-block" id="selectedop">
            <a class="glass " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3">
                <circle cx="10.5" cy="10.5" r="7.5"></circle>
                <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
              </svg>
            </a>
            <form class="dropdown-menu p-4 " method="post">
              <div class="form-group">
                <select class="form-control" name="selected">
                  <option value="title">제목</option>
                  <option value="author">작가</option>
                  <option value="publisher">출판사</option>
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
    <div class="nav-scroller py-1">
      <nav class="nav d-flex justify-content-between">
        <a class="p-2 text-muted d-none d-md-inline-block" href="./book_list.php">메인</a>
        <a class="p-2 text-muted d-none d-md-inline-block" href="?genre=문학">문학</a>
        <a class="p-2 text-muted d-none d-md-inline-block" href="?genre=인문/사회">인문사회</a>
        <a class="p-2 text-muted d-none d-md-inline-block" href="?genre=자기계발">자기계발</a>
        <a class="p-2 text-muted d-none d-md-inline-block" href="?genre=비즈니스/경제">경제</a>
        <a class="p-2 text-muted d-none d-md-inline-block" href="?genre=라이프스타일">라이프</a>
        <a class="p-2 text-muted d-none d-md-inline-block" href="?genre=만화">만화</a>
        <a class="p-2 text-muted d-none d-md-inline-block" href="?genre=과학">과학</a>
        <a class="p-2 text-muted d-none d-md-inline-block" href="?genre=컴퓨터">컴퓨터</a>
        <a class="p-2 text-muted d-none d-md-inline-block" href="?genre=수험서/자격증">수험서</a>
        <a class="p-2 text-muted d-none d-md-inline-block" href="?genre=예술/대중문화">예술</a>
        <a class="p-2 text-muted d-none d-md-inline-block" href="?genre=외국">외국</a>
        <a class="p-2 text-muted d-none d-md-inline-block" href="?genre=오디오북">오디오북</a>
        <a class="p-2 text-muted d-none d-md-inline-block" href="?genre=기타">ETC</a>
      </nav>
    </div>
    <div class=" py-1 mb-2">
      <nav class="navbar navbar-light d-flex d-md-none d-lg-none justify-content-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse text-center" id="navbarsExample01">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../branch_hak/member_manage.php">My Page <span class="sr-only">(current)</span></a>
            </li>
            <?php if(!(isset($_SESSION['user_id']))) { ?>
            <li class="nav-item">
              <a class="nav-link" href="../log/login.php">Sign In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../log/member.php">Sign Up</a>
            </li>
            <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="../log/logout.php">Logout</a>
            </li>
            <?php } ?>
          </ul>
          <form class="flex-inline d-flex justify-content-center my-2" method="post">
             <div class="col-sm-3">
               <select class="form-control" name="selected">
                 <option value="title">제목</option>
                 <option value="author">작가</option>
                 <option value="publisher">출판사</option>
               </select>
             </div>
                <input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search">
             <span class="input-group-submit">
              <input type="submit" class="form-control" value="검색">
              </span>
          </form>
        </div>
      </nav>
    </div>
    <!-- <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light background">
      <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="display-4 font-weight-normal">ㅇ</h1>
        <p class="lead font-weight-normal">ㄴㄷㅆ</p>
      </div>
    </div> -->
    <div id="myCarousel" class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light background carousel slide" data-ride="carousel">
      <!-- ol태그의 class에 carousel-indicators를 넣는다. -->
      <ol class="carousel-indicators">
        <!-- li는 이미지 개수만큼 추가하고 data-target은 carousel id를 가르킨다. -->
        <!-- data-slide-to는 순서대로 0부터 올라가고 0은 active를 설정한다. -->
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <!-- 실제 이미지 아이템 -->
      <!-- class는 carousel-inner로 설정하고 role은 listbox에서 설정한다. -->
      <div class="carousel-inner">
        <!-- 이미지의 개수만큼 item을 만든다. 중요한 포인트는 carousel-indicators의 li 태그 개수와 item의 개수는 일치해야 한다. -->
        <div class="carousel-item active">
          <img class="first-slide sliding" src="./booklist_lib/1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption text-left">
              <h1>A book that is shut is but a block</h1>
              <p>Thomas Fuller</p>
              <p><a class="btn btn-md btn-secondary" href="#" role="button">Taste a book</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="second-slide sliding" src="./booklist_lib/2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>The man who doesn't read good books has no advantage over the man who can't read them</h1>
              <p>Mark Twain</p>
              <p><a class="btn btn-md btn-primary" href="../log/member.php" role="button">Sign Up Now</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="third-slide sliding" src="./booklist_lib/3.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption text-right">
              <h1>Live always in the best company <h1 style="color:orange">when you read</h1></h1>
              <p>Sydney Smith</p>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="row mb-2">
    <?php
    if(isset($_GET['genre'])) {
      $sql = mq("select * from book where genre='".$_GET['genre']."'");
       if(isset($_POST['selected'])) {
        $sql = mq("select * from book where genre='".$_GET['genre']."' AND ".$_POST['selected']." LIKE'%".$_POST['search']."%'");
        }
    } else {
      $sql = mq("select * from book");
      if(isset($_POST['selected'])) {
       $sql = mq("select * from book where ".$_POST['selected']." LIKE'%".$_POST['search']."%'");
        }
    }
    while($booklist = $sql->fetch_array()){
      $filtered = array(
        'book_id' => htmlspecialchars($booklist['book_id']),
        'title' => htmlspecialchars($booklist['title']),
        'author' => htmlspecialchars($booklist['author']),
        'publisher' => htmlspecialchars($booklist['publisher']),
        'the_date' => htmlspecialchars($booklist['the_date']),
        'genre' => htmlspecialchars($booklist['genre']),
        'file' => htmlspecialchars($booklist['file'])
      );?>
      <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-secondary"><?=$filtered['genre']?></strong>
            <h3 class="mb-0">
              <a class="text-dark booktitle" href="../review/review.php?id=<?= $filtered['book_id']?>"><?=$filtered['title']?></a>
            </h3>
            <div class="mb-1 text-muted bookauthor"><?=$filtered['author']?></div>
            <p class="card-text mb-auto"><?=$filtered['publisher']?>사의 신작</p>
            <a href="../review/review.php?id=<?= $filtered['book_id']?>">읽어보기</a>
          </div>
          <img class="card-img-right flex-auto d-none d-md-block" src="../file/<?=$filtered['file']?>" alt="Card image cap" width="200px" height="250px">
        </div>
      </div>
  <?php } ?>
</div>

  </div>

</body>

</html>
