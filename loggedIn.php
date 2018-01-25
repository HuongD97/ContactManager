<?php include "header.php";?><!DOCTYPE html>
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
		          <input type="text" class="form-control" placeholder="Search">
		        </div>
		        <button type="submit" class="btn btn-default">Search</button>
		      </form>

		      <ul class="nav navbar-nav navbar-left">
		        <li><a id="AddContact" href="#">Add Contact</a></li>
		        <li><a id="DeleteContact" href="#">Delete Contact</a></li>
		      </ul>

		      <ul class="nav navbar-nav navbar-right">
		        <li><p class="navbar-text">Signed in as Mark Otto</p></li>
		        <button type="submit" class="btn btn-default navbar-btn">Sign Out</button>
		      </ul>

		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

		<div id="myContacts" class="myContacts">
					<h2>My Contacts</h2>
					<div id="contactList" class="list-group">
					  <button id="6543" type="button" class="list-group-item contact">Cras odio</button>
					  <button id="6353" type="button" class="list-group-item contact">Dapibus facilisis in</button>
					  <button id="3532" type="button" class="list-group-item contact">Morbi risus</button>
					  <button id="2345" type="button" class="list-group-item contact">Porta consectetur ac</button>
					  <button id="3465" type="button" class="list-group-item contact">Vestibulum eros</button>
					</div>
		</div>
<!--
		<div id="error" class="defaultHidden"></div>
		<div id="contactDisplay" class="togglePanel defaultHidden">
			<div id="nameRO" class="ROfield"></div>
			<div id="phoneRO" class="ROfield"></div>
			<div id="emailRO" class="ROfield"></div>
		</div>
		<div id="contactAdd" class="togglePanel">
			<input id="nameW" class="userInput" type="text" placeholder="Name"></input>
			<input id="phoneW" class="userInput" type="phone" placeholder="Phone Number"></input>
			<input id="emailW" class="userInput" type="email" placeholder="Email"></input>
			<input id="contactSubmit" type="button" value="Save Contact"></input>
		</div>
 -->

 <!-- 	<div id="error" class="defaultHidden"></div> -->
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
					<input id="nameWF" type="text" class="firstNameBox" placeholder="First Name">
					<input id="nameWL" type="text" class="lastNameBox" placeholder="Last Name">
					<input id="phoneW" type="text" class="phoneNumberBox" placeholder="Phone Number">
					<input id="emailW" type="text" class="emailBox" placeholder="Email">
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
				if($("#contactAdd").is(":hidden")){
					$(".togglePanel").toggleClass("defaultHidden");
				}
			});
			// When you click 'Delete Contact', remove the contact from the active page
			$("#DeleteContact").on("click",function(){
				if($("#contactAdd").is(":hidden")){
					deleteContact($("#contactDisplay").attr("data-cid"))
				}
			});
			// When you click 'Save Contact', add the contact and display its info
			$(".addContactButton").on("click",function(){addContact(<?=$_SESSION['UserID']?>)});

			// Helper function for showing errors.
			function showError(str){
				$("#error").html(str).removeClass("defaultHidden");
				setTimeout(function(){$("#error").addClass("defaultHidden");},3000);
			}
		</script>

	</body>
</html>
