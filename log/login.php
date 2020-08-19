<!--https://jeonghwan-kim.github.io/dev/2020/03/09/flex.html
Todo 플렉스 관련 글 보고 레이아웃 구성 정리하기
	 정렬 맞추기
	 버튼 디자인	
	 폰트 통일
	 이미지
-->

<?php
include "../lib/db.php";
?>

<head>
    <meta charset="utf-8"/>
    <title></title>
	<link
        rel="stylesheet"
        href="../css/bootstrap.css">
	<link
        rel="stylesheet"
        href="../css/bootstrap-theme.css">
	<script
        src="../css/js/bootstrap.js"></script>
    <script src="../javascr/onClickFunc.js"></script>
	<style>
		.flex_container {
  		display: flex;
		}
	</style>
</head>
<br>
<br>
<br>
<div id="container">
	<div class="">
	<img src="../file/login_1.jpg" class="rounded mx-auto d-block" alt="...">
	</div>
			<form id="mform" method="post" action="./login_ok.php">
				<table align="center" border="0" cellspacing="0" width="300">
					<tr>
						<td >
							<div>
							<h1 align="center">Login</h1>
					 	</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">
            				<label for="inputEmail">Email address</label>
            				<input  type="email" 
									class="form-control" 
									name="email">
							</div>
						</td>
					</tr>
					<!--
					<tr>
						<td colspan="10">
							<div class="line">	</div>
						</td>
					</tr>
						<tr>
							<td colspan="2">e-mail</td>
							<td align="center">
	              <input type="email" name="email">
							</td>
						</tr>-->
					<tr>
						<td>
							<div class="form-group">
            				<label for="inputPwd">Password</label>
            				<input  type="password" 
									class="form-control" 
									name="pwd">
							</div>
						</td>
					</tr>
					 <!--<tr>
						<td colspan="2">Password</td>
						<td align="center">
							<input type="password" name="pwd">
						</td>
					</tr>
					-->

					<tr>
						<td>
						<br>
						</td>
					</tr>

					<tr>
						<td align="center" colspan="5">
							<div>
							<div type="button" class="btn btn-outline-secondary s" id="btn">Sign in</div>
							 <!--class="mine s" id="btn">Sign in</div> -->
						</td>
						<td align="center" colspan="5">
						 <!--class="mine m">Create Account-->
							<div type="button" class="btn btn-outline-secondary m">Create Account</div>
						</td>
					</tr>
				</table>
			</form>
	</div>
</body>
</html>
