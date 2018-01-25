<?php
	include "../header.php";

	//global $conn;
  // Verify that the user has entered a first, last, phone, and email
  if (!(isset($_POST['UserID']) && isset($_POST['nameF']) && isset($_POST['nameL']) && isset($_POST['phone']) && isset($_POST['email'])))
    echo "fail whale :(";

  // Establishing database connection
  if ($conn->connect_error)
  {
    echo "fail whale :(";
  }
  else {

    // Create a long query string to add the given contact into Contact table
    // Still need userID associated with this given contact.
    $sql = "INSERT INTO contact(FName, LName, CellPh, Email, User_UserID) VALUES(";
    $sql = $sql."'".mysqli_real_escape_string($conn, $_POST['nameF'])."', ";
    $sql = $sql."'".mysqli_real_escape_string($conn, $_POST['nameL'])."', ";
    $sql = $sql."'".mysqli_real_escape_string($conn, $_POST['phone'])."', ";
    $sql = $sql."'".mysqli_real_escape_string($conn, $_POST['email'])."',";
	$sql = $sql.mysqli_real_escape_string($conn, $_POST['UserID']).")";

    if ($result = $conn->query($sql) != TRUE)
    {
      echo $sql;
    }
    else
    {
      $end = '"}';
      $myJsonString = '{"id":"'.rand(0000,9999);
      $myJsonString = $myJsonString.'","nameF":"'.$_POST['nameF'];
      $myJsonString = $myJsonString.'","nameL":"'.$_POST['nameL'];
      $myJsonString = $myJsonString.'","phone":"'.$_POST['phone'];
      $myJsonString = $myJsonString.'","email":"'.$_POST['email'];
      $myJsonString = $myJsonString.$end;

      echo $myJsonString;
      // echo '{"id":"'.rand(0000,9999).'","nameF":"'.$_POST['nameF'].'","nameL":"'.$_POST['nameL'].'","phone":"'.$_POST['phone'].'","email":"'.$_POST['email'].'"}';
    }

    $conn->close();
  }
?>
