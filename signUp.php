<?php require_once("API/switchContent.php");?>
<section class="signUpPage">
	<div class="inner">
		<div id="signUpDiv" class="signUpDiv">
			<form method="post" action="newUser.php">
				<h1>Sign Up</h1>
				<input id="firstname" class="usernameBox" type="text" placeholder=" First Name" name="FName" required> <br />
				<input id="lastname" class="usernameBox" type="text" placeholder=" Last Name" name="LName" required> <br />
				<input id="username" class="usernameBox" type="text" placeholder=" Username" name="username" required> <br />
				<input id="password" class="passwordBox" type="password" placeholder=" Password" name="PWHash" required> <br />
				<input id="password" class="passwordBox" type="password" placeholder=" Retype Password" name="PWHash2" required> <br />
				<input type="submit" class="signUpButton" value="Sign Up">
				<h3>Existing member? <a href="#" data-target="login"><strong>Login</strong></a></h3>
			</form>
		</div>
	</div>
</section>