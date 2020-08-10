<?php
	include $_SERVER['DOCUMENT_ROOT']."/db.php"; /* db load */
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>행사 정보</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/common.css" />
</head>
<body>
	<div>
		<nav id="topMenu"	>
			<ul>
				<li><a class="menuLink" href="/page/main.php">Logo</a></li>
				<li><a class="menuLink" href="/member/logout.php">북마크</a></li>
				<li><a class="menuLink" href="/member/mypage.php">마이페이지</a></li>
				<li><a class="menuLink" href="/member/logout.php">로그아웃</a></li>
			</ul>
		</nav>
	</div>
	
	<?php
		$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
		/* 조회수 필요 시 사용
		$hit = mysqli_fetch_array(mq("select * from movie_info where m_idx ='".$bno."'"));
		$hit = $hit['hit'] + 1;
		$fet = mq("update movie_info set hit = '".$hit."' where m_idx = '".$bno."'");*/
		$sql = mq("select * from movie_info where m_idx='".$bno."'"); /* 받아온 idx값을 선택 */
		$movie_info = $sql->fetch_array();
	?>
	
	<h1>행사 정보</h1>
	<br>
	
		<div id="movie_read">
			<div>
				제목: <?php echo $movie_info['name']; ?>
				</div>
				<br>
				<div>
				행사일: <?php echo $movie_info['cont_1']; ?>
				</div>
				<br>
				<div>
				참가신청일: <?php echo $movie_info['cont_2']; ?>
				</div>
				<br>
				<div>
				장소: <?php echo $movie_info['cont_3']; ?>
				</div>
				<div>
				<br>
				이미지: <img src="http://localhost/img/poster/<?php echo $movie_info['lo_image_link']; ?>">
				</div>
				<br>
		</div>
		
		<!-- 목록, 수정, 삭제 -->
		<div id="bo_ser">
			<ul>
				<li><a href="./movie_list.php">[목록으로]</a></li>
				<li><a href="./movie_modify.php?idx=<?php echo $movie_info['m_idx']; ?>">[수정]</a></li>
				<li><a href="./movie_delete.php?idx=<?php echo $movie_info['m_idx']; ?>">[삭제]</a></li>
			</ul>
		</div>
		
		
    </body>
</html>