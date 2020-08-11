<?php
/* 이 곳은 관리자만 볼 수 있는 페이지이다.
이 페이지에서는 관리자가 유저의 정보를 관리할 수 있다. */

include_once "../lib/db.php";
include_once "../log/password.php";
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      td {
        width: 90%;
      }
    </style>
  </head>
  <body>
    <h1>BOOK REVIEW</h1>
  <?php
      $sql = mq("select * from user where code ='U'");
      $userlist = $sql->fetch_array();
      $filtered = array(
        'user_id' => htmlspecialchars($userlist['user_id']),
        'email' => htmlspecialchars($userlist['email']),
        'addr' => htmlspecialchars($userlist['addr']),
        'name' => htmlspecialchars($userlist['name']),
        'gender' =>htmlspecialchars($userlist['gender']),
        'tel' =>htmlspecialchars($userlist['tel']),
        'code' =>htmlspecialchars($userlist['code'])
      );?>
      <br>
      <table class="list" cellpadding="5" border="1" align="center">
      <tr class="value">
        <th>User ID</th>
        <td><p><?= $filtered['user_id'] ?></p></td>
        <td><p><?= $filtered['user_id'] ?></p></td>
      </tr>
      <tr>
        <th>Email</th>
        <td><p><?= $filtered['email'] ?></p></td>
      </tr>
      </table>
  </body>
  </html>
