<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>게시판</title>
</head>
<body>
  <h3>게시판</h3>
  <div id= "borad write">
    <h2><a href="/">등록</a></h2>
    <div id= write area>
        <form action="hwrite_ok.php" method="post" enctype="multipart/form-data">
         <div>
            이름: <input type="text" size="40" name="cont_1" id="cont" placeholder= "내용1" required>
         </div>
         <br>
         <div>
            연락처: <input type="text" size="35" name="cont_2" id="comt" placeholder= "내용2" required>
         </div>
         <br>
         <div>
           참가이유 <textarea name="cont_3" ></textarea>
         </div>
         <br>
         <div class="bt_se">
            <button type="submit">신청하기</button>   
          </div>
        </form>      
    </div>
    
  </div>
</body>
</html>