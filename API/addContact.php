<?php

  // Verify that the user has entered a first, last, phone, and email
  if (!(isset($_POST['nameF']) && isset($_POST['nameL']) && isset($_POST['phone']) && isset($_POST['email'])))
    echo "fail whale :(";

  // Establishing database connection
  $conn = new mysqli("localhost", "SaRcc", "Wash9Lives!", "COP4331");


  if ($conn->connect_error)
  {
    echo "fail whale :(";
  }
  else {

    // Create a long query string to add the given contact into Contact table
    // Still need userID associated with this given contact.
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
      $end = '"}';
      $myJsonString = '{"id":"'.rand(0000,9999);
      $myJsonString = $myJsonString.'","nameF":"'.mysqli_real_escape_string($_POST['nameF']);
      $myJsonString = $myJsonString.'","nameL":"'.mysqli_real_escape_string($_POST['nameL']);
      $myJsonString = $myJsonString.'","phone":"'.mysqli_real_escape_string($_POST['phone']);
      $myJsonString = $myJsonString.'","email":"'.mysqli_real_escape_string($_POST['email']);
      $myJsonString = $myJsonString.$end;

      echo $myJsonString;
      // echo '{"id":"'.rand(0000,9999).'","nameF":"'.$_POST['nameF'].'","nameL":"'.$_POST['nameL'].'","phone":"'.$_POST['phone'].'","email":"'.$_POST['email'].'"}';
    }

    $conn->close();
  }
?>
