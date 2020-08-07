<?php
include "../lib/db.php";
$user_id = $_SESSION['user_id'];
$sql = mq("select * from user where user_id ='".$user_id."'");
$codecheck = $sql->fetch_array();

$email = $codecheck['email'];
$pwd = $codecheck['pwd'];

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
			<form id="mform" method="post" action="./member_page.php">
				<table align="center" border="0" cellspacing="0" width="300">
					<tr>
						<td colspan="10">
							<div class="title-container">
						 <h1 align="center">MemberShip Page</h1>
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
	              <input type="email" name="email" placeholder ="<?php echo $email ?>" readonly>
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
						<td align="center" colspan="10">
							<div class="mine s" id="btn">Submit</div>
						</td>
					</tr>
				</table>
			</form>
	</div>
</body>
</html>
