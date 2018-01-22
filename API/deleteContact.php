
<?php

  if (isset($_GET['id']))
    echo "success";
  else
    echo "fail whale :(";

    /*
    $sql = "DELETE FROM (tablename) WHERE (what is passed in on Rachael's side)";

    if ($conn->query($sql) == TRUE)
      echo "Record deleted successfully"; // Need to return this in Json
    else
      echo "Error deleting record: ".$conn->error; // Need to return this in Json

    $conn->close();
    */
?>
