<?php
include "../lib/db.php";

$page = $_GET['page'];
if($page == "") {
  $page = 1;
}
$from = ($page -1)*3;
$sql = mq("select * from book limit $from, 3");
$count = mq("select count(*) from book");
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
  <table class="list" cellpadding="5" border="1" align="center">
  <tr class="tltle">
    <th>Title</th>
    <th>Author</th>
    <th>Publisher</th>
    <th>The_Day</th>
    <th>Genre</th>
    <th>Image</th>
    <th>이 책의 관한 서평</th>
  </tr>
  <tr class="value">
    <td><p><?= $filtered['title'] ?></p></td>
    <td><p><?= $filtered['author'] ?></p></td>
    <td><p><?= $filtered['publisher'] ?></p></td>
    <td><p><?= $filtered['the_date'] ?></p></td>
    <td><p><?= $filtered['genre'] ?></p></td>
    <td><p><img src="../file/<?= $filtered['file'] ?>" alt="이미지 없음" width="200" height="200"></p></td>
    <td><a href="../review/review.php?id=<?= $filtered['book_id'] ?>">보기</a> </td>
    <?php } ?>
  </tr>
  </table>

<?php
 for ($i=1; $i <= $allcount; $i++) {
    if($i <= ceil($allcount/3)) {
   ?>
   <span onclick="paging('<?= $i ?>')"><?= $i ?></span>

 <?php } } ?>
