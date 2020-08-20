<?php
include "../lib/db.php";
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<h1>비밀 번호 찾기!</h1>
<h5>아래 이메일과 핸드폰 번호를 입력해주시면 ...</h5>
<h6>당신의 이메일을 기대해보세요!</h6>

    <form method="post">
      <table border="1">
        <tr>
          <td>이메일 : <input type="text" name="email" placeholder="exam@email.com"></td>
        </tr>
        <tr>
          <td>핸드폰 번호 : <input type="text" name="tell" placeholder="핸드폰 번호"></td>
        </tr>
      <table>
        <input type="submit" name="" value="submit">
      </form>
      <?php
      $sql = mq("SELECT * FROM user WHERE email ='".$_POST['email']."' AND ".$_POST['selected']." LIKE'%".$_POST['search']."%'");

      ?>
      <?php $_POST['email'] ?>




  </br></br></br></br></br>
    <button onclick="goBack()">Go Back</button>

    <script>
    function goBack() {
      window.history.back();
    }
    </script>
  </body>
</html>
