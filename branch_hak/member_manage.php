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
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="./javascr/onClickFunc.js"></script>
  <title></title>
  <style media="screen">
  .row > table{
    width : 1280px;
  }
  </style>

</head>
<body>
  <header class="blog-header py-3 sticky-top"></header>
  <div class="container">
    <div class="row">
      <div class="col-md-2 m">
        <?php if($codecheck['code'] == 'A'):?>
          <?php echo $name."(관리자님) 환영합니다."; ?>

        <?php else : ?>
          <?php echo $name."(님) 환영합니다."; ?>
        <?php endif; ?>
      </div>
      <div class="row">

      </div>
      <div class="col-md-8">
      </div>
      <div class="col-md-2 mb-3">
        <a class="btn btn-outline-primary" href="../branch_hak/user_crystal.php">수정수정</a>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-3">
        <button class="mine wb"><a href="./purchase_list.php">구매 리스트</a></button>
      </div>
      <div class="col-md-3">
        <button class="mine wb"><a href="./loan_list.php">대여 리스트</a></button>
      </div>
      <div class="col-md-3">
        <button class="mine wb"><a href="./favorite_list.php">찜 리스트</a></button>
      </div>
      <div class="col-md-3">
        <button onclick="goBack()">Go Back</button>

        <script>
        function goBack() {
          window.history.back();
        }
        </script>
      </div>
    </div>
    <div class="title-container"></div>
    <fieldset class="line">
      <div class="row mb-5">
        <div class="col-md-4">
          현재 이용중인 멤버쉽</div>
          <div class="col-md-5">finished
            <div class="row"></div>
            다 읽은 책 후기 작성하기
            <div class="row">
              <img src="../file/nonama.png" alt="">
              <img src="../file/nonama.png" alt="">
              <img src="../file/nonama.png" alt="">
              <img src="../file/nonama.png" alt="">
            </div>
          </div>
        </div>
        <div class="row">
          조회
        </div>
        <div class="row">
          <div class="col-md-2">
            <input type="date">
          </div>
          <div class="col-md-1 booter">
            ~
          </div>
          <div class="col-md-2">
            <input type="date">
          </div>
          <div class="col-md-5">
            <input type="select">
            <select>
              <option>제목</option>
              <option>출판사</option>
              <option>저자</option>
              <option>주문번호</option>
              <option>해당없음</option>
            </select>
          </div>
          <div class="col-md-2">
            <input type="submit">
          </div>
        </div>
        <div class="row mb-5">
          <div class="row">
            <table border="1">
              <thead>
                <tr>
                  <th>구매 / 대여일</th>
                  <th>주문번호</th>
                  <th>상품명</th>
                  <th>비고</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
        </fieldset>
        <?php if($codecheck['code'] == 'A') {?>

          <button class="mine wb"><a href=""> 관리자 권한 회원 탈퇴등록 하기</a></button>
        <?php } ?>
      </form>
    </div>
  </body>
  </html>
