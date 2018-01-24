

<?php
	// Store username and password from form submission
	$user =  $_POST["username"];
	$pass = $_POST["password"];

	// Create connection
	$conn = new mysqli("localhost", "SaRcc", "Wash9Lives!", "COP4331");

	// Check for error in connection
	if ($conn->connect_error)
	{
		// Handle connection error
		echo $conn->connect_error . "fail whale";
	}

	// Connection successful, verify login details
	else
	{
		$loginQuery = "SELECT UserID FROM user WHERE username='" . $user . "'AND userPWHash='" . $pass . "'";

		// Query database to retrieve the userID of an attempted login. This query
		// will return false if the log in credentials don't match a user's data
		$loginAttempt = $conn->query($loginQuery);

		if ($loginAttempt->num_rows > 0)
		{
			// Fetch the data selected by the query (uID)
			$validUser = $loginAttempt->fetch_assoc();
			$userID = $validUser["UserID"];
			$_SESSION["UserID"] = $userID;

			// Successful login, now have the uID primary key that needs to be passed
			// to the loggedIn page to be used
			header("Location: /loggedIn.html");
			$conn->close();
			die();
		}

		// If the query failed, the log in information was invalid
		else
		{
			// Check if the user exists in the database meaning invalid password
			$usernameCheckQuery = "SELECT UserID FROM user WHERE username = '" . $user . "'";

			$usernameCheckQueryResult = $conn->query($usernameCheckQuery);
			// If the username is not present in the database, direct to sign up
			if($usernameCheckQueryResult->num_rows == 0)
			{
				// Placeholder for redirecting to signup page
				header("Location: /signUp.html");
				$conn->close();
				die();
			}

			// If the username IS present, the login attempt had an invalid password
			else
			{
				header("Location: /login.html");
				$conn->close();
				die();
			}
		}


	}
?>
