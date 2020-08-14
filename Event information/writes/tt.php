<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
   <title> 행사 갤러리</title>
</head>
    <body>
	    <form action="tt_ok.php" method="post" enctype="multipart/form-data">
		<div>
            제목: <input type="text" size="40" name="name" id="name" placeholder= "정확하게 써달라" required>
        </div>
		<br>
		<div>
            파일: <input type="file" name="img" value="1">
        </div>
              <br>
         <div class="bt_se">
            <a href="./testlist.php"><button>등록</button>   
          </div>
        </form>
	</body>
</html>