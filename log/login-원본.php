<?php
include "../lib/db.php";
?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<meta name = "google-signin-client_id"content = "802907034805-ckgp6p4h7di1vbp8g2c2s0v2mmhbmpap.apps.googleusercontent.com">
	<title></title>
	<!-- 합쳐지고 최소화된 최신 CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<!-- 부가적인 테마 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<!-- 합쳐지고 최소화된 최신 자바스크립트 -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

	<!--<link rel="stylesheet" type="text/css" href="../css/mystyle.css" />-->
	<!--<link rel="stylesheet" type="text/css" href="../css/maintitle.css" />-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="../javascr/onClickFunc.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="https://apis.google.com/js/platform.js?onload=init" async defer></script>
</head>
	<br>
	<br>
	<br>
	<div id="login_box">
		<div class="title-container">
	  </div>
			<form id="mform" method="post" action="./login_ok.php">
				<table align="center" border="0" cellspacing="0" width="300">
					<tr>
						<td colspan="10">
							<div class="title-container">
						 <h1 align="center">Login</h1>
					 </td>
					</tr>
					<tr>
						<td colspan="10">
							<div class="line">	</div>
						</td>
					</tr>
						<tr>
							<td colspan="2">email</td>
							<td align="center">
	              <input type="email" name="email">
							</td>
						</tr>
					 <tr>
						<td colspan="2">pwd</td>
						<td align="center">
							<input type="password" name="pwd">
						</td>
					</tr>
					<tr>
						<td>
						<br>
						</td>
					</tr>
					<tr>
						<td align="center" colspan="5">
							<div class="mine s" id="btn">Sign in</div>
						</td>
						<td align="center" colspan="5">
							<div class="mine m">Create Account</div>
						</td>
					</tr>
				</table>
			</form>
	</div>
</body>
</html>
