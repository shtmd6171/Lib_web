<?php
include "../lib/db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.css">
	<script src="../css/js/bootstrap.js"></script>
	<!-- onClickFunc.js를 보면 알 수 있듯이(jquery로 작성했다)
   각 버튼들은 button이나 input 타입이 아니라 div 타입으로 선언 되어 있는 것을 알 수 있다.
   그리고 div타입은 기본적으로 클릭의 대한 이벤트가 없기때문에  onClickFunc.js내에서
   div를 클릭 했을 때의 이벤트를 추가한 것이다. -->
	<script src="../javascr/onClickFunc.js"></script>
</head>
<body>
	<div>
		<form class="mform" method="post" action="member_ok.php">
			<h1>Membership Registration</h1>
			<div>
			<tr>
				<td>id</td>
				<td><input type="email"></td>
			</tr>
			</div>
			<div></div>	
			<tr>
				<td>password</td>
				<td><input type="password"></td>
			</tr>
			</div><div>
			<tr>
				<td>name</td>
				<td><input type="text"></td>
			</tr>
			</div><div>
			<tr>
				<td>address</td>
				<td><input type="text"></td>
			</tr>
			</div><div></div>
			<tr>
				<td>tell</td>
				<td><input type="text"></td>
			</tr>
			</div><div>
			<tr>
				<td>gender</td>
				<td><input type="radio" name="male" value="male">male</td>
				<td><input type="radio" name="female" value="female">female</td>
			</tr>
			</div><div>
			<tr>
				<td><button>gogo</button></td>
				<td><button class="re">back</button></td>
			</tr>
			</div>
		</form>
	<!-- <form id="mform" method="post" action="member_ok.php">
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
	</form> -->
	</div>
</body>
</html>
