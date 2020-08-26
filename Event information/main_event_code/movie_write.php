<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>이벤트 등록</title>
</head>
<body>
  <h3>이벤트 등록 페이지/h3>
  <div id= "borad write">
    <h2><a href="/">등록</a></h2>
    <div id= write area>
        <form action="movie_write_ok.php" method="post" enctype="multipart/form-data">
         <div>
            제목: <input type="text" size="35" name="name" id="name" placeholder= "제목" required>
         </div>
         <br>
         <div>
            작성자: <input type="text" size="40" name="cont_1" id="cont" placeholder= "작성자" required>
         </div>
         <br>
         <div>
            이벤트 기간: <input type="dete" size="35" name="cont_2" id="cont" placeholder= "" required>
         </div>
         <br>
         <div>
            이벤트 내용: <textarea name="cont_3" ></textarea>
         </div>
         <br>
         <div>
            첨부 파일: <input type="file" name="lo_image_link" value="1">
         </div>
         <br>
         <div class="bt_se">
            <button type="submit">이벤트 등록</button>   
          </div>
        </form>      
    </div>
    
  </div>
</body>
</html>