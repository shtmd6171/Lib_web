<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>후기 게시판</title> 
</head>
<body>
  <h3>후기 게시판</h3>
  <div id= "borad write">
    <h2><a href="/">등록</a></h2>
    <div id= write area>
        <form action="test_ok.php" method="post" enctype="multipart/form-data">
         <div>
            제목: <input type="text" size="35" name="name" id="name" placeholder= "제목" required>
         </div>
		 <div>
            제목: <input type="text" size="35" name="ba" id="ba" placeholder= "제목" required>
         </div>
         <br>
         <div>
            행사일: <input type="date" size="40" name="day" id="day" placeholder= " " required>
         </div>
         <br>
         <div>
            후기: <textarea name="reviwe" ></textarea>
         </div>
         <br>
         <div class="bt_se">
            <button type="submit">글 작성</button>   
          </div>
        </form>      
    </div>
    
  </div>
</body>
</html>