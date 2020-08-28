<?php
include_once "../lib/db.php";
include_once "../lib/resizing.php";
$page = $_POST['page'];
$genre = $_POST['genre'];
if($page == "") {
  $page = 1;
}
$from = ($page -1)*6;
if($genre != "NONE" && $_POST['selectedone']=="NONE" && $_POST['searchedone']=="NONE") {
  $sql = mq("select * from book where genre='".$_POST['genre']."' limit $from, 6");
  $count = mq("select count(*) from book where genre='".$_POST['genre']."'");
}
if($genre != "NONE" && $_POST['selectedone']!="NONE" && $_POST['searchedone']!="NONE")  {
    $sql = mq("select * from book where genre='".$_POST['genre']."' AND ".$_POST['selectedone']." LIKE'%".$_POST['searchedone']."%' limit $from, 6");
    $count = mq("select count(*) from book where genre='".$_POST['genre']."' AND ".$_POST['selectedone']." LIKE'%".$_POST['searchedone']."%'");
}
if($genre == "NONE" && $_POST['selectedone']=="NONE" && $_POST['searchedone']=="NONE") {
  $sql = mq("select * from book limit $from, 6 ");
  $count = mq("select count(*) from book");
}
if($genre == "NONE" && $_POST['selectedone']!="NONE" && $_POST['searchedone']!="NONE") {
   $sql = mq("select * from book where ".$_POST['selectedone']." LIKE'%".$_POST['searchedone']."%' limit $from, 6");
   $count = mq("select count(*) from book where ".$_POST['selectedone']." LIKE'%".$_POST['searchedone']."%'");
}


$bookcount = $count->fetch_array();
$allcount = $bookcount['count(*)'];

while($booklist = $sql->fetch_array()){
  $filtered = array(
    'book_id' => htmlspecialchars($booklist['book_id']),
    'title' => htmlspecialchars($booklist['title']),
    'author' => htmlspecialchars($booklist['author']),
    'publisher' => htmlspecialchars($booklist['publisher']),
    'the_date' => htmlspecialchars($booklist['the_date']),
    'genre' => htmlspecialchars($booklist['genre']),
    'file' => htmlspecialchars($booklist['file'])
  );?>
  <div class="col-sm-12 col-md-6">
    <div data-aos="flip-up"
     data-aos-easing="ease-in-out-back"
     data-aos-duration="1000" class="card d-flex flex-row mb-4 box-shadow h-md-250">
      <div class="card-body d-flex flex-column align-items-start" >
        <strong class="d-inline-block mb-2 text-secondary"><?=$filtered['genre']?></strong>
        <h3 class="mb-0 card-title">
          <a class="text-dark booktitle" href="../review/review.php?id=<?= $filtered['book_id']?>"><?=$filtered['title']?></a>
        </h3>
        <div class="card-subtitle mb-1 text-muted bookauthor"><?=$filtered['author']?></div>
        <p class="card-subtitle card-text mb-auto "><?=$filtered['publisher']?>사의 신작</p>
        <span>
          <a class="card-link" href="../review/review.php?id=<?= $filtered['book_id']?>">읽어보기</a>
            <?php if(isset($_POST['code'])){
            if($_POST['code'] == 'A') {?>
            <a class="card-link" href="./book_update.php?id=<?= $filtered['book_id'] ?>">수정하기</a>
            <a class="card-link" href="./book_delete_process.php?id=<?= $filtered['book_id'] ?>">삭제</a>
      <?php }} ?>
    </span>
  </div>
  <?php if(isset($filtered['file'])&&$filtered['file']!="")  {
    $img = $filtered['file'];
    resize_image("../file/original/$img", "../file/resize/resizing_$img", 200, 250);  ?>
  <img data-aos="fade"
   data-aos-easing="ease-in-out"
   data-aos-duration="1650" class="card-img-right img-thumbnail rounded flex-auto d-none d-md-block" src="../file/resize/resizing_<?=$img?>" alt="Card image cap" width="200" height="250">
  <?php } else { ?>
  <img data-aos="fade"
   data-aos-easing="ease-in-out"
   data-aos-duration="1650" class="card-img-right img-thumbnail rounded flex-auto d-none d-md-block" src="../file/no_image_session.jpg" width="200" height="250">
  <?php }?>
  </div>
  </div>

  <script>
    AOS.init();
  </script>
<?php } ?>

<div class=" row col-12 mx-auto">


<div class="d-flex mx-auto">
  <div class="d-flex justify-content-center align-items-center">



<?php
 for ($i=1; $i <= $allcount; $i++) {
    if($i <= ceil($allcount/6)) {
   ?>
   <div class="col">
      <span onclick="paging('<?=$i?>'); href.location = '#list'"><?=$i?></span>
   </div>


 <?php } } ?>
 </div>
</div>
</div>
