<?php include  $_SERVER['DOCUMENT_ROOT']."/db.php"; ?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>영화 목록</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/common.css" />
</head>
<body>
  <?php include './head.php'?>
   </div>

<div id="movie_info_area"> 
  <h1>행사목록</h1>
  <h4>행사를 등록 및 관리하는 페이지 입니다.</h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">순서</th>
                <th width="150">행사이름</th>
                <th width="120">행사 일</th>
                <th width="100">참가신청</th>
                <th width="100">행사장소</th>
            <th width="100">포스터</th>
            
            </tr>
        </thead>
        <?php
        // movie_info테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
          $sql = mq("select * from movie_info order by m_idx desc limit 0,5"); 
            while($movie_info = $sql->fetch_array())
            {
              //title변수에 DB에서 가져온 title을 선택
              $title=$movie_info["name"]; 
              if(strlen($title)>30)
              { 
                //title이 30을 넘어서면 ...표시
                $title=str_replace($movie_info["name"],mb_substr($movie_info["name"],0,30,"utf-8")."...",$movie_info["name"]);
           }
        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $movie_info["m_idx"]; ?><a></td>
          <td width="150"><a href="./movie_read.php?idx=<?php echo $movie_info["m_idx"];?>"><?php echo $title;?></a></td>
          <td width="120"><?php echo $movie_info['cont_1']?></td>
          <td width="100"><?php echo $movie_info['cont_2']?></td>
          <td width="100"><?php echo $movie_info['cont_3']; ?></td>
        <td width="100"><img src="http://localhost/img/poster/<?php echo $movie_info['lo_image_link']; ?>" width="100"/></td>        
      
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <div id="write_btn">
      <a href="./movie_write.php"><button>글쓰기</button></a>
	   <a href="./test.php"><button>후기 올리기</button></a>
    </div>
  </div>
  
</body>
</html>