<?php
  include "../header.php";

  if !((isset($_GET['id']) && isset($_GET['UserID'])))
    echo "fail whale :(";

    // Hey Huong, please return data in this format! Thank you! -Rachael
    // echo '{"id":"'.$_GET['id'].'","nameF":"David","nameL":"Eddings","phone":"(407)123-4567","email":"dmarino@ucf.com"}';
  if ($conn->connect_error)
  {
    echo "fail whale :(";
  }
  else
  {
    uID = mysqli_real_escape_string($conn, $_GET['UserID']);
    cID = mysqli_real_escape_string($conn, $_GET['id']);


    $sql = "SELECT * FROM contact WHERE cID = ".cID;
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0)
    {
      // Is there a better way of writing this? Do we know that
      // if we fetch a contact that it's the only contact?
      while ($row = mysqli_fetch_assoc($result))
      {

        // Return result in JSON format
        $retString = '{"id":"'.cID.'", "nameF":"'.$row['FName'].'", ';
        $retString = $retString.'"nameL":"'.$row['LName'].'", ';
        $retString = $retString.'"phone":"'.$row['CellPh'].'", ';
        $retString = $retString.'"email":"'.$row['Email'].'"}';
      }

      echo $retString;
    }
    else
    {
      echo "fail whale :(";
    }

    mysqli_close($conn);
  }
?>
