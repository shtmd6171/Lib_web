<?php

/*이 곳은 관리자가 책의 정보를 삭제하게 되는 기능을 맡은 구역이다.
삭제할 때는 관리자로부터 다른 정보를 받아올 필요가 없기 때문에
바로 삭제기능을 수행하면 된다.
*/
include "../lib/db.php";
$book_id = $_GET['id'];
/* 삭제 기능의 핵심은 책이 삭제될 때, 그와 관련된 모든 정보들도 삭제해야 한다는 점이다.
즉, 책이 삭제될 때, 그 책에 달린 서평과, 그 서평에 달린 댓글까지 전부 삭제가 진행되야 한다는 점이다.
만약 그렇지 않을 경우 책은 삭제되어 있는데, 서평과 댓글은 dump값으로 계속 남아있게 된다.
*/

// $book_id값이 있고 (등록된 책이 실제로 존재하고) $book_id가 빈 값이 아닐 때..
if(!($book_id==""&&(!(isset($book_id))))){
$sql = mq("select * from book where book_id ='".$book_id."'");
$get_file = $sql->fetch_array();
// unlink(경로 및 이름)는 () 안에 있는 동일한 이름의 파일을 삭제하는 기능이다.
// 책이 삭제될 때, 책의 사진도 같이 삭제한다.
unlink('../file/'.$get_file['file']);

// 현재 선택한 책을 삭제한다.
$sql = mq("delete from book where book_id ='".$book_id."'");

// 현재 책에 작성한 서평들을 조회하고 삭제한다.
$sql_review_getID = mq("select * from book_review where book_id ='".$book_id."'");
$getID = $sql_review_getID->fetch_array();
$sql_review = mq("delete from book_review where book_id='".$book_id."'");

//현재 책에 작성한 서평에 달린 댓글을 삭제한다.
$sql_comment = mq("delete from comment where review_id='".$getID['review_id']."'");
 echo "<script>alert('OK.')</script>";
 echo "<script>window.location = './book_list.php'</script>";
} else {
  echo mysqli_error($db);
	echo "<script>alert(\"NO.\");</script>";
	echo "<script>window.location = './book_list.php'</script>";
}

  ?>
