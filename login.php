<?php require_once("API/switchContent.php");?>
<section class="loginPage">
	<div class="inner">
		<div id="loginDiv" class="loginDiv">
			<form method="post" action="verifySignIn.php">
				<h1>Login</h1>
				<input id="username" class="usernameBox" type="text" placeholder=" Username" name="username" required> <br />
				<input id="password" class="passwordBox" type="password" placeholder=" Password" name="password" required> <br />
				<input class="buttons" type="submit" value="Login">
				<h3>New member? <a href="#" data-target="signUp"><strong>Sign Up</strong></a></h3>
			</form>
		</div>
	</div>
</section>