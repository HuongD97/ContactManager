<?php
  include "../header.php";

  if (!(isset($_GET['UserID']) && isset($_GET['searchTerm'])))
    echo "1fail whale :(";

  if ($conn->connect_error)
  {
    echo "2fail whale :(";
    exit();
  }
  else
  {
    $search = mysqli_real_escape_string($conn, strtolower($_GET['searchTerm']));
    $sql = "SELECT GROUP_CONCAT(contactID) as cIDs FROM contact WHERE User_UserID = ";
	$sql = $sql.mysqli_real_escape_string($conn, $_GET['UserID']);
    $sql = $sql." AND (LCASE(FName) LIKE '%".$search."%' OR ";
    $sql = $sql."LCASE(LName) LIKE '%".$search."%' OR ";
    $sql = $sql."LCASE(CellPh) LIKE '%".$search."%' OR ";
    $sql = $sql."LCASE(Email) LIKE '%".$search."%')";

    $result = mysqli_query($conn, $sql);

    // Store results in temporary array to be parsed later
    // into a JSON formatted string
    $result = mysqli_fetch_assoc($result);

	if ($result['cIDs'] == ""){
		echo '[]';
	} else {
		echo '[{"cid":'. str_replace(',','},{"cid":',$result['cIDs']) .'}]';
    }


    mysqli_close($conn);
  }
?>
