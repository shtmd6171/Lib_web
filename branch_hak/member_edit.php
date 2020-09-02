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
        <table align="center" border="0" cellspacing="0" width="600">

