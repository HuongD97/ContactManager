<?php
	// Handle new user signup input, insert into database, save hashed password
    include "header.php";

	// Store username and password from form submission
	$FName =  $_POST["FName"];
	$LName = $_POST["LName"];
    $username = $_POST["username"];
    $pass = $_POST["PWHash"];
    $pass2 = $_POST["PWHash2"];
	
	// Check if passwords are equal
	// For now, if wrong, just redirect back to home...but should probably have a login error eventually
	if($pass != $pass2) 
	{
		header("Location: /index.php");
		die();
	}
	// Check for error in connection
	if ($conn->connect_error)
	{
		// Handle connection error
		echo $conn->connect_error . "fail whale";
	}

	// Connection successful, insert new user
	else
	{
		// Make hashed version of password using MD5
		$hashedPass = MD5($pass);
		
		// Make sql query string
		$sql = "INSERT INTO user(FName, LName, username, userPWHash) 
					VALUES('" . $FName . "','". $LName . "','" . $username . "','" . $hashedPass . "')";
		
		//echo "strSQL = " . $strSQL;
		
		if (!$conn->query($sql) == TRUE) 
		{
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		// Obtain UserID of newly created user
		$userIDQuery = "SELECT UserID FROM user WHERE username='" . $username . "'AND userPWHash='" . $hashedPass . "'";
		
		$userIDResult = $conn->query($userIDQuery);
		$validID = $userIDResult->fetch_assoc();
		$userID = $validID["UserID"];
		
		//echo "userID = " . $userID;
		
		// After user is created, redirect to loggedIn and set $_SESSION[UserID]
		$_SESSION["UserID"] = $userID;
		header("Location: /loggedIn.php");
		$conn->close();
		die();
	}
?>