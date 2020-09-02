<?php
include "../lib/db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title></title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.css">
	<script src="../css/js/bootstrap.js"></script>
</head>
<body>
	<div class="container">
<<<<<<< HEAD
		<form method="post" action="member_ok.php">
<<<<<<< HEAD
			</div>
			</div>
=======
		<header class="blog-header py-3 sticky-top"></header>
		<form method="post" action="member_ok.php">
			<div class="row">
				<h1>User Registration</h1>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6 col-sm-12 px-0">
						<label for="email">E-mail address</label>
						<input type="email" class="form-control" name="email" placeholder="example@email.com">
					</div>
					<div class="col-md-6 col-sm-12 px-0">
						<label for="pwd">Password</label>
						<input type="password" class="form-control" name="pwd" placeholder="Please enter your password">
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="pwd">Password Check</label>
				<!-- <input type="password" class="form-control" name="pwd" placeholder="Please enter your password again" required> -->
				<!--비밀번호 확인 백엔드 추가할 수 있을까요?-->
			</div>

			<div  class="form-group">
				<label for="Uname">User name</label>
				<input type="text" class="form-control" name="name" placeholder="Please enter your name" required>
			</div>

			<div class="form-group">
				<label for="Uaddress">Address</label>
				<input type="text" class="form-control" name="addr" placeholder="Please enter your address" required>
			</div>

			<div class="form-group">
				<label for="UphoneNum">Phone Number</label>
				<input type="text" class="form-control" name="tel" placeholder="Please enter your Phone Number" required>
			</div>

			<div class="form-group">
				<div class="form-check form-check-inline">
					<label for="gender">Gender</label>
					<input class="form-check-input" type="radio"  name="gender" value="male">
					<label class="form-check-label" for="male">
						male
					</label>
					<input class="form-check-input" type="radio"  name="gender" value="female">
					<label class="form-check-label" for="female">
						female
					</label>
				</div>
			</div>
			<div class="row">
				<button type="submit" class="btn btn-outline-info">Regist in</button>
			</form>
			<button onclick="location.href='member.php'">back</button> <!--이거 안먹힌다 왜일까... 수정요망 -->
		</div>
>>>>>>> 6d4aab9c17d91ebf08413ba881ba9b0f723ab913
=======
			<h1>Membership Registration</h1>
			<div>
			<tr>
				<td>id</td>
				<td><input type="email" name="email"></td>
			</tr>
			</div>
			<div>
			<tr>
				<td>password</td>
				<td><input type="password" name="pwd"></td>
			</tr>
			</div><div>
			<tr>
				<td>name</td>
				<td><input type="text" name="name"></td>
			</tr>
			</div><div>
			<tr>
				<td>address</td>
				<td><input type="text" name="addr"></td>
			</tr>
			</div><div>
			<tr>
				<td>tell</td>
				<td><input type="text" name="tel"></td>
			</tr>
			</div><div>
			<tr>
				<td>gender</td>
				<td><input type="radio" name="gender" value="male">male</td>
				<td><input type="radio" name="gender" value="female">female</td>
			</tr>
			</div><div>
			<tr>
				<td><button>gogo</button></td>
				<td><button onclick="location.href='member.php'">back</button></td>
			</tr>
			</div>
		</form>
>>>>>>> 51fc89b4bfa10aa6fafc31563510bf955f9c88c4
	</div>
</body>
</html>
