<?php
include "../lib/db.php";
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="utf-8"/>
  <title></title>
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="../css/bootstrap-theme.css">
  <link rel="stylesheet" href="./log.css">
  <script src="../css/js/bootstrap.js"></script>

  <style>
  body{
    background:url(../file/img/login_main.png);
    background-size: cover;
    background-attachment: fixed;
    width: 100vw;
    height: 100vh;
  }

    .ml-9{
    margin-left: 9rem !important;}
    </style>

  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="row col-12 mrow">

          <div class="col-6 content my-auto ml-9 d-none d-sm-block">
            <div class="login-wrapper">
              <div id="L_title" class="mb-3"> LOG-IN </div>
              <form id="mform" method="post" action="./login_ok.php" style="z-index:9999;">
                <div class="form-group">
                  <div class="row hhhhh mb-3">
                    <label id="L_login" for="email">Email address</label>
                    <input type="email" name="email" id="email" class="form-control"
                    placeholder="email@example.com" required>
                  </div>
                  <div class="row mb-3">
                    <label id="L_login" for="pwd">Password</label>
                    <input type="password" name="pwd" id="pwd" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <input type="submit" value="sign in" class="btn btn-outline-primary">
                </div>
              </form>
              <button class="btn btn-outline-primary" onclick="location.href='../log/member.php'">Create account</button>
              <button class="btn btn-outline-primary" onclick="location.href='../branch_hak/password_find.php'">forgot password</button>
            </div>
          </div>



        </div>
      </div>
    </div>

  </body>
  </html>
