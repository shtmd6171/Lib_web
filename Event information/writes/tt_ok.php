<?php
	include $_SERVER['DOCUMENT_ROOT']."/db.php";

	//각 변수에 write.php에서 input name를 저장한다.
	$name = $_POST['name'];
	//모르는 혹은 기억이 안나는 문법의 경우 검색해서 한줄 한줄 해석하는 그런 방법의 학습이 필요
	$tmpfile = $_FILES['img']['tmp_name'];
	$o_name = $_FILES['img']['name'];
	$filename = iconv("UTF-8","EUC-KR",$_FILES['img']['name']);
	$folder = "./img/poster/".$filename;
	move_uploaded_file($tmpfile,$folder);

	//if문 내부에들어가는 조건식을 좀 더 학습할 필요성이 존재
	if($name && $o_name ){
		//mysql 문법 확인
		$sql = mq("insert into gallery(name,img)values('".$name."','".$tmpfile."')");
		//오류가 발생했을 경우 echo을 이용해서 출력을 통해서 검토습관
		echo $sql."<br/>";
		echo "insert into gallery(name,img)values('".$name."','".$tmpfile."')";
		if($sql)
		{
			echo "<script>alert('갤러리 등록 성공.');location.href='/testlist.php';</script>";
		}
		else{
			echo "<script>
			alert('갤러리 등록 실패.');</script>";
		}
	}else{
		
	}
?>