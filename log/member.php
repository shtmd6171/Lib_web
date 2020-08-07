<?php
include "../lib/db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/registration.css"/>
	<script src="../javascr/onClickFunc.js"></script>
</head>
<body>
	<div id="login_box">
	<form id="mform" method="post" action="member_ok.php">
		<h1>Membership Registration</h1>
		<div class="title-container"></div>
			<fieldset class="line">
				<legend>Required</legend>
					<table align="center" border="0" cellspacing="0" width="600">
						<tr>
							<td>Id</td>
							<td colspan="9">
								<input type="email" id="uid" size="35" name="email" placeholder="이메일" required>
							</td>
							<td><div id="chk"/>duplication</td>
						</tr>
						<tr>
							<td>Pwd</td>
							<td colspan="9">
								<input type="password" size="35" name="pwd" placeholder="비밀번호"></td>
						</tr>
						<tr>
							<td>Name</td>
							<td colspan="9">
								<input type="text" size="35" name="name" placeholder="이름"></td>
						</tr>
						<tr>
							<td>Address</td>
							<td colspan="9">
								<input type="text" size="35" name="addr" placeholder="주소"></td>
						</tr>
						<tr>
							<td>tell</td>
							<td colspan="9">
								<input type="text" size="35" name="tel" placeholder="전화번호"></td>
						</tr>
						<tr>
							<td>gender</td>
							<td>&nbsp</td>
							<td colspan="4">
								Male<input type="radio" name="gender" value="Male">
								</td>
							<td colspan="2">
								Female<input type="radio" name="gender" value="Female">
								</td>
						</tr>
						<tr>
							<td colspan="11"><div class="line">	</div></td>
						</tr>
						<tr>
							<td align="center" colspan="5">
								<div class="mine r"/>Register
							</td>
							<td align="center" colspan="6">
								<div class="mine re"/>Rewrite
							</td>
						</tr>
						<tr>
							<td  colspan="9">&nbsp</td>
						</tr>
					</table>
					<div class="line"></div>
						<div class="mine b" type="submit"/>Back

		</fieldset>
	</form>
	</div>
</body>
</html>
