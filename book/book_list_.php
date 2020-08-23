<?php
include "../lib/db.php";
$user_id = $_SESSION['user_id'];

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

    <form method="post">
      <select name="selected">
        <option value="title">제목</option>
        <option value="author">작가</option>
        <option value="publisher">출판사</option>
      </select>
      <input type="text" name="search" placeholder="검색내용">
      <input type="submit" value="검색">

      <button class="mine wb"><a href="../log/logout.php">로그아웃</a></button>
      <button class="mine wb"><a href="../branch_hak/member_page_ok.php">마이 페이지</a></button>

      <?php if($codecheck['code'] == 'A') {?>
      <button class="mine wb"><a href="../book/book_wirte.php">책 등록하기</a></button>
      <button class="mine wb"><a href="../management_as_admin/user_management.php">유저관리</a></button>
      <?php } ?>
    </form>
    <div>
      <table>
        <tr>
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


    <script type="text/javascript">
      $(function() {
        $.get("./testing.php",
             {page : 1},
             function(data){ $("#list").html(data); });
      });

      function paging(number) {
        $.get("./testing.php",
             {page : number},
             function(data){ $("#list").html(data); });
      }
    </script>
      <div id="list"></div>
  </body>
</html>
