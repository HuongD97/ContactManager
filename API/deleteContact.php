<?php
  if (isset($_POST['id']))
    echo '{"id":"'.$_POST['id'].'"}';
  else
    echo "fail whale :(";

    /*
	Note: Confirm that the active user defined in the session is the owner of
	the contact before deleteion (or any other modification in other files) is allowed

    $sql = "DELETE FROM (tablename) WHERE (what is passed in on Rachael's side)";

    if ($conn->query($sql) == TRUE)
      echo "Record deleted successfully"; // Need to return this in Json
    else
      echo "Error deleting record: ".$conn->error; // Need to return this in Json

    $conn->close();
    */
?>
