<?php
include "../lib/db.php";
  //  user 테이블의 eamil 필드와 입력받은 email이 같으면 해당 email 필드 값 전부 조회
  $sql = mq("SELECT * FROM user WHERE email ='".$_POST['email']."'");
  $usercheck = $sql->fetch_array();



  ?>

  <!DOCTYPE html>
  <html lang="ko" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>

    <?php  if($_POST['email'] == $usercheck['email'] && $_POST['tel'] == $usercheck['tel'])
      { ?>

          <form method="post" action="./password_edit.php" >
            <table border="1">
                <tr>
                  <td>비밀번호 : <input type="password" name="pwd" placeholder="비밀번호" required></td>
                </tr>
                <tr>
                  <td>다시 비밀번호 : <input type="password" name="repwd" placeholder="비밀번호 확인" required></td>
                </tr>
              <table>
              <input type="submit" name="" value="submit">
            </form>

            <?php
            if($_POST['pwd'] == $_POST['repwd'])
            {
              $hash_pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
              $sql = mq("UPDATE user SET pwd ='".$hash_pwd."' WHERE email ='".$_POST['email']."'");
              echo "<script>alert('수정 되었습니다. 다시 로그인해주세요.'); location.href='../log/login.php';</script>";
            }else {
              echo "<script>alert('입력하신 비밀번호를 똑같이 작성해주세요.'); location.href='./password_edit.php';</script>";
            }

          }?>

      <?php}
    else{
        echo mysqli_error($db);
        echo "<script>alert('다시 입력해주세요.'); location.href='./password_find.php';</script>";
      }
      ?>
    </body>
  </html>
