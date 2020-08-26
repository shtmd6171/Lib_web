<?php
include_once "../lib/db.php";
$page = $_POST['page'];
$genre = $_POST['genre'];
if($page == "") {
  $page = 1;
}
$from = ($page -1)*4;
if($genre != "NONE" && $_POST['selectedone']=="NONE" && $_POST['searchedone']=="NONE") {
  $sql = mq("select * from book where genre='".$_POST['genre']."' limit $from, 4");
  $count = mq("select count(*) from book where genre='".$_POST['genre']."'");
}
if($genre != "NONE" && $_POST['selectedone']!="NONE" && $_POST['searchedone']!="NONE")  {
    $sql = mq("select * from book where genre='".$_POST['genre']."' AND ".$_POST['selectedone']." LIKE'%".$_POST['searchedone']."%'");
    $count = mq("select count(*) from book where genre='".$_POST['genre']."' AND ".$_POST['selectedone']." LIKE'%".$_POST['searchedone']."%'");
}
if($genre == "NONE" && $_POST['selectedone']=="NONE" && $_POST['searchedone']=="NONE") {
  $sql = mq("select * from book limit $from, 4 ");
  $count = mq("select count(*) from book");
}
if($genre == "NONE" && $_POST['selectedone']!="NONE" && $_POST['searchedone']!="NONE") {
   $sql = mq("select * from book where ".$_POST['selectedone']." LIKE'%".$_POST['searchedone']."%' limit $from, 4");
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
    <div class="card d-flex flex-row mb-4 box-shadow h-md-250">
      <div class="card-body d-flex flex-column align-items-start">
        <strong class="d-inline-block mb-2 text-secondary"><?=$filtered['genre']?></strong>
        <h3 class="mb-0 card-title">
          <a class="text-dark booktitle" href="../review/review.php?id=<?= $filtered['book_id']?>"><?=$filtered['title']?></a>
        </h3>
        <div class="card-subtitle mb-1 text-muted bookauthor"><?=$filtered['author']?></div>
        <p class="card-subtitle card-text mb-auto "><?=$filtered['publisher']?>사의 신작</p>
        <span>
          <a class="card-link" href="../review/review_.php?id=<?= $filtered['book_id']?>">읽어보기</a>
            <?php if(isset($codecheck)){
            if($codecheck['code'] == 'A') {?>
            <a class="card-link" href="./book_update.php?id=<?= $filtered['book_id'] ?>">수정하기</a>
            <a class="card-link" href="./book_delete_process.php?id=<?= $filtered['book_id'] ?>">삭제</a>
      <?php }} ?>
    </span>
  </div>
  <img class="card-img-right img-thumbnail rounded flex-auto d-none d-md-block" src="../file/<?=$filtered['file']?>" alt="Card image cap" width="200px" height="250px">
  </div>
  </div>
<?php } ?>

<div class=" row col-12 mx-auto">


<div class="d-flex mx-auto">
  <div class="d-flex justify-content-center align-items-center">



<?php
 for ($i=1; $i <= $allcount; $i++) {
    if($i <= ceil($allcount/4)) {
   ?>
   <div class="col">
      <span onclick="paging('<?=$i?>')"><?=$i?></span>
   </div>


 <?php } } ?>
 </div>
</div>
</div>
