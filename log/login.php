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
    <!-- 합쳐지고 최소화된 최신 CSS -->
    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- 부가적인 테마 -->
    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <!-- 합쳐지고 최소화된 최신 자바스크립트 -->
    <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <script
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>

    <!--<link rel="stylesheet" type="text/css" href="../css/mystyle.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="../css/maintitle.css" />-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../javascr/onClickFunc.js"></script>
	<style>

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
