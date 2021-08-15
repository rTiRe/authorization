<?php
require_once("includes/reg.php");
require_once("includes/auth.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Medieval Clicker Game</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div class="dws-wrapper">
	<div class="dws-form">
		<input type="radio" id="tab-1" name="tabs" checked>
		<label class="tab" for="tab-1" title="Вкладка 1">Sign In</label>
		<input type="radio" name="tabs" id="tab-2">
		<label class="tab" for="tab-2" title="Вкладка 2">Sign Up</label>
		<form id="form-1" class="tab-form" method="POST">
			<div class="box-input">
				<input class="input" type="text" required>
				<label>Enter E-mail</label>
			</div>

			<div class="box-input">
				<input class="input" type="password" required>
				<label>Enter password</label>
			</div>

			<a href="javascript:history.go(0)" class="button">Sign In</a>
		</form>

		<form id="form-2" class="tab-form" method="POST">
			<input class="input" type="text" name="email" placeholder="Enter E-mail">
			<input class="input" type="text" name="username" placeholder="Enter Nickname">
			<input class="input" type="password" name="password" placeholder="Enter password">
			<?php
			if($a === true) {
				echo '<br/><p style="color: red; font-size: 20px; font-weight: bold;">'.$error.'</p>';
			}
			?>
			<a href="javascript:history.go(0)" class="button" name="register">Sign Up</a>
		</form>

	</div>
</div>
</body>
</html>