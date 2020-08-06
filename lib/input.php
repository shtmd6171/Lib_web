<?php
include "../review_board.php";

$alal = "<form action=\"comment_process.php\" method=\"post\">";
$alal .= "<input type=\"hidden\" name=\"id\" value=\"\$row['user_id']\">";
$alal .= "<textarea name=\"\" rows=\"12\" cols=\"80\" placeholder=\"댓글을 입력하세요\"></textarea>"."&nbsp"."<input type=\"submit\" name=\"\" value=\"등록\">";
$alal .= "</form>";
 ?>
