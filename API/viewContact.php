<?php
  include "../header.php";

  if (!(isset($_GET['id']) && isset($_GET['UserID'])))
    echo "fail whale :(";

  if ($conn->connect_error)
  {
    echo "fail whale :(";
  }
  else
  {
    $uID = mysqli_real_escape_string($conn, $_GET['UserID']);
    $cID = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT FName, LName, CellPh, Email FROM contact WHERE contactID = ".$cID;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0)
    {
      	$row = mysqli_fetch_assoc($result);

        // Return result in JSON format
        $retString = '{"id":"'.$cID.'", "nameF":"'.$row["FName"].'", ';
        $retString = $retString.'"nameL":"'.$row["LName"].'", ';
    	$retString = $retString.'"phone":"'.$row["CellPh"].'", ';
    	$retString = $retString.'"email":"'.$row["Email"].'"}';


      	echo $retString;
    }
    else
    {
      echo "fail whale :(";
    }

    mysqli_close($conn);
  }
?>
