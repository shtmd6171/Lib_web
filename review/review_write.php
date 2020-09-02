<?php
/* 이 곳은 사용자, 관리자 모두 접속할 수 있는 페이지이다.
사용자는 review.php에서 리뷰를 등록할 수 있고
이 페이지는 등록하고 싶은 리뷰를 적는 곳이다.
*/

include "../lib/db.php";

/* 서평은 테이블 내부에서
book_id와 user_id를 모두 필요로 한다.
누가 썼는지 알아야되고, 어떤 책의 대한 서평인지 알아야하기 때문.
그렇기에 이 두 정보를 모두 받고 hidden 타입으로 $_POST 값에 집어넣는다.
*/

$book_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
</html>
