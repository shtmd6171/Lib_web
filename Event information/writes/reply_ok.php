<?php
	include $_SERVER['DOCUMENT_ROOT']."/db.php";

    $bno = $_GET['idx'];
    $re_content = $_POST['re_content'];
	
    if($bno && $re_content){
        $sql = mq("insert into reply(reply_desc, m_idx) values('".$re_content."','".$bno."')");
        echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='/movie_read.php?idx=$bno';</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
    }
	
?>