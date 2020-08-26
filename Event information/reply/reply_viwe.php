<?php
    include "./db.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="/test/js/bootstrap.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>후기게시판</title>
        <link rel ="stylesheet" href="/test/css/bootstrap.css">
    </head>
    <!--php의 변수 html로 가져오기-->
    <input type="hidden" id="d1" value="<?=$index?>">
    <body>
        <div class ="container">
            <table class ="table table-bordered">
                <thead>
                    <caption>글 읽기</caption>
                </thead>
                <tbody>
                    <tr>
                        <th>제목 : </th>
                        <td><?php echo $data['name'];?></td>
                    </tr>
                    <tr>
                        <th>작성 일자 : </th>
                        <td><?php echo $data['date'];?></td>
                    </tr>
                    <tr>
                        <th>조회수 : </th>
                        <td><?php echo $data['idx'];?></td>
                    </tr>
                    <tr>    
                        <th>작성자 : </th>
                        <td><?php echo $data['datat'];?></td>
                    </tr>
                    <tr>
                        <th>내용 : </th>
                        <td><?php echo $data['conten'];?></td>
                    </tr>
                </tbody>
            </table>
    <div id="bo_ser">
			<ul>
				<li><a href="./movie_list.php">[목록으로]</a></li>
				<li><a href="./movie_modify.php?idx=<?php echo $movie_info['m_idx']; ?>">[수정]</a></li>
				<li><a href="./movie_delete.php?idx=<?php echo $movie_info['m_idx']; ?>">[삭제]</a></li>
			</ul>
		</div>
		
        </div>
    </body>
</html>
