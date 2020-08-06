<?php
include "../lib/db.php";
?>

<head>
	<meta charset="utf-8" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/mystyle.css" />
	<link rel="stylesheet" type="text/css" href="../css/maintitle.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="../javascr/onClickFunc.js"></script>
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
