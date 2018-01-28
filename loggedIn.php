<?php include "header.php";
	if(!isset($_SESSION['UserID'])){
		header("location: /");
	}
?><!DOCTYPE html>
<html>
	<head>
		<title>Contact Manager: Your Contacts</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="css/loggedIn.css" rel="stylesheet">
<!-- 	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
	</head>
	<body>
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Contact Manager</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

		      <form class="navbar-form navbar-left">
		        <div class="form-group">
		          <input id="searchBox" type="text" class="form-control" placeholder="Search">
		        </div>
		        <button id="searchButton" type="button" class="btn btn-default">Search</button>
		      </form>

		      <ul class="nav navbar-nav navbar-left">
		        <li><a id="AddContact" href="#">Add Contact</a></li>
		        <li><a id="DeleteContact" href="#">Delete Contact</a></li>
		      </ul>

<!--
		      <ul class="nav navbar-nav navbar-right">
		        <li><p class="navbar-text">Signed in as Mark Otto</p></li>
		        <button type="submit" class="btn btn-default navbar-btn"><a href="logout.php">Sign Out</a></button>
		      </ul>
-->
			  <!-- Dynamically generate name to greet user -->
			  <ul class="nav navbar-nav navbar-right">
		        <?php
				  // Find current user First and Last Name
				  $NameQuery = "SELECT FName, LName FROM user WHERE UserID='" . $_SESSION["UserID"] . "'";
				  $Name = mysqli_query($conn, $NameQuery);

				  if (mysqli_num_rows($Name) > 0)
				  {
					  $row = mysqli_fetch_assoc($Name);
					  echo '<li><p class="navbar-text">Welcome, ' . $row['FName'] . " " . $row['LName'] . '!</p></li>';
				  }
				  // Just in case it doesn't work, default greeting
				  else
				  {
					  echo '<li><p class="navbar-text">Welcome!</p></li>';
				  }
				?>
		        <button type="submit" class="btn btn-default navbar-btn"><a href="logout.php">Sign Out</a></button>
		      </ul>

		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

		<div id="myContacts" class="myContacts">
					<h2>My Contacts</h2>
					<div id="contactList" class="list-group">
					<button type="button" class="list-group-item contact defaultHidden"></button>
					<?php
						$sql = "SELECT contactID, FName, LName FROM contact WHERE User_UserID = ".$_SESSION['UserID'] ." ORDER BY LName, Fname";
						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0)
					    {
							while($row = mysqli_fetch_assoc($result)){
								echo '<button id="' . $row['contactID'] . '" type="button" class="list-group-item contact">' . $row['FName'] . ' ' . $row['LName'] . '</button>';
							}
						}
					?>
					</div>
		</div>

	<section id="contactDisplay" class="ContactInfo togglePanel defaultHidden">
		<div class="inner">
			<div id="displayContactInfoDiv" class="ContactInfoDiv">
				<div id="nameFRO" class="ROfield"></div>
				<div id="nameLRO" class="ROfield"></div>
				<div id="phoneRO" class="ROfield"></div>
				<div id="emailRO" class="ROfield"></div>
			</div>
		</div>
	</section>

	<section id="addContactInfo" class="ContactInfo togglePanel">
		<div class="inner">
			<div id="addContactInfoDiv" class="ContactInfoDiv">
				<h1>Add Contact</h1>
					<input id="nameWF" type="text" class="firstNameBox userInput" placeholder="First Name">
					<input id="nameWL" type="text" class="lastNameBox userInput" placeholder="Last Name">
					<input id="phoneW" type="text" class="phoneNumberBox userInput" placeholder="Phone Number">
					<input id="emailW" type="text" class="emailBox userInput" placeholder="Email">
					<input class="addContactButton" type="button" value="Add Contact">
					<!-- <button id="addContactButton" type="button" class="addContactButton"> Add Contact </button> -->
			</div>
		</div>
	</section>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="API/APIfront.js"></script>

		<!-- Scripts will be moved off into their own js file -->
		<script>
			// When you click on contacts, swap to the Read-Only form and show their info
			$(".contact").on("click",function(){viewContact(<?=$_SESSION['UserID']?>,this.id);});
			// When you click 'Add A New Contact', show the add contact section
			$("#AddContact").on("click",function(){
				if($("#addContactInfo").is(":hidden")){
					$(".togglePanel").toggleClass("defaultHidden");
				}
			});
			// When you click 'Delete Contact', remove the contact from the active page
			$("#DeleteContact").on("click",function(){
				if($("#addContactInfo").is(":hidden")){
					deleteContact(<?=$_SESSION['UserID']?>,$("#contactDisplay").attr("data-cid"))
				}
			});
			// When you click 'Save Contact', add the contact and display its info
			$(".addContactButton").on("click",function(){addContact(<?=$_SESSION['UserID']?>)});

			// When you click "search" it searches with what's in the box
			$("#searchButton").on("click",function(){searchContact(<?=$_SESSION['UserID']?>, $("#searchBox").val())});

			// Helper function for showing errors.
			function showError(str){
				$("#error").html(str).removeClass("defaultHidden");
				setTimeout(function(){$("#error").addClass("defaultHidden");},3000);
			}
		</script>

	</body>
</html>
