<?php

  // Verify that the user has entered a first, last, phone, and email
  if (!(isset($_POST['nameF']) && isset($_POST['nameL']) && isset($_POST['phone']) && isset($_POST['email'])))
    echo "fail whale :(";

  // Establishing database connection
  $conn = new mysqli("localhost", "SaRcc", "Wash9Lives!", "COP4331");

  // By this point, do I have to verify the correct
  // User table that I should be looking at?
  if ($conn->connect_error)
  {
    echo "fail whale :(";
  }
  else {
    $sql = "INSERT INTO Contact(FName, LName, CellPh, Email) VALUES(";
    $sql = $sql."'".mysqli_real_escape_string($_POST['nameF'])."', ";
    $sql = $sql."'".mysqli_real_escape_string($_POST['nameL'])."', ";
    $sql = $sql."'".mysqli_real_escape_string($_POST['phone'])."', ";
    $sql = $sql."'".mysqli_real_escape_string($_POST['email'])."')";

    if ($result = $conn->query($sql) != TRUE)
    {
      echo "fail whale :(";
    }
    else
    {
      echo '{"id":"'.rand(0000,9999).'","nameF":"'.$_POST['nameF'].'","nameL":"'.$_POST['nameL'].'","phone":"'.$_POST['phone'].'","email":"'.$_POST['email'].'"}';
    }

    $conn->close();
  }
  // Since there's only 'name' when we have two field names, I will split

  // 'people' is the name of our table
  // corresponding parameters for 'people' are the names of the columns
  // corresponding parameters for VALUES are the corresponding insert stuff
  // For adding contacts
  // $strSQL = "INSERT INTO people(FirstName, LastName, Phone, Email) VALUES('fname', 'lname', 'phone', 'email')";
  // mysql_query($strSQL) or die(mysql_error());

  // Good practice to open and close database
  // mysql_connect("mysql.myhost.com", "user", "sesame") or die(mysql_error());
  // ... do query stuff ...
  // mysql_close();
?>
