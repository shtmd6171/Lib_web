<?php
include "../lib/db.php";
$user_id = $_SESSION['user_id'];

/* 여기서 $user_id는 현재 로그인한 유저의 user_id(PK)고 그것을 통해, fetch_array를 했다.
$codecheck 배열에는 현재 로그인한 유저의 관한 정보가 담겨있다.
$codecheck는 유저의 code를(관리자,유저) 알기 위해 사용될 것이다.
*/
$sql = mq("select * from user where user_id ='".$user_id."'");
$codecheck = $sql->fetch_array();

$name = $codecheck['name'];
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="./javascr/onClickFunc.js"></script>
    <title></title>

  </head>
  <body>
    <h1>BOOK LIST</h1>

    <?php if($codecheck['code'] == 'A'):?>
    <?php echo $name."(관리자님) 환영합니다."; ?>

    <?php else : ?>
    <?php echo $name."(님) 환영합니다."; ?>
    <?php endif; ?>

    <!-- 이 부분은  책의 제목, 작가, 출판사를 이용해 검색하는 부분이다.
    form 타입으로 묶었는데 action은 주지않았다. 즉, $_POST값을 넘겨받는 위치가 여기(book_list.php)란 뜻이다.

    option의 각 value들을 title, author, publisher로 주었는데, 이는 Book 테이블의 각 속성 이름과 같다.
   이는 SQL쿼리를 실행 할때, 다른 이름으로 치환하지 않고 그대로 삽입하기 위한 편의를 위해 설정하였다.

   search는 내가 검색하려고하는 문자열이 들어오게 된다.
    -->
    <form method="post">
      <select name="selected">
        <option value="title">제목</option>
        <option value="author">작가</option>
        <option value="publisher">출판사</option>
      </select>
      <input type="text" name="search" placeholder="검색내용">
      <input type="submit" value="검색">
      <!-- button이 등장하는 이 부분부터는 사실 form문 밖으로 빼버려도 상관없다.
      다만 현재로서는 검색 옆에 밑의 버튼들을 붙여놓기 위해 이 곳에 배치했다. -->
      <button class="mine wb"><a href="../log/logout.php">로그아웃</a></button>
      <button class="mine wb"><a href="../branch_hak/member_page_ok.php">마이 페이지</a></button>
      <!-- $codecheck는 위에서도 말했듯, 사용자의 코드를 알기 위해 사용한다고 했다.
       이 if문을 통해 현재 사용자가 관리자인지, 사용자인지 파악한다.
       만약 현재 사용자가 관리자라면 책 등록하기와 유저관리 버튼이 보이고, 실행할 수 있다.  -->
      <?php if($codecheck['code'] == 'A') {?>
      <button class="mine wb"><a href="../book/book_wirte.php">책 등록하기</a></button>
      <button class="mine wb"><a href="../management_as_admin/user_management.php">유저관리</a></button>
      <?php } ?>
    </form>

    <div>
      <table>
        <tr>
          <!-- 여기서는 $_GET의 값을 이용한다. 같은 페이지 내에서 URL에 genre(장르)가 변할 때마다 다른 페이지를 보여주게끔 구성하였다.
          사용자는 각 탭을 클릭할 때마다 URL주소에 genre값이 변하는 것을 볼 수 있고, 나는 이 genre값을 $_GET를 통해 받아낼 것이다.
          그리고 이 값에 따라 각 페이지에 다른 정보를 보여주게 할 것이다.   -->
          <td><a href="./book_list.php">메인</a></td>
          <td><a href="?genre=문학">문학</a></td>
          <td><a href="?genre=인문/사회">인문/사회</a></td>
          <td><a href="?genre=자기계발">자기계발</a></td>
          <td><a href="?genre=비즈니스/경제">비즈니스/경제</a></td>
          <td><a href="?genre=라이프스타일">라이프스타일</a></td>
          <td><a href="?genre=만화">만화</a></td>
          <td><a href="?genre=과학">과학</a></td>
          <td><a href="?genre=컴퓨터">컴퓨터</a></td>
          <td><a href="?genre=수험서/자격증">수험서/자격증</a></td>
          <td><a href="?genre=예술/대중문화">예술/대중문화</a></td>
          <td><a href="?genre=외국">외국</a></td>
          <td><a href="?genre=오디오북">오디오북</a></td>
          <td><a href="?genre=기타">기타</a></td>
       </tr>
      </table>
    </div>
    <?php
    /* 사용자가 탭을 클릭해 URL의 genre 값이 변할 때마다 다른 정보를 보여주기 위한 기능을 구현한다.
    if조건의 isset($_GET['genre'])란 현재 위치가 메인페이지인지,
    아니면 탭을 통해 장르를 선택한 페이지인지를 구분하는 역할을 한다.
    */
    if(isset($_GET['genre'])) {
    //  만약 장르를 선택한 페이지라면, 해당 장르에 맞는 값만을 현재 페이지에 표시한다.
    $sql = mq("select * from book where genre='".$_GET['genre']."'");
    // selected는 위의 form조건에서 사용자가 검색한 내용이 있을때 생성된다.
  } else if(isset($_POST['selected'])) {
    // 만약 사용자가 검색을 통해 입력한 값이 있다면 이곳의 조건문을 실행한다.
    // $_POST['selected']는 book 테이블에도 동일한 속성명을 지닌 title, author, publisher 중 하나일 것이고
    // $_POST['search']는 내가 검색한 문자열이다.
    // 난 이것을 통해 title, author, publisher중 하나에서 내가 검색한 문자열을 포함한 내용이 있는지 찾아낸다.
    $sql = mq("select * from book where ".$_POST['selected']." LIKE'%".$_POST['search']."%'");
  } else {
    // 만약 $_GET에서 장르값이 없다면 (메인 페이지라면) 전체를 다 불러온다.
    $sql = mq("select * from book");
  }
  /* 위의 조건에 따라 sql쿼리가 다르게 생성된다.
  그리고 생성된 $sql를 따라 $booklist를 생성하고 조건에 만족하는 쿼리문을 하나씩 배열에 삽입한다.
  이 때 나는 $filtered라는 새 배열을 만드는데 이 곳에는 $booklist 안에 각 속성 값을 집어넣는다.

  Q.이걸 왜 해?
  A. 보면 $booklist과는 다르게 htmlspecialchars라는 함수를 사용해 속성 값을 삽입한 것을 볼 수 있다.
  htmlspecialchars(내용)은 내용값에 html문법이 포함된 문자가 적혀 있을 경우 이를 인식하지 못하게 바꿔주는 역할을 한다.

  예를 들어, 내가 sql문 내부에 '<script>alert('안녕');</script>' 이라는 내용을 삽입해버리면
  내가 이 내용을 그대로 출력하면, '<script>alert('안녕');</script>'가 문자열로 출력되는게 아니라
  alert기능에 따라 '안녕'이라고 써있는 팝업 알람을 띄워버리는 대참사가 일어난다.
  왜냐하면 php내부에서 문자열을 써버릴 경우, html문으로 읽어버리기 때문이다.
  htmlspecialchars를 사용하게 되면 <, >를 &lt &gt 같은 값으로 바꿔버리기 때문에
  팝업 알람을 띄우지 않게되는 이유에서이다.

  한마디로, 출력보안을 위한 장치라는 것
  */
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
      <!-- 이 부분도 잘 보면 while문 내부이다.
      php문을 바로 위에서 끊어버리긴 했지만 while문의 {}에서 } 를 아직 쓰지않았고,
      그 말은 } 를 쓰기 전 까지는 그것이 뭐가 됐든 while문 안에서 반복 된다는 뜻이다.

      그렇기에 우리는 while문 반복 조건(:SQL쿼리 조건에 맞는 값들이 다 나올때까지 배열에 저장하기) 에따라
      html문도 반복 출력할 수 있고,
      배열을 하나씩 받아 그 값을 보여주는 html문을 반복적으로 화면에 출력해 줄 수 있는 것이다.
      -->
      <table class="list" cellpadding="5" border="1" align="center">
      <tr class="tltle">
        <th>Title</th>
        <th>Author</th>
        <th>Publisher</th>
        <th>The_Day</th>
        <th>Genre</th>
        <th>Image</th>
        <th>이 책의 관한 서평</th>
      </tr>
      <tr class="value">
        <!-- <p> 내부에 아까 생성한 $filtered배열의 값들을 하나씩 출력하고 있다. -->
        <td><p><?= $filtered['title'] ?></p></td>
        <td><p><?= $filtered['author'] ?></p></td>
        <td><p><?= $filtered['publisher'] ?></p></td>
        <td><p><?= $filtered['the_date'] ?></p></td>
        <td><p><?= $filtered['genre'] ?></p></td>
        <td><p><img src="../file/<?= $filtered['file'] ?>" alt="이미지 없음" width="200" height="200"></p></td>
        <!-- 보면 단순히 페이지를 이동하는 href문 뿐만 아니라 URL에 id라는 변수를 통해 $_GET 값으로 넘기는 것을 볼 수 있다.
        책은 각 book_id(PK)가 존재하고 해당 책이 존재하는 페이지로 이동하면, 그 책의 정보를 가지고 있어야한다.
         그래야 그 책의 자세한 정보나 수정하거나 삭제하는 기능을 수행할 수 있기 때문이다.  -->
        <td><a href="../review/review.php?id=<?= $filtered['book_id'] ?>">보기</a> </td>
        <!-- 책의 관한 정보를 수정하거나 삭제하는 것은 관리자만 할 수 있어야 한다.
        그렇기 때문에 아까 만든 $codecheck을 통해 현재 사용자가 관리자라면,
         각 책의 정보를 수정하거나 삭제할 수 있는 기능을 보고, 이용할 수 있다. -->
        <?php if($codecheck['code'] == 'A') {?>
        <td><a href="./book_update.php?id=<?= $filtered['book_id'] ?>">업데이트</a></td>
        <?php } ?>
        <?php if($codecheck['code'] == 'A') {?>
        <td><a href="./book_delete_process.php?id=<?= $filtered['book_id'] ?>">삭제</a></td>
        <?php } ?>
      </tr>
      </table>
      <!-- 여기가 while문의 끝이다. while조건에따라 여기까지의 전체가 반복되는 것이다. -->
    <?php   } ?>
  </body>
</html>
