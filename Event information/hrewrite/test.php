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
            작성자: <input type="text" size="35" name="cont_1" id="cont_1" placeholder= "작성자" required>
         </div>
         <br>
         <div>
            이벤트 기간: <input type="date" size="40" name="cont_2" id="cont_2" placeholder= " " required>
         </div>
         <br>
         <div>
            이벤트 후기 내용: <textarea name="cont_3" ></textarea>
         </div>
         <br>
         <div class="bt_se">
           <a href="./test_list.php"><button>후기 등록하기</button></a>   
          </div>
        </form>      
    </div>
    
  </div>
</body>
</html>