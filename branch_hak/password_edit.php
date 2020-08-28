<?php
include "../lib/db.php";
header('Cache-Control: no-cache, must-revalidate');
  //  user 테이블의 eamil 필드와 입력받은 email이 같으면 해당 email 필드 값 전부 조회
  $sql = mq("select * FROM user WHERE email ='".$_POST['email']."'");
  $usercheck = $sql->fetch_array();
  /*2020-08-27~28
  inseon todo
  비밀번호 수정이 어디 페이지에서 이어지는지 모르겠어서
  테스트 제대로 할 수 없었음.
  보더 너무 못생겨서 없애버림
  */
  ?>


  <!DOCTYPE html>
  <html lang="ko" dir="ltr">
    <head>
      <meta charset="utf-8">
      <link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet">
      <link rel="stylesheet" href="../css/bootstrap-theme.css">
      <script src="../css/js/bootstrap.js"></script>
      <title></title>
    </head>
    <body>
    <header class="blog-header py-3 sticky-top"></header>
    <div class="container">

    <?php
     if( $_POST['email'] == $usercheck['email'] && $_POST['tel'] == $usercheck['tel'])
      {   ?>

          <form method="post">
            <table>
              <div class="row">
                <input type="hidden" name="email" value="<?=$_POST['email']  ?>">

              </div>
              <div class="row">
                <input type="hidden" name="tel" value="<?=$_POST['tel']  ?>">

              </div>
              <div class="row">
                <tr>
                  <td>비밀번호 : <input type="password" name="pwd" placeholder="비밀번호" required></td>
                </tr>

              </div>
              <div class="row">
                <tr>
                <td>비밀번호 확인 : <input type="password" name="repwd" placeholder="비밀번호 확인" required></td>
              </tr>

              </div>
            </table>
              <input type="submit" name="" value="변경하기">
            </form>

            <?php
            if(isset($_POST['pwd'])&&isset($_POST['repwd'])) {

            if($_POST['pwd'] == $_POST['repwd'])
            {
              $hash_pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
              $sql = mq("UPDATE user SET pwd ='".$hash_pwd."' WHERE email ='".$_POST['email']."'");
              echo "<script>alert('수정 되었습니다. 다시 로그인해주세요.'); location.href='../log/login.php';</script>";
            }else {
              echo "<script>alert('입력하신 비밀번호와 일치하지 않습니다.'); location.reload(); history.back();  </script>";
                echo "<script>location.replace('./password_edit.php');</script>";

            }
          }

          } else{
        echo mysqli_error($db);
        echo "<script>alert('다시 입력해주세요.'); location.href='./password_find.php';</script>";
      }
      ?>

    </div>
    </body>
  </html>
