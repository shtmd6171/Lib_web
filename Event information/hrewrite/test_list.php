<?php include  $_SERVER['DOCUMENT_ROOT']."/db.php"; ?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>이벤트 목록</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/common.css" />
</head>
<body>
  <?php include './head.php'?>
   </div>

<div id="movie_info_area"> 
  <h1>이벤트 목록</h1>
  <h4>이벤트를 등록 및 관리하는 페이지 입니다.</h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">순서</th>
                <th width="150">제목</th>
                <th width="120">작성자</th>
                <th width="100">이벤트 기간</th>
                <th width="100">이벤트 후기 내용</th>
            
            </tr>
        </thead>
        <?php
        // movie_info테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
          $sql = mq("select * from event order by m_idx desc limit 0,5"); 
            while($event = $sql->fetch_array())
            {
              //title변수에 DB에서 가져온 title을 선택
              $title=$event["name"]; 
              if(strlen($title)>30)
              { 
                //title이 30을 넘어서면 ...표시
                $title=str_replace($event["name"],mb_substr($event["name"],0,10,"utf-8")."...",$event["name"]);
           }
        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $event["m_idx"]; ?><a></td>
          <td width="150"><a href="./htestpage.php?m_idx=<?php echo $event["m_idx"];?>"><?php echo $title;?></a></td>
          <td width="120"><?php echo $event['cont_1']?></td>
          <td width="100"><?php echo $event['cont_2']?></td>
          <td width="100"><?php echo $event['cont_3']; ?></td>      
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <div id="write_btn">
	   <a href="./test_list.php"><button>후기 올리기</button></a>
    </div>
  </div>
  
</body>
</html>