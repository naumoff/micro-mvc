<?php if($auth === FALSE){ ?>
	<h2>Wellcome!</h2>
	<h4>Please login or register to continue!</h4>
	<button><a href="/user/login-form">Login</a></button>
	<button><a href="/user/register-form">Register</a></button>
<?php }else{ ?>
	<h2>Wellcome, <?= $userName ?>!</h2>
	<button><a href="/user/log-out">Log Out</a></button>
<?php } ?>
