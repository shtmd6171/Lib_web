<?php
/* 이 곳은 책을 대여하기 위한 사이트. */
include "../lib/db.php";
$user_id = $_SESSION['user_id'];
$book_id = $_GET['id'];
$date = date("Y-m-d H:i:s");


$sql = mq("
);
$codecheck = $sql->fetch_array();



$insert = mq("INSERT INTO loan VALUES '$book_id', '$user_id', '$date'");


echo "$codecheck['name'].이 빌린 책은 ";





?>
