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
</head>
<body>
	<div class="container">
	<header class="blog-header py-3 sticky-top"></header>
		<form method="post" action="member_ok.php">
			<h1>Membership Registration</h1>
			<div>
			<tr>
				<td>id</td>
				<td><input type="email"></td>
			</tr>
			</div>
			<div>
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
			</div><div>
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
				<td><button onclick="location.href='member.php'">back</button></td>
			</tr>
			</div>
		</form>
	</div>
</body>
</html>
