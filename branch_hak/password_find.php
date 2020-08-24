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
<h6>비밀 번호를 새롭게 수정 가능합니다.</h6>


    <form method="post" action="./password_edit.php" >
      <table border="1">
          <tr>
            <td>이메일 : <input type="text" name="email" placeholder="exam@email.com" required></td>
          </tr>
          <tr>
            <td>핸드폰 번호 : <input type="text" name="tel" placeholder="핸드폰 번호" required></td>
          </tr>
        <table>
        <input type="submit" name="" value="submit">
      </form>



  </br></br></br></br></br>

    <button onclick="goBack()">Go Back</button>

    <script>
    function goBack() {
      location.href="../log/login.php";
    }
    </script>

  </body>
</html>
