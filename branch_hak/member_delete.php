<?php
include "../lib/db.php";
$user_id = $_SESSION['user_id'];

$sql = mq("select * from user where user_id ='".$user_id."'");
$codecheck = $sql->fetch_array();

$email = $codecheck['email'];
$name = $codecheck['name'];

?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="./javascr/onClickFunc.js"></script>
    <title></title>


<form id="mform" method="post" action="./member_delete_ok.php">

  <div class="title-container"></div>
    <fieldset class="line">
      <legend>회원 탈퇴</legend>
        <table align="center" border="0" cellspacing="0" width="600">
          <tr>
            <td>email</td>
            <td colspan="9">
              <input type="email" size="35" name="email" value="<?php echo $email ?>" required>
            </td>
          </tr>

          <tr>
            <td>Name</td>
            <td colspan="9">
              <input type="text" size="35" name="name" value="<?php echo $name ?>" required></td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="edit" value="탈퇴 하기">
            </td>
      </table>
    </fieldset>
  </form>

      <button onclick="goBack()">Go Back</button>

      <script>
      function goBack() {
        window.history.back();
      }
      </script>
