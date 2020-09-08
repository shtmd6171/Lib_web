<!-- 멤버 삭제페이지 아닙니다 회원탈퇴 페이지입니다. -->
<?php
include "../lib/db.php";
$user_id = $_SESSION['user_id'];

$sql = mq("select * from user where user_id ='".$user_id."'");
$codecheck = $sql->fetch_array();

$email = $codecheck['email'];
$pwd = $codecheck['pwd'];
// $name = $codecheck['name'];

?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="../css/bootstrap-theme.css">
  <script src="../css/js/bootstrap.js"></script>
  <title></title>
  <body>
    <div class="row">
      <!-- 돌아가기 복잡해서 붙인버튼 삭제예정 -->
      <button onclick="goBack()">Go Back</button>
      <script>function goBack() {window.history.back();}</script>
      <a href="../book/book_list.php">메인</a>
    </div>

    <div class="container">
      <div class="row">
        <h3 text-align="center">회원탈퇴</h3>
      </div>

      <div class="row">
        <p>회원 탈퇴를 위해 아래 정보를 정확하게 입력해주세요.</p>
      </div>

      <div class="row">
        <form id="mform" method="post" action="./member_delete_ok.php">
          <div class="form-group">
            <label>Email address</label>
            <input type="email" class="form-control" name="email" required>
            <small class="form-text text-muted">회원탈퇴는 복구가 불가능하니 신중하게 선택해주세요.</small>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="pwd" value="<?= $pwd; ?>" required>
            <!-- 비밀번호 치는걸로 변경했는데 그렇게 하니까 암호화된 비밀번호 쳐야해서 문제있음 -->
            <!-- <input type="password" class="form-control" name="name" required> -->
          </div>

          <input type="submit" name="edit" value="탈퇴 하기">
        </form>
      </div>
    </div>
  </body>
  </html>
