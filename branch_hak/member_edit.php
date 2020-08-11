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


<form id="mform" method="post" action="member_edit_ok.php">

  <div class="title-container"></div>
    <fieldset class="line">
      <legend>Required</legend>
        <table align="center" border="0" cellspacing="0" width="600">
          <tr>
            <td>email</td>
            <td colspan="9">
              <input type="email" size="35" name="email" value="<?php echo $email ?>" readonly>
            </td>

          </tr>
          <tr>
            <td>Pwd</td>
            <td colspan="9">
              <input type="password" size="35" name="pwd" placeholder="비밀번호" required></td>
          </tr>
          <tr>
            <td>Re Pwd</td>
            <td colspan="9">
              <input type="password" size="35" name="repwd" placeholder="비밀번호 확인" required></td>
          </tr>
          <tr>
            <td>Name</td>
            <td colspan="9">
              <input type="text" size="35" name="name" value="<?php echo $name ?>" required></td>
          </tr>
          <tr>
            <td>Address</td>
            <td colspan="9">
              <input type="text" size="35" name="addr" value="<?php echo $addr ?>" required></td>
          </tr>
          <tr>
            <td>tell</td>
            <td colspan="9">
              <input type="text" size="35" name="tel" value="<?php echo $tel ?>" ></td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="edit" value="수정 완료">
            </td>
      </table>
    </fieldset>

      <button onclick="goBack()">Go Back</button>

      <script>
      function goBack() {
        window.history.back();
      }
      </script>
