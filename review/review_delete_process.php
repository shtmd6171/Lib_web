<?php
/*이 곳은 서평을 작성한 사용자 또는 관리자가 책의 정보를 삭제하게 되는 기능을 맡은 구역이다.
삭제할 때는 다른 정보를 받아올 필요가 없기 때문에
바로 삭제기능을 수행하면 된다.
*/

include "../lib/db.php";
$review_id = $_GET['review'];
/* 삭제 기능의 핵심은 서평이 삭제될 때, 그와 관련된 모든 정보들도 삭제해야 한다는 점이다.
즉, 서평이 삭제될 때, 그 서평에 달린 댓글까지 전부 삭제가 진행되야 한다는 점이다.
만약 그렇지 않을 경우 서평은 삭제되어 있는데, 댓글은 dump값으로 계속 남아있게 된다.
*/

// $review_id값이 있고 (등록된 서평이 실제로 존재하고) $review_id가 빈 값이 아닐 때..
if(!($review_id==""&&(!(isset($review_id))))){
/*  Q.$booknum을 생성하는 이유는 뭔가요?
    A.현재 보고있던 서평 페이지가 사라지게되면, 삭제하고 난 후에 이동해야할 페이지는
      그 서평이 적혀있는 책의 정보가 있는 review.php이다.
      근데 review.php는 id(책 ID)값을 가지고 있기 때문에 그냥 돌아가게되면 잘못된 페이지로 이동한다.
      그렇기 때문에 삭제할 서평이 적혀있던 곳의 책 ID값을 얻은 것이다.
*/
$sql = mq("select * from book_review where review_id ='".$review_id."'");
$booklist = $sql->fetch_array();
$booknum = $booklist['book_id'];

// 서평 삭제
$sql = mq("delete from book_review where review_id ='".$review_id."'");
// 서평에 달린 댓글 삭제
$sql_comment = mq("delete from comment where review_id='".$review_id."'");
 echo "<script>alert('OK.')</script>";
 echo "<script>window.location = './review.php?id=$booknum'</script>";
} else {
  echo mysqli_error($db);
	echo "<script>alert(\"NO.\");</script>";
	echo "<script>window.location = './review.php?id=$booknum  '</script>";
}

  ?>
