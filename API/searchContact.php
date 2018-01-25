<?php
  include "../header.php";

  if !((isset($_GET['id'])))
    echo "fail whale :(";

  if ($conn->connect_error)
  {
    echo "fail whale :(";
    exit();
  }
  else
  {
    $search = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM contact WHERE ";
    $sql = $sql."('FName' LIKE '%".$search."%') OR ";
    $sql = $sql."('LName' LIKE '%".$search."%') OR ";
    $sql = $sql."('CellPh' LIKE '%".$search."%') OR ";
    $sql = $sql."('Email' LIKE '%".$search."%')";


    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0)
    {
      // Store results in temporary array to be parsed later
      // into a JSON formatted string
      $arrResults = array();

      while ($row = mysqli_fetch_assoc($result))
        array_push($arrayResults, $row['cID']);


      $numResults = sizeof($arrayResults);

      $retString = '{"arrResults": [';
      for ($i = 0; $i < $numResults - 1; $i++)
        $retString = $retString.'"'.$arrayResults[$i].'", ';

      $retString = $retString.'"'.$arrayREsults[$numResults - 1].'"}';

      echo $retString;
    }
    else
      echo "fail whale :(";


    mysqli_close($conn);
  }
?>
