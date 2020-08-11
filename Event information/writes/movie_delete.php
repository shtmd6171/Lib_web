<?php
	include $_SERVER['DOCUMENT_ROOT']."/db.php";
	
	$bno = $_GET['idx'];
	$sql = mq("delete from movie_info where m_idx='$bno';");
?>
<script type="text/javascript">alert("삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=/page/main.php" />