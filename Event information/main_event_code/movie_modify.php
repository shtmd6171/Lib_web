<!--- 게시글 수정 -->

<?php
	include $_SERVER['DOCUMENT_ROOT']."/db.php";
   
	$bno = $_GET['idx'];
	$sql = mq("select * from movie_info where m_idx='$bno';");
	$board = $sql->fetch_array();
 ?>

<!doctype html>
<head>
<meta charset="UTF-8">
<title>행사 정보 수정</title>
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
	
	<div id="board_write">
	<br>
        <h1><a href="/">행사 정보 수정</a></h1>
            <div id="write_area">
                <form action="movie_modify_ok.php?idx=<?php echo $bno; ?>" method="post">
					<div id="in_title">
					제목: <input type="text" size="35" name="name" id="name" placeholder="<?php echo $movie_info['m_name'];?>" required>
					</div>
					<br>
					<div>
					행사일: <input type="text" size="40" name="lead_role" id="lead_role" placeholder="<?php echo $movie_info['m_lead_role']; ?>" required>
					</div>
					<br>
					<div>
					참가 신청일: <input type="text" size="35" name="Opening_date" id="Opening_date" placeholder="<?php echo $movie_info['m_Opening_date']; ?>" required>
					</div>
					<br>
					<div>
					장소: <input type="text" size="35" name="OST" id="OST" placeholder="<?php echo $movie_info['m_OST']; ?>" required>
					</div>
					<br>
					<div>
					이미지: <input type="text" size="38" name="lo_image_link" id="lo_image_link" placeholder="<?php echo $movie_info['m_lo_image_link']; ?>" required>
					</div>
                    <div class="bt_se">
                        <button type="submit">정보 수정</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>