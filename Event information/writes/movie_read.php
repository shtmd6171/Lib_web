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
				<div id="write_btn">
       <a href="./hwrite.php"><button>신청하기</button></a>
    </div>
		</div>
		
		<!-- 목록, 수정, 삭제 -->
		<div id="bo_ser">
			<ul>
				<li><a href="./movie_list.php">[목록으로]</a></li>
				<li><a href="./movie_modify.php?idx=<?php echo $movie_info['m_idx']; ?>">[수정]</a></li>
				<li><a href="./movie_delete.php?idx=<?php echo $movie_info['m_idx']; ?>">[삭제]</a></li>
			</ul>
		</div>
		
		
 <div class="reply_view">
			<h3>댓글목록</h3>
				<?php
					$sql = mq("select * from reply where con_num='".$bno."' order by con_num desc");
					while($reply = $sql->fetch_array()){ 
				?>

				<div class="dap_lo">
					<div><b><?php echo $reply['name'];?></b></div>
					<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
				<div class="rep_me dap_to"><?php echo $reply['con_num']; ?></div> 
					<div class="rep_me rep_menu">
						<a class="dat_edit_bt" href="#">수정</a>
						<a class="dat_delete_bt" href="#">삭제</a>
					</div>
				
					</div>
				</div>
			<?php } ?>

			<!--- 댓글 입력 폼 -->
			<div class="dap_ins">
				<form action="reply_ok.php?idx=<?php echo $bno; ?>" method="post">
					<input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디">
					<input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="비밀번호">
					<div style="margin-top:10px; ">
						<textarea name="content" class="reply_content" id="re_content" ></textarea>
						<button id="rep_bt" class="re_bt">댓글</button>
					</div>
				</form>
			</div>
		</div><!--- 댓글 불러오기 끝 -->
		<div id="foot_box"></div>
		</div>
    </body>
</html>
