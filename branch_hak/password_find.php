<?php
include "../lib/db.php";
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/bootstrap-theme.css">
  <script src="../css/js/bootstrap.js"></script>
  <title></title>
</head>
<body>
  <header class="blog-header py-3 sticky-top"></header>
  <div class="container">
    <div class="row">
      <h1>비밀 번호 찾기!</h1>
    </div>

    <div class="row">
      <h5>아래 이메일과 핸드폰 번호를 입력해주시면 ...</h5>
    </div>

    <div class="row mb-5">
      <h6>비밀 번호를 새롭게 수정 가능합니다.</h6>
    </div>

    <form method="post" action="./password_edit.php">
      <div class="form-group row mb-5" >
        <label for="email" class="col-sm-2 col-form-label">E-mail Address</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" placeholder="example@email.com" required>
        </div>

      </div>
      <div class="form-group row">
        <label for="pNum" class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm-10">
          <input type="UphoneNum" class="form-control" placeholder="010 - xxxx - xxxx" required>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-10">
          <input type="submit" name="find" value="find My account">
        </div>
      </div>
    </form>

    <div class="row">
      <button onclick="goBack()">Go Back</button>

      <script>
      function goBack() {
        location.href="../log/login.php";
      }
      </script>
    </div>

  </div>
</body>
</html>
