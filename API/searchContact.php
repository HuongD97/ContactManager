<?php
  include "../header.php";

  if !((isset($_GET['id'])))
    echo "fail whale :(";

  if ($conn->connect_error)
  {
    echo "fail whale :(";
  }
  else
  {
    $search = mysqli_real_escape_string($conn, $_GET);
    
  }
?>
