<?php
include "../lib/db.php";
$user_id = $_SESSION['user_id'];

$sql = mq("select * from user where user_id ='".$user_id."'");
$codecheck = $sql->fetch_array();

$email = $codecheck['email'];
$name = $codecheck['name'];
$addr = $codecheck['addr'];
$tel = $codecheck['tel'];
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
    <h1>MemberShip Page</h1>

    <?php if($codecheck['code'] == 'A'):?>
    <?php echo $name."(관리자님) 환영합니다."; ?>

    <?php else : ?>
    <?php echo $name."(님) 환영합니다."; ?>
    <?php endif; ?>


      <form id="mform" method="post">

        <div class="title-container"></div>
          <fieldset class="line">
            <legend>회원 정보</legend>
              <table align="center" border="0" cellspacing="0" width="600">
                <tr>
                  <td>email</td>
                  <td colspan="9">
                    <input type="email" size="35" name="email" placeholder="<?php echo $email ?>" readonly required>
                  </td>

                </tr>
                <tr>
                  <td>Pwd</td>
                  <td colspan="9">
                    <input type="password" size="35" name="pwd" placeholder="***************" readonly></td>
                </tr>
                <tr>
                  <td>Name</td>
                  <td colspan="9">
                    <input type="text" size="35" name="name" placeholder="<?php echo $name ?>" readonly></td>
                </tr>
                <tr>
                  <td>Address</td>
                  <td colspan="9">
                    <input type="text" size="35" name="addr" placeholder="<?php echo $addr ?>" readonly ></td>
                </tr>
                <tr>
                  <td>tell</td>
                  <td colspan="9">
                    <input type="text" size="35" name="tel" placeholder="<?php echo $tel ?>" readonly></td>
                </tr>

                <tr>
                  <td><button class="mine wb"><a href="member_edit.php">회원 수정</a></button>
                  </td>
                  <td> <button class="mine wb"><a href="./member_delete.php">탈퇴 등록</a></button>
                  </td>


            </table>
          </form>









      <?php if($codecheck['code'] == 'A') {?>

      <button class="mine wb"><a href="./wirte.php"> 관리자 권한 회원 탈퇴등록 하기</a></button>
      <?php } ?>

    </form>

  </body>
</html>
