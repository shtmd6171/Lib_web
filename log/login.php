
<?php
include "../lib/db.php";
?>
<!-- https://nanati.me/css-button-design/ 버튼 디자인 연구-->
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="utf-8"/>
  <title></title>
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap-theme.css">
  <link rel="stylesheet" href="./log.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../bootstrap/dist/js/bootstrap.js"></script>

  <style>
  body{
    background:url(../file/img/login_main.png);
    background-size: cover;
    background-attachment: fixed;
    width: 100vw;
    height: 100vh;
  }
  button, select, optgroup, textarea, a, input{
    font-family: 'Gugi', cursive !important;
  }
  .ml-9{
    margin-left: 9rem !important;
  }
  .Modal{
    font-family: 'Gugi', cursive !important;
  }

  </style>

</head>
<body>
  <header class="blog-header py-3 sticky-top"></header>
  <div class="container">
    <div class="row">
      <div class="row col-12 mrow">

        <div class="col-sm-6 col-md-6 content my-auto ml-9 d-none d-sm-block">
          <div class="login-wrapper">
            <div id="L_title" class="mb-3"> LOGIN </div>
            <form id="mform" method="post" action="./login_ok.php" style="z-index:9999;">
              <div class="form-group">
                <div class="row mb-3">
                  <label id="L_login" for="email">Email address</label>
                  <input type="email" name="email" id="email" class="form-control"
                  placeholder="example@email.com" required>
                </div>
                <div class="row mb-4">
                  <label id="L_login" for="pwd">Password</label>
                  <input type="password" name="pwd" id="pwd" class="form-control" placeholder="●●●●●●●●" required>
                </div>
              </div>
              <div class="row mb-5">
                <input id="L_btn" type="submit" value="sign in" class="btn btn-dark mt-4 btn-lg btn-block " active>
                <!-- <input type="submit" value="sign in" class="btn btn-dark mt-4 btn-lg btn-block" active> -->
                <!-- 블록레벨 버튼으로 할지 그냥 라지버튼으로 할지 함께 상의할것! -->
              </div>
            </form>

            <div class="row Modal mb-1">


              <a class="text-light" data-toggle="modal" data-toggle="modal" data-target="#exampleModalCenter" href="#myModal">Create account</a>
              <!-- Modal -->
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Create Account</h4>
                      <!-- 밑에 클로즈 버튼이 있는데 이걸 살릴지, 클로즈 버튼을 살릴지 상의해보기 -->
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      <div class="container">

                        <form method="post" action="member_ok.php">
                          <div class="form-group">
                            <label>E-mail address</label>
                            <input type="email" class="form-control" name="email" placeholder="email@example.com" required>
                          </div>
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="pwd" placeholder="●●●●●●●●" required>
                          </div>

                          <div class="form-group">
                            <label for="pwd">Password Check</label>
                            <input type="password" class="form-control" name="pwd" placeholder="Please enter your password again" required>
                            <!--비밀번호 확인 백엔드 추가하기-->
                          </div>

                          <div  class="form-group">
                            <label for="Uname">User name</label>
                            <input type="text" class="form-control" name="name" required>
                          </div>

                          <div class="form-group">
                            <label for="Uaddress">Address</label>
                            <input type="text" class="form-control" name="addr" required>
                          </div>

                          <div class="form-group">
                            <label for="UphoneNum">Phone Number</label>
                            <input type="text" class="form-control" name="tel" placeholder="010-xxxx-xxxx" required>
                          </div>

                          <div class="form-group">
                            <label class="mt-2 mr-5" for="gender">Gender</label>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="female">
                              <label class="form-check-label" for="inlineRadio1">female</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                              <label class="form-check-label" for="inlineRadio1">male</label>
                            </div>
                          </div>

                          <div class="modal-footer">
                            <button id=" Input" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark">Regist in</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row Modal">
              <a class="text-light" data-toggle="modal" data-toggle="modal" data-target="#exampleModalCenter2" href="#myModal">Find your Password</a>
              <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Find your Password</h4>
                      <!-- 밑에 클로즈 버튼이 있는데 이걸 살릴지, 클로즈 버튼을 살릴지 상의해보기 -->
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      <div class="container">
                        <span>Have you forgotten your password?<br>
                          If you remember your email and phone number, you can create a new password.</span>

                          <form method="post" action="../branch_hak/password_edit.php">
                            <div class="form-group mt-4">
                              <label>E-mail address</label>
                              <input type="email" class="form-control" name="email" placeholder="email@example.com" required>
                            </div>

                            <div class="form-group">
                              <label for="UphoneNum">Phone Number</label>
                              <input type="text" class="form-control" name="tel" placeholder="010-xxxx-xxxx" required>
                            </div>

                            <div class="modal-footer">
                              <button id=" Input" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-dark">Find</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script>
      $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
      })
      </script>

    </body>
    </html>
