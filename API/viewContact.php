<?php
  include "../header.php";

  if (isset($_GET['id']))
  	// Hey Huong, please return data in this format! Thank you! -Rachael
    echo '{"id":"'.$_GET['id'].'","nameF":"David","nameL":"Eddings","phone":"(407)123-4567","email":"dmarino@ucf.com"}';
  else
    echo "fail whale :(";
?>
