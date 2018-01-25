<?php
  // $_SESSION["UserID"]
  if (!(isset($_POST['id'])))
    echo "fail whale :(";


  if ($conn->connect_error)
  {
    echo "fail whale :(";
  }
  else
  {
    // cID contains the contact ID that we want to delete
    $cID = mysqli_real_escape_string($conn, $_POST['id']);


    // Before deleting the contact ID, make sure that
    // the current user has access to that contact
    $sql = "SELECT uID FROM Contact WHERE cID = ".$cID;
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) == 1)
    {
      $matchID = mysqli_fetch_assoc($result);

      // The user logged in can indeed access this contact
      if ($matchID['uID'] == $_SESSION['userID'])
      {
        $sql = "DELETE FROM contact WHERE cID =".$cID;
        if ($conn->query($sql) == TRUE)
        {
          // echo "Record deleted successfully.";
          echo '{"id":"'.cID.'"}';
        }
        else
        {
          echo "fail whale :(";
        }
      }
      else
      {
        // User doesn't have access to wanted delete
        echo "fail whale :(";
      }
    }
    else
    {
      echo "fail whale :(";
    }

    $conn->close();
  }

?>
