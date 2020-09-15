<?php
include "../lib/db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title></title>
	<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap-theme.css">
	<link rel="stylesheet" href="./log.css">
	<script src="../css/js/bootstrap.js"></script>
</head>

<body>
	<div class="container">
		<form method="post" action="member_ok.php">
			<header class="blog-header py-3 sticky-top"></header>
			<form method="post" action="member_ok.php">
				<div class="row">User Registration</div>

				<div class="form-group">
					<div class="form-row">
						<div class="col-md-6 col-sm-12 px-0">
							<label for="email">E-mail address</label>
							<input type="email" class="form-control" name="email" placeholder="example@email.com" required>
						</div>
						<div class="col-md-6 col-sm-12 px-0">
							<label for="pwd">Password</label>
							<input type="password" class="form-control" name="pwd" placeholder="Please enter your password" required>
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
		</div>


	</body>
	</html>
