<h3>User Registration</h3>
<?php if(isset($errorMessage)){ ?>
	<p style="color: red"><?= $errorMessage ?></p>
<?php	} ?>
<form action="/user/register" method="post">
	<fieldset>
		<legend>User registration form</legend>
		<input type="text"
		       name="user"
		       required
		       value=" <?php if(isset($user)){	echo $user;	} ?>"> Your login <br>
		<input type="email"
		       name="email"
		       required
		       value="<?php if(isset($email)){echo $email;} ?>"> Your email <br>
		<input type="password" name="pass1" required> Your password <br>
		<input type="password" name="pass2" required> Password reenter <br>
		<input type="submit" name="send" value="register"> <br>
	</fieldset>
</form>
