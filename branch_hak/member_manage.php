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
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="./javascr/onClickFunc.js"></script>
    <title></title>

  </head>
  <body>
    <div class="container">
    <div class="row">
                <div class="col-md-2 m">
                  <?php if($codecheck['code'] == 'A'):?>
                  <?php echo $name."(관리자님) 환영합니다."; ?>

                  <?php else : ?>
                  <?php echo $name."(님) 환영합니다."; ?>
                  <?php endif; ?>
                </div>
                    <div class="col-md-8">
                    </div>
                <div class="col-md-2 m">
                    수정수정
                </div>
            </div>



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
                    <input type="password" size="35" name="pwd" placeholder="비밀번호는 비공개 정보입니다." readonly></td>
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
                  <td><button class="mine wb"><a href="./member_edit.php">회원 수정</a></button>
                  </td>
                  <td> <button class="mine wb"><a href="./member_delete.php">탈퇴 등록</a></button>
                  </td>
            </table>
          </form>
        </fieldset>


      <?php if($codecheck['code'] == 'A') {?>

      <button class="mine wb"><a href=""> 관리자 권한 회원 탈퇴등록 하기</a></button>
      <?php } ?>

    </form>
    <button class="mine wb"><a href="./purchase_list.php">구매 리스트</a></button>
    <button class="mine wb"><a href="./loan_list.php">대여 리스트</a></button>
    <button class="mine wb"><a href="./favorite_list.php">찜 리스트</a></button>

    <button onclick="goBack()">Go Back</button>

    <script>
    function goBack() {
      window.history.back();
    }
    </script>
    </div>
  </body>
</html>
