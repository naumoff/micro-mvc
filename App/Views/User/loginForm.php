<button><a href="/">Home</a></button>
<h3>User Authorization</h3>
<form action="/user/login" method="post">
	<fieldset>
		<legend>Login Form</legend>
		<input type="email" name="email" required> Your email<br>
		<input type="password" name="pass" required> Your password <br>
		<input type="submit" name="auth" value="login">
	</fieldset>
</form>