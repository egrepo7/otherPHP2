<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Registration</title>
</head>
<body>
	<div id="container">
		<fieldset>
		<legend>Register</legend>
			<form action="/Quotes/register" method="POST">
				<?= form_error('reg_name') ?>
				<p>Name:<input type="text" name="reg_name"></p>
				<?= form_error('reg_alias') ?>
				<p>Alias:<input type="text" name="reg_alias"></p>
				<?= form_error('reg_email') ?>
				<p>Email:<input type="text" name="reg_email"></p>
				<?= form_error('reg_password') ?>
				<p>Password:<input type="password" name="reg_password"></p>
				<?= form_error('reg_confpassword') ?>
				<p>Confirm Password:<input type="password" name="reg_confpassword"></p>
				<p><input type="date" name='date_of_birth'></p>
				<input type="submit" name="reg_button" value="Register">
			</form>
		</fieldset>	
		<fieldset>
			<legend>Log in</legend>
			<form action="/Quotes/login" method="POST">
				<?= form_error('login_email') ?>
				<p>Email:<input type="text" name="login_email"></p>
				<?= form_error('login_password') ?>
				<p>Password:<input type="password" name="login_password"></p>
				<input type="submit" name="login_button" value="Log In">
			</form>
		</fieldset>
	</div>
</body>
</html>