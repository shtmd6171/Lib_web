<script type="text/javascript">
  $(function() {
    var myloading = false;
   var mypage = 1;
    function paging(number) {
      $.post("./scrolltest.php",
           {page : mypage, loading : myloading },
           function(data){ $("#list").html(data); });
    }
  });
</script>

<!-- 서평  -->
<?php
$sql = mq("select * from book_review where book_id ='".$book_id."'");
$review_write_check= $sql->num_rows;
$sql = mq("select ROUND(AVG(review_rating),2) as result from book_review where book_id ='".$book_id."'");
$review_rating_avg = $sql->fetch_array();?>

<div class="my-3 p-3 bg-white rounded box-shadow">
  <h4 class="border-bottom border-gray pb-2 mb-0">리뷰&nbsp;<small>(<?=$review_rating_avg['result']?>/ 5.00)&nbsp;<small><?=$review_write_check?>명참여</small></samll></h4>
<?php
  if(isset($book_id)&&(!(isset($_POST['selected'])))) {
  $sql = mq("select * from book_review, user where book_id='".$book_id."'
  AND book_review.user_id = user.user_id");
  } else if(isset($book_id)&&((isset($_POST['selected'])))) {
    $sql = mq("select * from book_review, user where book_id='".$book_id."'
    AND book_review.user_id = user.user_id AND ".$_POST['selected']." LIKE '%".$_POST['search']."%'");
  }
  while($reviewlist = $sql->fetch_array()){
    $filtered = array(
      'review_id' => htmlspecialchars($reviewlist['review_id']),
      'review_title' => htmlspecialchars($reviewlist['review_title']),
      'review_desc' => htmlspecialchars($reviewlist['review_desc']),
      'user_id' => htmlspecialchars($reviewlist['user_id']),
      'name' => htmlspecialchars($reviewlist['name']),
      'review_rating' => htmlspecialchars($reviewlist['review_rating'])
    );?>
  <div class="media text-muted pt-3">
    <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
    <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
      <strong class="d-block text-gray-dark testing"><?= $filtered['review_title']; ?>&nbsp;<small><?=$filtered['review_rating'];?>점</small></strong>
      <?= $filtered['review_desc'];
        if($reviewcheck != NULL) {
          if($filtered['user_id'] == $reviewcheck['user_id'] || $codecheck['code'] == 'A'  ) { ?>
            <div class="text-right border-bottom mt-auto">
              <strong class="d-flex-column text-gray-dark"></strong>
              <a href="./review_update.php?review=<?= $filtered['review_id'] ?>">수정</a>
              <a href="./review_delete_process.php?review=<?= $filtered['review_id'] ?>">삭제</a>
            </div>
          <?php  }
        } else if ($reviewcheck == NULL && $codecheck != NULL ) {
          if($codecheck['code'] == 'A'  ) { ?>
            <a href="./review_update.php?review=<?= $filtered['review_id'] ?>">수정</a>
            <a href="./review_delete_process.php?review=<?= $filtered['review_id'] ?>">삭제</a>
          <?php } }?>
    </p>
  </div>
  <?php } ?>
  <small class="d-block text-right mt-3">
    <a href="#">전체보기</a>
  </small>
</div>
