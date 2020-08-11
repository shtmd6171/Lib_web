<?php
include "../lib/db.php";

/*
코멘트를 등록하기 위해서는 작성한 유저와 서평의 정보를 알고 있어야한다.
다만, 유저의 정보는 이미 book_review 테이블 (서평 테이블)에 저장되어 있기 때문에
review_id 정보만 알고 있어도 충분하다. (review_id를 알면 user_id를 얻을 수 있기 때문)

즉, 현재 comment 테이블은 3정규화를 위배한 형태로 데이터베이스를 구축 했다는 뜻이다.
(user -> review 이면서 user -> comment 이기 때문에 review -> comment 로 수정해야한다.)
이 DB수정은 DB 정규화의 내용을 다룰 때 자세히 설명하며 수정하겠다.

한마디로, 지금은 문제없이 잘 돌아가지만, 차후에 문제가 생길 수 있는 DB구성이라는 뜻
*/
$user_id = $_POST['user_id'];
$review_id = $_POST['review_id'];
$comm_description = $_POST['desc'];

if(!($user_id==""||$review_id==""||$comm_description=="")){
$sql = mq("insert into comment (comm_description,review_id,user_id) values('".$comm_description."','".$review_id."','".$user_id."')");
 echo "<script>window.location = '../review/review_board.php?review=$review_id'</script>";
} else {
  echo mysqli_error($db);
	echo "<script>alert(\"NO.\");</script>";
	echo "<script>window.location = '../review/review_board.php?review=$review_id'</script>";
}



 ?>
